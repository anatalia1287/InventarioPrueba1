<?php

namespace control;

use modelo\vo\Inventario;
use modelo\dao\InventarioDAO;
use const RUTA_PRINCIPAL;

class InventarioControl {

    protected $cnn;
    private $InventarioDAO;

    public function __construct(&$cnn) {
        $this->cnn = $cnn;
        $this->InventarioDAO = new InventarioDAO($cnn);
    }

    public function index() {
        include RUTA_PRINCIPAL . '/vista/proveedor.php';
    }

    public function indexCompra() {
        $inventario = new Inventario();
        $resultado = $this->InventarioDAO->getProductos($inventario);
        include_once RUTA_PRINCIPAL . '/vista/compra.php';
    }

    public function registrarInventario() {

        $registro = new Inventario();
        $registro->setNombre($_POST['nombre']);
        $registro->setCantidad($_POST['cantidad']);
        $registro->setNumeroLote($_POST['numeroLote']);
        $registro->setFecha_vencimiento($_POST['fecha_vencimiento']);
        $registro->setPrecio($_POST['precio']);
        $registro = $this->InventarioDAO->guardar($registro);
        echo 1;
    }

    public function compra() {
        $resultados = array();
        $precio = array();
        $contador = 0;
        $total = 0;
        $resultadoTotal = 0;
        $devolverTotal = false;
        $cantidadUsuario = $_POST['cantidad'];
        $nombre = $_POST['nombre'];
        for ($i = 0; $i <= count($cantidadUsuario) - 1; $i++) {
            $resultado = $this->InventarioDAO->consutaInventario($nombre[$i]);
            array_push($resultados, $resultado);
        }
        for ($i = 0; $i <= count($resultados) - 1; $i++) {
            if ($cantidadUsuario[$i] > $resultados[$i][0]->cantidad) {
                echo 'error';
                return 0;
            } else {
                if ($contador > 0) {
                    echo 'error';
                } else {
                    array_push($precio, $resultados[$i][0]->precio);
                    $total = $resultados[$i][0]->precio * $cantidadUsuario[$i];
                    $nuevaCantidad = $resultados[$i][0]->cantidad - $cantidadUsuario[$i];
                    $inventario = new Inventario();
                    $inventario->setCantidad($nuevaCantidad);
                    $inventario->setNombre($nombre[$i]);
                    $this->InventarioDAO->actualizarInventario($inventario);
                    $resultadoTotal += $total;
                    $devolverTotal = true;
                }
            }
        }
        if ($devolverTotal) {
           $cadenaPrecio = implode(',', $precio);
            echo $cadenaPrecio;
        }
    }
    public function indexInventario() {
        $resultado = $this->InventarioDAO->getTodos();
        include_once RUTA_PRINCIPAL . '/vista/inventario.php';
    }

    public function cancelar() {
        $cantidadUsuario = $_POST['cantidad'];
        $nombre = $_POST['nombre'];
        $resultados = array();

        for ($i = 0; $i <= count($cantidadUsuario) - 1; $i++) {
            $resultado = $this->InventarioDAO->consutaInventario($nombre[$i]);
            array_push($resultados, $resultado);
        }
        for ($i = 0; $i <= count($resultados) - 1; $i++) {
            $nuevaCantidad = $resultados[$i][0]->cantidad + $cantidadUsuario[$i];
            $inventario = new Inventario();
            $inventario->setCantidad($nuevaCantidad);
            $inventario->setNombre($nombre[$i]);
            $this->InventarioDAO->actualizarInventario($inventario);
        }
        echo 'La compra se ha cancelado exitosamente';
    }

}
