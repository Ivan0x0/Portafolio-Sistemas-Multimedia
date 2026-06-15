<form action="controlador.php" method="GET">
    <input type="hidden" name="flujo" value="<?php echo $flujo_id; ?>">
    <input type="hidden" name="proceso" value="<?php echo $proceso_id; ?>">
    <input type="hidden" name="ticket" value="<?php echo $ticket_id; ?>">
    
    <label>Escriba las observaciones para el estudiante:</label><br>
    <textarea rows="4" cols="50" name="observaciones" required></textarea><br><br>
    
    <input type="submit" name="Siguiente" value="Devolver a Estudiante">
</form>