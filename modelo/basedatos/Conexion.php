<?php
namespace modelo\basedatos;

use PDO;

class Conexion {

    public static function conectar() {
        $cnn = new PDO('pgsql:host=localhost;port=5432;dbname=PruebaTecnica', 'postgres', 'postgres');
        $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $cnn;
    }

}
