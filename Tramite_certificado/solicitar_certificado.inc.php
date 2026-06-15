<form action="controlador.php" method="GET">
    <input type="hidden" name="flujo" value="<?php echo $flujo_id; ?>">
    <input type="hidden" name="proceso" value="<?php echo $proceso_id; ?>">
    <input type="hidden" name="ticket" value="<?php echo $ticket_id; ?>">

    <?php if(isset($ticket_actual['observaciones']) && !empty($ticket_actual['observaciones'])): ?>
        <div style="background:#f8d7da; color:#842029; padding: 15px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #dc3545;">
            <strong>⚠️ Trámite devuelto por Kardex:</strong><br>
            <?php echo htmlspecialchars($ticket_actual['observaciones']); ?>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <label>Tipo de Certificado:</label>
        <select name="tipo_cert" required>
            <option value="regularidad">Certificado de Regularidad</option>
            <option value="notas">Certificado de Notas</option>
            <option value="egreso">Certificado de Egreso</option>
        </select>
    </div>
    
    <div class="form-group">
        <label>Número de Comprobante de Pago (Caja):</label>
        <input type="text" name="comprobante" placeholder="Ej: CAJA-12345" required>
    </div>
    
    <div style="text-align: right; margin-top: 20px; display: flex; justify-content: flex-end; gap: 10px;">
        <!-- Si Kardex devolvió el trámite, mostramos el botón de Cancelar -->
        <?php if(isset($ticket_actual['observaciones']) && !empty($ticket_actual['observaciones'])): ?>
            <input type="submit" name="Cancelar" value="❌ Cancelar Trámite" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas cancelar esta solicitud de certificado definitivamente?');" formnovalidate>
        <?php endif; ?>

        <input type="submit" name="Siguiente" value="Enviar a Kardex →" class="btn btn-primary">
    </div>
</form>