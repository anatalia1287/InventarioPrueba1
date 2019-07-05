<?php

namespace modelo\dao;

use modelo\vo\Inventario;
use PDO;

class InventarioDAO  {

    protected $cnn;

    public function __construct(&$cnn) {
        $this->cnn = $cnn;
    }
    function guardar(Inventario $inventario) {
        $sentencia = $this->cnn->prepare('insert into inventario (nombre, cantidad, numero_lote, fecha_vencimiento, precio) values(?, ?, ?, ?, ?)');
        $sentencia->execute(array($inventario->getNombre(), $inventario->getCantidad(), $inventario->getNumeroLote(), $inventario->getFecha_vencimiento(), $inventario->getPrecio()));
    }
    
    public function getProductos(){
    $sentencia = $this->cnn->prepare('select nombre from inventario order by nombre ASC');
    $sentencia->execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_CLASS);
    return  $resultado;
    }
    
    public function consutaInventario($nombre){
        $sentencia = $this->cnn->prepare("select cantidad, precio from inventario where nombre = ?" );
        $sentencia->execute(array($nombre));
        $resultado = $sentencia->fetchAll(PDO::FETCH_CLASS);
        return $resultado;
    }
    
    public function actualizarInventario(Inventario $inventario){        
        $sentencia = $this->cnn->prepare("update inventario set cantidad = ? where nombre = ?" );
        $sentencia->execute(array($inventario->getCantidad(), $inventario->getNombre()));
    }
    public function getTodos(){
    $sentencia = $this->cnn->prepare('select * from inventario');
    $sentencia->execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_CLASS);
    return  $resultado;
    }
}