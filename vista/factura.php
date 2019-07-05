<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <style>
            .center{
                text-align: center;
                padding: 100px;
                margin: 5px;
            }    
            table {
                width: 550px;
                border: 1px solid #999;
                text-align: left;
                border-collapse: collapse;
                margin: 0 0 1em 0;
                caption-side: top;
            }
            caption, td, th {
                padding: 0.3em;
            }
            th, td {
                border-bottom: 1px solid #999;
                width: 25%;
            }
            caption {
                font-weight: bold;
                font-style: italic;
            }
            .contenido{
                padding: 30px
            }

        </style>
        <title></title>
    </head>
    <body>
        <div>
            <h3 class="center" id="idFactura">Prueba Técnica</h3>
            <h4 class="center" id="idFactura">Factura</h4>
            <h5 class="center"><?php echo date("Y-m-d"); ?></h5>
        </div>
        <div  class="contenido"> 
            <br>
            <table>
                <tr>
                    <td>id</td>
                    <td>nombre</td>  
                    <td>cantidad</td>  
                    <td>valor unidad</td>  
                    <td>subtotal</td>  
                </tr>
                
                

                <?php
                $arregloNombre = explode(",", $_POST['nombreFactura']);
                $arregloCantidad = explode(",", $_POST['cantidadUsuario']);
                $arregloSubtotal= explode(",", $_POST['subtotal']);
               $arregloUnidad = explode(",", $_POST['valorUnidad']);
                
                
                
                for ($i = 0; $i < $_POST['numero']; $i++) {

                    ?>
                    <tr>
                        <td>1</td>
                        <td><?= $arregloNombre[$i]?></td>
                        <td><?= $arregloCantidad[$i]?></td>
                        <td><?= $arregloUnidad[$i] ?></td>
                        <td><?= $arregloSubtotal[$i] ?></td>
                    </tr>   
                    <?php
                }
                ?>
            </table>
            <table style="">
                <tr>  
                    <td>Total:</td>  
                    <td><?= $_POST['total'] ?></td>  
                </tr>
            </table>
        </div>
    </body>
</html>