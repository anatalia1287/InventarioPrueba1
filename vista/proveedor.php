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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script type="text/javascript" src="<?= PROYECTO_RECURSOS_JS ?>jquery-3.3.1.min.js"></script>  
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class=" row justify-content-center">
                <div class="col-7">
                    <br>
                    <center>
                        <div>
                            <h3>REGISTRAR INVENTARIO</h3>
                        </div>
                    </center>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre Producto">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="numeroLote"  name="numeroLote" placeholder="Número lote">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio">
                    </div>
                    <center>
                        <div class="row">
                            <div class="col-6">
                                <a class="btn btn-primary btn-lg btn-block" href="<?= MOSTRAR_INVENTARIO['url'] ?>">Inventario</a>

                            </div>
                            <div class="col-6">
                                <button class="btn btn-success btn-lg btn-block" id="guardar">Guardar</button>
                            </div>
                        </div>
                    </center>    
                </div>
            </div>
        </div>    
        <script>
            $('button#guardar').on('click', function (e) {
                var nombre = $('input#nombre').val();
                var cantidad = $('input#cantidad').val();
                var numeroLote = $('input#numeroLote').val();
                var fecha_vencimiento = $('input#fecha_vencimiento').val();
                var precio = $('input#precio').val();

                if (nombre == '' || cantidad == '' || numeroLote == '' || fecha_vencimiento == '' || precio == '') {
                    Swal.fire({
                        type: 'error',
                        text: 'Debe diligenciar todos los campos',
                    });
                } else {
                    $.ajax({
                        'url': '../index.php/proveedor/save',
                        'type': 'POST',
                        'data': {
                            "nombre": nombre,
                            "cantidad": cantidad,
                            "numeroLote": numeroLote,
                            "fecha_vencimiento": fecha_vencimiento,
                            "precio": precio,
                        },
                        'success': function (re) {
                            console.log(re);
                            Swal.fire({
                                type: 'success',
                                text: 'Se registro correctamente',
                            });
                        }
                    });
                }
            });
        </script>
    </body>    
</html>



