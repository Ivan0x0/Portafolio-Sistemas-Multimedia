<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio de Sistemas y Multimedia - UMSA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header">
            <h1>PORTAFOLIO WEB</h1>
            <p>Universidad Mayor de San Andrés</p>
        </div>

        <h2>Sistemas BPM</h2>
        <a href="Tramite_inscripcion/login.php" target="_blank" class="enlace-externo">
            1. Inscripción Materias <span class="icono-externo">↗</span>
        </a>
        <a href="Tramite_certificado/login.php" target="_blank" class="enlace-externo">
            2. Emisión Certificados <span class="icono-externo">↗</span>
        </a>
        <button class="tablink" onclick="abrirSeccion(event, 'Diagramas')">3. Diagramas del Sistema</button>

        <hr class="divisor">

        <h2>Proyectos Grupales</h2>
        <button class="tablink" onclick="abrirSeccion(event, 'Unity')">Animación en Unity</button>
        <button class="tablink" onclick="abrirSeccion(event, 'Avatar')">Avatar Digital 3D</button>

        <hr class="divisor">

        <h2>Proyecto Individual</h2>
        <button class="tablink" onclick="abrirSeccion(event, 'IncisoA')">A. Clasificación Texturas</button>
        <button class="tablink" onclick="abrirSeccion(event, 'IncisoB')">B. Filtro de Suavizado</button>
        <button class="tablink" onclick="abrirSeccion(event, 'IncisoC')">C. La Vaca Lola</button>
    </div>

    <div class="content">

        <div id="Bienvenida" class="seccion activa">
            <h2>Panel de Presentación</h2>
            <p>Bienvenido al portafolio centralizado de proyectos.</p>
            <p><strong>Instrucciones de Navegación:</strong></p>
            <ul>
                <li>Para evaluar la lógica de negocios y persistencia de datos (Archivos JSON), haga clic en los enlaces de la sección <strong>Sistemas BPM</strong>.</li>
                <li>Navegue por el menú lateral para evaluar el resto de las producciones multimedia.</li>
            </ul>
        </div>

        <div id="Diagramas" class="seccion">
            <h2>Diagramas de Flujo y Procesos (BPM)</h2>
            <p>Documentación visual de los sistemas de trámites.</p>
            
            <div class="galeria-diagramas">
                <div class="item-diagrama">
                    <h4>Flujo de Inscripción</h4>
                    <img src="inscripcion.jpg" alt="Diagrama de Inscripción">
                </div>

                <div class="item-diagrama">
                    <h4>Flujo de Certificados</h4>
                    <img src="certificados.jpg" alt="Diagrama de Certificados">
                </div>
            </div>
        </div>

        <div id="Unity" class="seccion">
            <h2>Animación Sincronizada en Unity (WebGL)</h2>
            <p>Coreografía ejecutada en tiempo real mediante el motor gráfico Unity, integrando control de estados (Animator) y Audio Source nativo.</p>
            
            <div style="width: 100%; height: 600px; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
                <iframe src="LindasChiquillas/index.html" style="width: 100%; height: 100%; border: none;"></iframe>
            </div>
        </div>
        
        <div id="Avatar" class="seccion">
            <h2>Avatar Digital (Fotogrametría)</h2>
            <p>Comparativa interactiva: Video original de escaneo (izquierda) vs. Modelo 3D procesado (derecha).</p>
            
            <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.4.0/model-viewer.min.js"></script>

            <div style="display: flex; gap: 20px; align-items: stretch; margin-top: 20px; flex-wrap: wrap;">
                
                <div style="flex: 1; min-width: 300px; background: #2c3e50; border-radius: 8px; padding: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); display: flex; flex-direction: column;">
                    <h3 style="color: white; text-align: center; margin-top: 0; margin-bottom: 15px;">Video Fuente</h3>
                    <video width="100%" style="border-radius: 4px; flex-grow: 1; object-fit: cover; max-height: 500px;" controls>
                        <source src="PROYECTO.mov" type="video/mp4">
                        Tu navegador no soporta la reproducción de videos HTML5.
                    </video>
                </div>

                <div style="flex: 1; min-width: 300px; background-color: #f0f2f5; border-radius: 8px; padding: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); display: flex; flex-direction: column;">
                    <h3 style="text-align: center; margin-top: 0; margin-bottom: 15px; color: #2c3e50;">Modelo Renderizado</h3>
                    <div style="flex-grow: 1; min-height: 400px; border-radius: 4px; overflow: hidden; background-color: #ffffff;">
                        <model-viewer 
                            src="modeo3d.glb" 
                            alt="Avatar 3D generado por fotogrametría" 
                            auto-rotate 
                            camera-controls 
                            shadow-intensity="1"
                            interaction-prompt="auto"
                            style="width: 100%; height: 100%; outline: none;">
                        </model-viewer>
                    </div>
                </div>

            </div>
        </div>
        <div id="IncisoA" class="seccion">
            <h2>A. Clasificación de Texturas en Tiempo Real</h2>
            <p>Sube una imagen para que el algoritmo de Visión Artificial (OpenCV) la analice y clasifique las superficies al instante.</p>
            
            <form action="index.php" method="POST" enctype="multipart/form-data" style="margin-bottom: 20px; background: #f8f9fa; padding: 20px; border-radius: 8px; border: 1px solid #ddd;">
                <input type="file" name="imagen_subida" accept="image/*" required style="margin-bottom: 15px; display: block;">
                <button type="submit" style="background-color: #3498db; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">Analizar Imagen</button>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['imagen_subida'])) {
                $nombre_archivo = basename($_FILES['imagen_subida']['name']);
                $ruta_destino = "uploads/" . $nombre_archivo;

                if (move_uploaded_file($_FILES['imagen_subida']['tmp_name'], $ruta_destino)) {
                    
                    $comando = "python clasificador.py " . escapeshellarg($ruta_destino) . " 2>&1";
                    $resultado_python = shell_exec($comando);

                    echo "<div style='padding:15px; background-color:#e8f4f8; border-left:4px solid #3498db; border-radius: 4px;'>";
                    echo "<h3 style='margin-top:0; color: #2c3e50;'>Análisis Concluido: <br><strong style='color: #e74c3c; font-size: 0.9em;'>" . htmlspecialchars($resultado_python) . "</strong></h3>";
                    echo "<div class='galeria-diagramas'>";
                    echo "<div class='item-diagrama'><h4>Imagen Subida</h4><img src='$ruta_destino' alt='Original'></div>";
                    echo "<div class='item-diagrama'><h4>Clasificación (OpenCV)</h4><img src='resultado_textura.jpg?" . time() . "' alt='Procesada'></div>";
                    echo "</div></div>";

                    echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('Bienvenida').classList.remove('activa');
                            document.getElementById('IncisoA').classList.add('activa');
                        });
                    </script>";
                }
            }
            ?>
        </div>

        <div id="IncisoB" class="seccion">
            <h2>Filtro de Promedio 3x3</h2>
            <p>Aplicación de suavizado mediante el recorrido de una matriz (ventana) de 3x3 píxeles sobre la imagen original para promediar sus valores.</p>

            <form action="index.php" method="POST" enctype="multipart/form-data" style="margin-bottom: 20px; background: #f8f9fa; padding: 20px; border-radius: 8px; border: 1px solid #ddd;">
                <input type="file" name="imagen_suavizar" accept="image/*" required style="margin-bottom: 15px; display: block;">
                <button type="submit" style="background-color: #27ae60; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">Aplicar Suavizado (3x3)</button>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['imagen_suavizar'])) {
                $nombre_archivo_b = basename($_FILES['imagen_suavizar']['name']);
                $ruta_destino_b = "uploads/" . $nombre_archivo_b;

                if (move_uploaded_file($_FILES['imagen_suavizar']['tmp_name'], $ruta_destino_b)) {
                    
                    $comando_b = "python suavizado.py " . escapeshellarg($ruta_destino_b) . " 2>&1";
                    $resultado_python_b = shell_exec($comando_b);

                    echo "<div style='padding:15px; background-color:#eafaf1; border-left:4px solid #27ae60; border-radius: 4px;'>";
                    echo "<h3 style='margin-top:0; color: #2c3e50;'>Análisis Concluido: <br><strong style='color: #e74c3c; font-size: 0.9em;'>" . htmlspecialchars($resultado_python_b) . "</strong></h3>";
                    echo "<div class='galeria-diagramas'>";
                    echo "<div class='item-diagrama'><h4>Imagen Original</h4><img src='$ruta_destino_b' alt='Original'></div>";
                    echo "<div class='item-diagrama'><h4>Filtro Aplicado</h4><img src='resultado_suavizado.jpg?" . time() . "' alt='Suavizada'></div>";
                    echo "</div></div>";

                    echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('Bienvenida').classList.remove('activa');
                            document.getElementById('IncisoB').classList.add('activa');
                        });
                    </script>";
                }
            }
            ?>
        </div>

        <div id="IncisoC" class="seccion">
            <h2>Cover y Animación: La Vaca Lola</h2>
            <p>Producción vinculando IA de voz y modelo en Mixamo.</p>
            
            <div style="text-align: center; margin-top: 20px; background: #2c3e50; border-radius: 8px; padding: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
                <video width="100%" style="border-radius: 4px; max-height: 600px;" controls>
                    <source src="LaVacaLola.mp4" type="video/mp4">
                    Tu navegador no soporta la reproducción de videos HTML5.
                </video>
            </div>
        </div>

    </div>

    <script>
        function abrirSeccion(evento, idSeccion) {
            var secciones = document.getElementsByClassName("seccion");
            for (var i = 0; i < secciones.length; i++) { 
                secciones[i].classList.remove("activa"); 
            }
            
            var botones = document.getElementsByClassName("tablink");
            for (var i = 0; i < botones.length; i++) { 
                botones[i].className = botones[i].className.replace(" active", ""); 
            }
            
            document.getElementById(idSeccion).classList.add("activa");
            evento.currentTarget.className += " active";
        }
    </script>
</body>
</html>