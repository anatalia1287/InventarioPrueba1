<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">        
        <script type="text/javascript" src="<?= PROYECTO_RECURSOS_JS ?>jquery-3.3.1.min.js"></script>
        <script src="<?= PROYECTO_RECURSOS_JS ?>bootstrap.min.js" src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class=" row justify-content-center">
                <div class="col-7">
                    <div>
                        <center>
                            <br>
                            <h3>CONSULTAR INVENTARIO</h3>
                            <br>
                             <a class="btn btn-primary btn-lg" href="<?=MOSTRAR_CONTENIDO['url']?>">Registrar</a>
                        </center>
                         <br>                            

                    </div>
                    <div>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Número de lote</th>
                                    <th scope="col">Fecha vencimiento</th>
                                    <th scope="col">Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($resultado as $r) {
                                    ?>    
                                    <tr>
                                        <th scope="row"><?= $r->id?></th>
                                        <td><?= $r->nombre ?></td>
                                        <td><?= $r->cantidad ?></td>
                                        <td><?= $r->numero_lote ?></td>
                                        <td><?= $r->fecha_vencimiento ?></td>
                                        <td><?= $r->precio ?></td>
                                    </tr>
                                <?php } ?>    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>