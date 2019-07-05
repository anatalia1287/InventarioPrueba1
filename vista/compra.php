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
                        <br>
                        <label>Seleccione un producto</label>
                        <br>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="producto" multiple="">
                            <option>Seleccione</option> 
                            <?php
                            foreach ($resultado as $r) {
                                ?>
                                <option><?= $r->nombre?></option>  
                                <?php
                                
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label>Mi producto</label><br>
                        <div class="form-group row" id="mis_productos">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-success btn-lg btn-block" id="comprar" >Comprar</button>
                        </div>
                        <div class="col-6">
                            <form action="../control/GenerarFacturaControl.php" method="post">
                                <button class="btn btn-success btn-lg btn-block" id="facturar" > Generar Facturar</button>
                                <input type="text" class="nombreFactura" id="nombreFactura" name="nombreFactura" hidden="">
                                <input type="text" id="cantidadUsuario" name="cantidadUsuario" hidden="">
                                <input type="text" id="valorUnidad" name="valorUnidad" hidden="" >
                                <input type="text" id="subtotal" name="subtotal" hidden="" >
                                <input type="text" id="numero" name="numero" hidden="" >
                                <input type="text" id="total" name="total" hidden="" >
                                <label id="nombreFactura1"></label>
                            </form>  
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <button class="btn btn-success btn-lg btn-block" id="cancelar" >Cancelar compra</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function () {
            var seleccion;
            var arregloNombre = [];
            
            $('button#comprar').hide();
            $('button#facturar').hide();
            $('button#cancelar').hide();
            $("#producto").change(function () {
                seleccion = $('#producto').val();
                var numeroProductos = seleccion.length;

                for (var i = 0; i <= numeroProductos - 1; i++) {

                    $("#mis_productos").append("<label class='col-sm-1 col-form-label'>" + seleccion[i] + "</label>" + "<div class='col-sm-11'><input class='form-control cant'  type='number' id='cantidad' name='cantidad[]' placeholder='cantidad'</div>");
                    arregloNombre.push(seleccion[i]);
                }
                $('button#comprar').show();

            });

// Comprar

            $('button#comprar').on('click', function (e) {
                var arregloCantidad = [];
                var cantidad = document.getElementsByClassName("cant");
                for (var i = 0; i < cantidad.length; i++) {
                    arregloCantidad.push(cantidad[i].value);
                }

                console.log(arregloNombre);
                if ($('#cantidad').val() == '') {
                    Swal.fire({
                        type: 'error',
                        text: 'Debe diligenciar el campo cantidad',
                    });
                } else {
                    var cantidad = $('input#cantidad').val();

                    $.ajax({
                        'url': '../index.php/compra/save',
                        'type': 'POST',
                        'data': {
                            "cantidad": arregloCantidad,
                            "nombre": arregloNombre
                        },
                        'success': function (re) {


                            if (re == 'error') {
                                Swal.fire({
                                    type: 'error',
                                    text: 'Esa cantidad de productos no se encuentra disponible',
                                });
                            } else {
                                var total = 0;
                                var arregloPrecios = re.split(',');
                                var arregloSubtotal = [];
                                for (var i = 0; i <= arregloPrecios.length - 1; i++) {
                                    arregloSubtotal.push(arregloPrecios[i] * arregloCantidad[i]);
                                    total += arregloSubtotal[i];
                                }

                                Swal.fire({
                                    type: 'success',
                                    text: 'El total de su compra es de: ' + total,
                                });
                                
                                $('#nombreFactura').val(arregloNombre);
                                $('#cantidadUsuario').val(arregloCantidad);
                                $('#subtotal').val(arregloSubtotal);
                                $('#valorUnidad').val(arregloPrecios);
                                $('#total').val(total); 
                                $('#numero').val(arregloNombre.length);
                                $('button#facturar').show();
                                $('button#cancelar').show();
                            }
                        }
                    });
                }

            });

            // cancelar

            $('button#cancelar').on('click', function (e) {
                var arregloCantidad = [];
                var cantidad = document.getElementsByClassName("cant");
                for (var i = 0; i < cantidad.length; i++) {
                    arregloCantidad.push(cantidad[i].value);
                }
                $.ajax({
                    'url': '../index.php/cancelar',
                    'type': 'POST',
                    'data': {
                        "cantidad": arregloCantidad,
                        "nombre": arregloNombre
                    },
                    'success': function (re) {
                        Swal.fire({
                            type: 'success',
                            text: re,
                        });

                        setTimeout(function () {
                            location.reload();
                        }, 4000);

                    }
                });


            });



        });

    </script>
</html>