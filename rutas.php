<?php
define('RUTA_PRINCIPAL', __DIR__);
define('PROYECTO', '/PruebaTecnica/');
define('PROYECTO_RECURSOS_CSS', PROYECTO . 'vista/css/');
define('PROYECTO_RECURSOS_JS', PROYECTO . 'vista/js/');

define('URL_PRINCIPAL', '/PruebaTecnica/index.php');
define('MOSTRAR_CONTENIDO', array(
    'clase' => 'InventarioControl',
    'metodo' => 'index',
    'url' => URL_PRINCIPAL. '/proveedor'
));

define('MOSTRAR_COMPRA', array(
    'clase' => 'InventarioControl',
    'metodo' => 'indexCompra',
    'url' => URL_PRINCIPAL. '/compra'
));

define('GUARDAR_PROVEEDOR', array(
    'clase' => 'InventarioControl',
    'metodo' => 'registrarInventario',
    'url' => URL_PRINCIPAL. '/proveedor/save'
));

define('COMPRA', array(
    'clase' => 'InventarioControl',
    'metodo' => 'compra',
    'url' => URL_PRINCIPAL. '/compra/save'
));

define('MOSTRAR_INVENTARIO', array(
    'clase' => 'InventarioControl',
    'metodo' => 'indexInventario',
    'url' => URL_PRINCIPAL. '/inventario'
));

define('CANCELAR', array(
    'clase' => 'InventarioControl',
    'metodo' => 'cancelar',
    'url' => URL_PRINCIPAL. '/cancelar'
));

