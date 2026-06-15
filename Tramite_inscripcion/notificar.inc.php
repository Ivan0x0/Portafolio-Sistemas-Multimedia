<form action="controlador.php" method="GET">
    <input type="hidden" name="flujo" value="<?php echo $flujo_id; ?>">
    <input type="hidden" name="proceso" value="<?php echo $proceso_id; ?>">
    <input type="hidden" name="ticket" value="<?php echo $ticket_id; ?>">
    
    <div style="background:#d1e7dd; color:#0a5c36; padding: 20px; border-radius: 8px; margin-bottom: 20px; text-align: center; border: 1px solid #badbcc;">
        <h3 style="margin-bottom: 10px;">🎉 ¡Inscripción Aprobada!</h3>
        <p>Kardex ha registrado oficialmente tus materias en el sistema. Puedes proceder a descargar tu programación académica.</p>
    </div>
    
    <div style="text-align: center;">
        <input type="submit" name="Siguiente" value="Entendido (Finalizar Trámite) ✓" class="btn btn-success">
    </div>
</form>