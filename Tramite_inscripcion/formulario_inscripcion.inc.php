<form action="controlador.php" method="GET">
    <input type="hidden" name="flujo" value="<?php echo $flujo_id; ?>">
    <input type="hidden" name="proceso" value="<?php echo $proceso_id; ?>">
    <input type="hidden" name="ticket" value="<?php echo $ticket_id; ?>">
    
    <?php if(isset($ticket_actual['observaciones']) && !empty($ticket_actual['observaciones'])): ?>
        <div style="background:#f8d7da; color:#842029; padding: 15px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #dc3545;">
            <strong>⚠️ Trámite devuelto por el asesor:</strong><br>
            <?php echo htmlspecialchars($ticket_actual['observaciones']); ?>
        </div>
    <?php endif; ?>
    
    <div class="form-group">
        <label>Por favor, ingrese los nombres exactos de las materias a inscribir separadas por comas:</label>
        <textarea rows="4" name="materias_texto" placeholder="Ej: Programación I, Cálculo, Física..." required></textarea>
    </div>
    
    <div style="text-align: right; margin-top: 20px; display: flex; justify-content: flex-end; gap: 10px;">
        <!-- Si tiene observaciones, mostramos el botón de Cancelar -->
        <?php if(isset($ticket_actual['observaciones']) && !empty($ticket_actual['observaciones'])): ?>
            <input type="submit" name="Cancelar" value="❌ Cancelar Trámite" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas cancelar esta solicitud definitivamente?');" formnovalidate>
        <?php endif; ?>
        
        <input type="submit" name="Siguiente" value="Enviar al Asesor →" class="btn btn-primary">
    </div>
</form>