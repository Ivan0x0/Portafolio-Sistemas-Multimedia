<form action="controlador.php" method="GET">
    <input type="hidden" name="flujo" value="<?php echo $flujo_id; ?>">
    <input type="hidden" name="proceso" value="<?php echo $proceso_id; ?>">
    <input type="hidden" name="ticket" value="<?php echo $ticket_id; ?>">
    
    <div style="background:#e1f5ee; color:#0f6e56; padding: 20px; border-radius: 8px; margin-bottom: 20px; text-align: center; border: 1px solid #badbcc;">
        <h3 style="margin-bottom: 10px;">🎓 ¡Certificado Emitido!</h3>
        <p>Kardex ha procesado tu pago y ha emitido tu certificado exitosamente. Ya puedes pasar a ventanilla a recoger el documento físico.</p>
    </div>
    
    <div style="text-align: center;">
        <input type="submit" name="Siguiente" value="Entendido (Cerrar Trámite) ✓" class="btn btn-success">
    </div>
</form>