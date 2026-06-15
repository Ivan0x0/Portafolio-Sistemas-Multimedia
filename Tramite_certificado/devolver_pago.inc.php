<form action="controlador.php" method="GET">
    <input type="hidden" name="flujo" value="<?php echo $flujo_id; ?>">
    <input type="hidden" name="proceso" value="<?php echo $proceso_id; ?>">
    <input type="hidden" name="ticket" value="<?php echo $ticket_id; ?>">
    
    <div class="form-group">
        <label>Motivo de rechazo de pago:</label>
        <textarea rows="3" name="observaciones" placeholder="Explique por qué el comprobante no es válido..." required></textarea>
    </div>
    
    <input type="submit" name="Siguiente" value="Devolver al Estudiante" class="btn btn-danger">
</form>