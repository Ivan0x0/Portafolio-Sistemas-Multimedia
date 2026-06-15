<form action="controlador.php" method="GET">
    <input type="hidden" name="flujo" value="<?php echo $flujo_id; ?>">
    <input type="hidden" name="proceso" value="<?php echo $proceso_id; ?>">
    <input type="hidden" name="ticket" value="<?php echo $ticket_id; ?>">
    <p style="margin-bottom: 15px;">¿El comprobante de pago es válido y corresponde al arancel?</p>
    <div class="form-group">
        <label><input type="radio" name="decision" value="verdad" required> Sí, comprobante válido (Emitir)</label>
        <label><input type="radio" name="decision" value="falso"> No, pago inválido (Devolver)</label>
    </div>
    <input type="submit" name="Siguiente" value="Procesar Verificación" class="btn btn-success">
</form>