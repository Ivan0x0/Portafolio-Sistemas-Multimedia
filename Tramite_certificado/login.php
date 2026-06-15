<?php
session_start();
if(isset($_GET['rol'])) {
    $_SESSION['usuario'] = $_GET['rol'];
    header("Location: bandeja.php");
    exit();
}
include 'header.php'; 
?>

<div class="card" style="max-width: 400px; margin: 50px auto; text-align: center;">
    <h2 class="card-title">Acceso al Sistema</h2>
    <p style="color: var(--texto-secundario); margin-bottom: 20px; font-size: 14px;">Seleccione su perfil operativo para continuar:</p>
    
    <div style="display: flex; flex-direction: column; gap: 10px;">
        <a href="login.php?rol=estudiante" class="btn btn-outline">📚 Entrar como Estudiante</a>
        <a href="login.php?rol=asesor" class="btn btn-outline">👨‍🏫 Entrar como Asesor</a>
        <a href="login.php?rol=kardex" class="btn btn-outline">🗄️ Entrar como Kardex</a>
    </div>
</div>

</body>
</html>