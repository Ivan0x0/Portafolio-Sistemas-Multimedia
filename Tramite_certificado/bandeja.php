<?php 
session_start();
include "json_helper.php";

if(!isset($_SESSION['usuario'])) { header("Location: login.php"); exit(); }

$usuario = $_SESSION['usuario'];
$todos = leer_json('ticket.json');

// Lógica de filtrado
$pendientes = array_filter($todos, function($t) use ($usuario){
    return $t['usuario'] === $usuario && $t['fechafinal'] == null;
});
$completados = array_filter($todos, function($t) use ($usuario){
    return $t['usuario'] === $usuario && $t['fechafinal'] != null;
});

include 'header.php';
?>

<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 20px;">
    <h2>Bandeja de Entrada</h2>
    <?php if($usuario === 'estudiante'): ?>
        <a href="nuevo_tramite.php" class="btn btn-primary">➕ Nuevo Trámite</a>
    <?php endif; ?>
</div>

<div class="stats-grid">
    <div class="stat-box">
        <h3><?php echo count($pendientes); ?></h3>
        <p>Pendientes</p>
    </div>
    <div class="stat-box">
        <h3><?php echo count($completados); ?></h3>
        <p>Atendidos</p>
    </div>
    <div class="stat-box" style="border-bottom-color: var(--verde);">
        <h3><?php echo count($todos); ?></h3>
        <p>Total en el Sistema</p>
    </div>
</div>

<div class="card">
    <h2 class="card-title">Trámites por Atender</h2>
    <?php if(count($pendientes) > 0): ?>
        <table>
            <tr>
                <th>N° Ticket</th>
                <th>Flujo</th>
                <th>Fase Actual</th>
                <th>Fecha Ingreso</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($pendientes as $t): ?>
            <tr>
                <td><strong>#<?php echo str_pad($t['ticket'], 4, "0", STR_PAD_LEFT); ?></strong></td>
                <td><span class="badge"><?php echo $t['flujo']; ?></span></td>
                <td><?php echo $t['proceso']; ?></td>
                <td><?php echo $t['fechainicial']; ?></td>
                <td>
                    <a class="btn btn-primary" style="padding: 6px 12px; font-size:12px;" href="controlador.php?flujo=<?php echo $t['flujo']; ?>&proceso=<?php echo $t['proceso']; ?>&ticket=<?php echo $t['ticket']; ?>">Atender →</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p style="text-align:center; padding: 20px; color: var(--texto-secundario);">No tienes trámites pendientes en este momento.</p>
    <?php endif; ?>
</div>

</body>
</html>