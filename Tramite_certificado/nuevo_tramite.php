<?php
session_start();
include "json_helper.php";

if(!isset($_SESSION['usuario'])) { header("Location: login.php"); exit(); }

$tickets = leer_json('ticket.json');
$nuevo_id = count($tickets) + 1;

$tickets[] = [
    'ticket' => $nuevo_id,
    'flujo' => 'F2',
    'proceso' => 'P1',
    'usuario' => 'estudiante',
    'fechainicial' => date('Y-m-d H:i:s'),
    'fechafinal' => null
];

guardar_json('ticket.json', $tickets);
header("Location: bandeja.php");
exit();
?>