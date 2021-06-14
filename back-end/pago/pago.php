<?php
session_start();


if (isset($_SESSION['carrito'])) {
    echo 'work';
} else {
    echo 'do no work';
    // die;0
    // header('Location: ../../error.php');
}


require '../vendor/autoload.php';
$pago = new FastFood\Pago;
$info_correo = $pago->mostrarCorreo();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarritoFastFood</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/74c4c07f2a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&family=Merriweather:wght@300&family=Noto+Serif:ital@1&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Domine&family=Lora:ital@1&family=Merriweather:wght@300&family=Noto+Serif:ital@1&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="design/css/diseño.css">
    <script src="https://kit.fontawesome.com/74c4c07f2a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&family=Merriweather:wght@300&family=Noto+Serif:ital@1&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Domine&family=Lora:ital@1&family=Merriweather:wght@300&family=Noto+Serif:ital@1&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right">
                <li>
                    <a id="titulo-pagina" class="navbar-brand" href="#" style="left: -700px;">"No puedes comprar la felicidad ,pero puedes comprar comida y esto es muy rapido"</a>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </nav>
    <br>
    <!-- BODY TEXT -->
    <div class="jumbotron">
        <?php


        $cantidad = count($info_correo);
        if ($cantidad > 0) {
            for ($x = 0; $x < $cantidad; $x++) {
                $item = $info_correo[$x];
            }
        ?>
            <h3 id="correo" class="display-4">Su correo: <br><input id="incorreo" type="text" value="<?php print $item['Correo'] ?>" disabled></h3>
        <?php
        } else {
            echo 'Error';
        }
        ?>
        <h1 id="metodo" class="display-12">Seleccionar <strong class="b_bold">METODO DE PAGO</strong></h1>
        <!-- <div class="row justify-content-center">
            <a id="btn1" class="btn btn-info btn-lg" type="submit" name="accion" value="Tarjeta" href="pagotarjeta.php" role="button"><i class="fab fa-cc-visa"></i> Tarjeta VISA</a>

            <a id="btn2" class="btn btn-info btn-lg " type="submit" name="accion" value="Efectivo" href="dpcontra.php" role="button"><i class="far fa-money-bill-alt"></i> Contra entrega<strong> (+ S/. 2) </strong></a>

        </div> -->
        <div class="container" style="margin-top:40px;">
            <div id="row" class="row">
                <div class="col-lg-6 mb-4" style="margin-bottom:40px; border-bottom:1px solid black;">
                    <!-- VISA -->
                    <div class="card">
                        <img style="border-radius: 15px;" class="card-img-top" src="../upload/visa.jpg" alt="">

                        <div class="card-body">
                            <h3 class="card-title"><strong>Tarjeta Visa</strong></h3>
                            <p class="card-text">
                                Some quick example text to build on
                                the card title and make up the bulk
                                of the card's content.
                            </p>
                            <a id="btn1" class="btn btn-info" type="submit" name="accion" value="Tarjeta" href="pagotarjeta.php" role="button"><i class="fab fa-cc-visa"></i> Tarjeta VISA</a>
                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4" style="border-bottom:1px solid black; ">
                    <div class="card">
                        <img style="border-radius: 15px;" class="card-img-top" src="../upload/contra.jpg" alt="">

                        <div class="card-body">
                        <h3 class="card-title"><strong>Contra Entrega</strong></h3>
                            <p class="card-text">
                                Some quick example text to build on the
                                card title and make up the bulk of the
                                card's content.
                            </p>
                            <a id="btn2" class="btn btn-info" type="submit" name="accion" value="Efectivo" href="dpcontra.php" role="button" style="width:40%;"><i class="far fa-money-bill-alt"></i> Contra entrega<strong> (+ S/. 2) </strong></a>
                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>