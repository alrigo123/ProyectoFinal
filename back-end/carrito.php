<?php
//ACTIVAR SESIONES EN PHP 
session_start();
require 'funciones.php';



if (isset($_GET['Id_Plato']) && is_numeric($_GET['Id_Plato'])) {
    $id = $_GET['Id_Plato'];
    require 'vendor/autoload.php';
    $plato = new FastFood\Plato;
    $resultado = $plato->mostrarPorId($id);

    if (!$resultado)
        header('Location: index.php');




    if (isset($_SESSION['carrito'])) { //Si la sesion del carrito existe
        //Si el el producto existe en el carrito
        if (array_key_exists($id, $_SESSION['carrito'])) {

            actualizarPlato($id);
        } else {
            //Si el el producto no existe en el carrito
            agregarPlato($resultado, $id);
        }
    } else {
        //Si el carrito no existe
        agregarPlato($resultado, $id);
    }

    //print '<pre>';
    //print_r($_SESSION['carrito']);
    //die;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarritoFastFood</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <script src="https://kit.fontawesome.com/74c4c07f2a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&family=Merriweather:wght@300&family=Noto+Serif:ital@1&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Domine&family=Lora:ital@1&family=Merriweather:wght@300&family=Noto+Serif:ital@1&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="titulo-pagina" class="navbar-brand" href="indexCarta.php">Menu Platos</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a id="car" href="carrito.php" class="btn"><i class="fas fa-shopping-cart"></i> CARRITO <span id="icon" class="badge"><?php print cantidadPlatos(); ?></span></a>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container" id="main">
        <table class="table table-bordered table-hover">
            <thead>
            <tbody>
                <tr>
                    <th>Orden</th>
                    <th>Plato</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th class="text-center">Cantidad</th>
                    <th>Total</th>
                    <th class="text-center">Actualizar/Eliminar</th>
                </tr>
                </thead>
            <tbody>
                <?php

                if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                    $c = 0;
                    foreach ($_SESSION['carrito'] as $indice => $value) {
                        $c++;
                        $total = $value['Precio'] * $value['cantidad'];

                ?>
                        <tr>
                            <form action="actualizar_carrito.php" method="post">
                                <td><?php print $c ?></td>
                                <td><?php print $value['NombrePlato'] ?></td>
                                <td><?php
                                    $foto = 'upload/' . $value['Imagen'];

                                    if (file_exists($foto)) {
                                    ?>
                                        <img src="<?php print $foto; ?>" width="35">
                                    <?php } else { ?>
                                        <img src="assets/imagenes/not-found.jpg" width="35">
                                    <?php } ?>
                                </td>
                                <td>S/. <?php print $value['Precio'] ?></td>
                                <td class="col-xs-2">
                                    <input type="hidden" name="Id_Plato" value="<?php print $value['Id_Plato'] ?>">
                                    <input id="cantidad" type="text" name="cantidad" class="form-control u-size-100" value="<?php print $value['cantidad'] ?> ">
                                </td>
                                <td>
                                    S/. <?php print $total ?>
                                </td>
                                <td id="iconos" class="col-xs-2">
                                    <div class="acciones">
                                        <button type="submit" class="btn btn-success btn-xs">
                                            <span class="glyphicon glyphicon-refresh text"></span>
                                        </button>
                                        <a href="eliminar_carrito.php?Id_Plato=<?php print $value['Id_Plato'] ?>" class="btn btn-danger btn-xs">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>
                                </td>
                            </form>
                        </tr>

                    <?php
                    }
                } else {

                    ?>
                    <tr>
                        <td colspan="7">No tiene platos seleccionados..
                        </td>
                    </tr>
                    
                    <div id="agregar" class="pull-left">
                                <a href="indexCarta.php" class="btn btn-info">Agregar Platos</a>
                            </div>
                <?php

                }

                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right">Total </td>
                    <td>S/. <?php print calcularTotal(); ?> </td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
        <hr>
        <?php
        if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {

        ?>
            <div class="row">
                <div class="pull-left">
                    <a href="indexCarta.php" class="btn btn-info">Seguir comprando</a>
                </div>
                <div class="pull-right">
                    <a href="datoscliente.php" class="btn btn-success">Finalizar compra</a>
                </div>

            </div>
        <?php
        }
        ?>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>