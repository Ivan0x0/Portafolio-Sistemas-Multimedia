<form action="controlador.php" method="GET">
    <input type="hidden" name="flujo" value="<?php echo $flujo_id; ?>">
    <input type="hidden" name="proceso" value="<?php echo $proceso_id; ?>">
    <input type="hidden" name="ticket" value="<?php echo $ticket_id; ?>">
    <p style="margin-bottom: 15px;">El documento ha sido firmado. Notifique la entrega.</p>
    <input type="submit" name="Siguiente" value="Finalizar Entrega" class="btn btn-primary">
</form>