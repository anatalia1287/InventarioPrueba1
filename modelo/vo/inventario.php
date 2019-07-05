<?php

namespace modelo\vo;

use modelo\generico\IEntidad;

class Inventario{
    
    private $id;
    private $nombre;
    private $cantidad;
    private $numeroLote;
    private $fecha_vencimiento;
    private $precio;

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getNumeroLote() {
        return $this->numeroLote;
    }

    function getFecha_vencimiento() {
        return $this->fecha_vencimiento;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setNumeroLote($numeroLote) {
        $this->numeroLote = $numeroLote;
    }

    function setFecha_vencimiento($fecha_vencimiento) {
        $this->fecha_vencimiento = $fecha_vencimiento;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }
}
