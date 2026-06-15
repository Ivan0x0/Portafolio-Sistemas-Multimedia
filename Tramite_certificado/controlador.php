<<?php
session_start();
include "json_helper.php";

if(!isset($_SESSION['usuario'])) { header("Location: login.php"); exit(); }

$flujo_id = $_GET['flujo'];
$proceso_id = $_GET['proceso'];
$ticket_id = (int)$_GET['ticket'];
$usuario = $_SESSION['usuario'];
$flujo = leer_json('flujo.json');
$proceso = buscar_proceso($flujo, $proceso_id);
if(isset($_GET['Cancelar'])) {
    $tickets = leer_json('ticket.json');
    $tickets = array_map(function($t) use ($ticket_id, $proceso_id) {
        if($t['ticket'] == $ticket_id && $t['proceso'] == $proceso_id && $t['fechafinal'] == null) {
            $t['fechafinal'] = date('Y-m-d H:i:s');
            $t['observaciones'] = "Trámite cancelado definitivamente por el estudiante.";
        }
        return $t;
    }, $tickets);

    guardar_json('ticket.json', $tickets);
    include 'header.php';
    echo "<div class='card' style='text-align:center;'><h2 style='color:var(--rojo);'>🚫 Trámite Cancelado</h2><p>Has cancelado la solicitud. El trámite ha sido archivado y ya no aparecerá en tu bandeja.</p><br><a class='btn btn-primary' href='bandeja.php'>Volver a Bandeja</a></div></body></html>";
    exit();

} elseif(isset($_GET['Siguiente'])) {
    $tickets = leer_json('ticket.json');
    $decision = $_GET['decision'] ?? null;
    $observaciones = $_GET['observaciones'] ?? null;

    $tickets = array_map(function($t) use ($ticket_id, $proceso_id) {
        if($t['ticket'] == $ticket_id && $t['proceso'] == $proceso_id && $t['fechafinal'] == null) {
            $t['fechafinal'] = date('Y-m-d H:i:s');
        }
        return $t;
    }, $tickets);

    $condicion = buscar_condicion($flujo, $proceso_id);
    if($condicion){
        $siguiente_id = ($decision == 'verdad') ? $condicion['verdad'] : $condicion['falso'];
    } else {
        $siguiente_id = $proceso['siguiente'];
    }

    if($siguiente_id === null){
        guardar_json('ticket.json', $tickets);
        include 'header.php';
        echo "<div class='card' style='text-align:center;'><h2 style='color:var(--verde);'>✅ Trámite Finalizado</h2><p>La operación concluyó exitosamente.</p><br><a class='btn btn-primary' href='bandeja.php'>Volver a Bandeja</a></div></body></html>";
        exit();
    }

    $proc_sig = buscar_proceso($flujo, $siguiente_id);
    $tickets[] = [
        'ticket'=> $ticket_id,
        'flujo'=> $flujo_id,
        'proceso'=> $siguiente_id,
        'usuario'=> $proc_sig['rol'],
        'fechainicial'=> date('Y-m-d H:i:s'),
        'fechafinal'=> null,
        'observaciones' => $observaciones
    ];

    guardar_json('ticket.json', $tickets);
    header("Location: bandeja.php"); exit();

} else {
    $tickets = leer_json('ticket.json');
    $ticket_actual = null;
    foreach($tickets as $t) {
        if($t['ticket'] == $ticket_id && $t['proceso'] == $proceso_id && $t['fechafinal'] == null) {
            $ticket_actual = $t; break;
        }
    }

    include 'header.php';
    echo "<a href='bandeja.php' class='btn btn-outline' style='margin-bottom:15px;'>← Volver</a>";
    echo "<div class='card'>";
    echo "<h2 class='card-title'>Paso: " . htmlspecialchars($proceso['nombre']) . "</h2>";
    echo "<div style='margin-top:20px;'>";
    include $proceso['pantalla'].'.inc.php';
    echo "</div></div></body></html>";
}
?>