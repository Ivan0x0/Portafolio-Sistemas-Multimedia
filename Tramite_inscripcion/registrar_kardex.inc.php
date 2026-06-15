<form action="controlador.php" method="GET">
    <input type="hidden" name="flujo" value="<?php echo $flujo_id; ?>">
    <input type="hidden" name="proceso" value="<?php echo $proceso_id; ?>">
    <input type="hidden" name="ticket" value="<?php echo $ticket_id; ?>">
    
    <p>Registro exitoso en el sistema central de la universidad.</p>
    
    <input type="submit" name="Siguiente" value="Pasar a Notificación">
</form>