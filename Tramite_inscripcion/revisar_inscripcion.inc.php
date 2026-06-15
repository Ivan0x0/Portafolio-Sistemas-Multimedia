<form action="controlador.php" method="GET">
    <input type="hidden" name="flujo" value="<?php echo $flujo_id; ?>">
    <input type="hidden" name="proceso" value="<?php echo $proceso_id; ?>">
    <input type="hidden" name="ticket" value="<?php echo $ticket_id; ?>">
    
    <p>Revise la solicitud del estudiante. ¿Aprueba la inscripción?</p>
    
    <input type="radio" name="decision" value="verdad" required> Aprobar (Mandar a Kardex)<br>
    <input type="radio" name="decision" value="falso"> Rechazar (Devolver al Estudiante)<br><br>
    
    <input type="submit" name="Siguiente" value="Procesar Decisión">
</form>