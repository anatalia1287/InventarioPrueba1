<?php

require_once './cargar.php';
require_once './rutas.php';

use modelo\basedatos\Conexion;

if (!isset($_SERVER['PATH_INFO'])) {
    include_once './vista/principal.php';
    return;
}
$ruta = URL_PRINCIPAL. $_SERVER['PATH_INFO'];
$cnn = Conexion::conectar();
foreach (get_defined_constants() as $constante) {
    if (!is_array($constante)) {
        continue;
    }
    if ($ruta == $constante['url']) {
        $clase = '\\control\\' . $constante['clase'];
        $metodo = $constante['metodo'];
        $obj = new $clase($cnn);
        $obj->$metodo();
        break;
    }
}

