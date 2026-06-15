<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Trámites UMSA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="header">
        <div class="header-inner">
            <div class="logo-umsa">UMSA</div>
            <div>
                <h1 style="font-size:20px;">Sistema de Trámites BPM</h1>
                <p style="font-size:13px; opacity:0.8;">Universidad Mayor de San Andrés</p>
            </div>
            <?php if(isset($_SESSION['usuario'])): ?>
                <div style="margin-left:auto; display:flex; gap:10px; align-items:center;">
                    <span style="font-size: 14px;">👤 <?php echo strtoupper($_SESSION['usuario']); ?></span>
                    <a href="login.php" class="btn btn-outline" style="background:rgba(255,255,255,0.2); color:white; border:none; padding: 6px 12px;">Cambiar Rol</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="main-container">