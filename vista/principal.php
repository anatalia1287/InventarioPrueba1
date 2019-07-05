<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script type="text/javascript" src="<?= PROYECTO_RECURSOS_JS ?>jquery-3.3.1.min.js"></script>
        <title>INVENTARIO</title>
    </head>
    <body>
        <div class="container">
            <br>
            <div class="row justify-content-center">
                <div class="col-4">
                    <a class="btn btn-primary btn-lg btn-block" href="<?=MOSTRAR_CONTENIDO['url']?>">Soy proveedor</a>
                    <a class="btn btn-primary btn-lg btn-block" href="<?=MOSTRAR_COMPRA['url']?>">Soy Cliente</a>
                    <a class="btn btn-primary btn-lg btn-block" href="<?=MOSTRAR_INVENTARIO['url']?>">Inventario</a>
                </div>
            </div>
        </div>
    </body>
</html>

