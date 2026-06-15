<?php 
define('DATA_DIR', __DIR__ .'/data/');

function leer_json($archivo){
    $ruta = DATA_DIR . $archivo;
    if(!file_exists($ruta)) return [];
    $contenido = file_get_contents($ruta);
    return json_decode($contenido, true) ?? [];
}

function guardar_json($archivo, $datos){
    $ruta = DATA_DIR . $archivo;
    $json = json_encode($datos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents($ruta, $json);
}


function obtener_flujo($flujos_array, $flujo_id) {
    foreach($flujos_array as $f) {
        if($f['flujo'] == $flujo_id) return $f;
    }
    return null;
}

function buscar_proceso($flujo, $proceso_id) {
    foreach($flujo['procesos'] as $p){
        if($p['id'] == $proceso_id) return $p;
    }
    return null;
}

function buscar_condicion($flujo, $proceso_id) {
    if(!isset($flujo['condiciones'])) return null;
    foreach($flujo['condiciones'] as $c){
        if($c['proceso'] == $proceso_id) return $c;
    }
    return null;
}
?>