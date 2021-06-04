<?php 
session_start();

if (isset($_SESSION['carrito'])) {  
    //Si el el producto existe en el carrito
    echo 'work';
    } else {
      echo 'do not work';
      //die;
     //header('Location: ../../index.php');
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
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <a id="titulo-pagina" class="navbar-brand" href="#">"No puedes comprar la felicidad ,pero puedes comprar comida y esto es muy rapido"</a>
            </div>
            <!--/.nav-collapse -->
        </div>
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
        <h3 class="display-4">Correo de envio: <input type="text" value="<?php print $item['Correo'] ?>" disabled></h3>
<?php 
     }else{
         echo 'Error';
     }
?>
        <h1 class="display-4">Seleccionar <strong class="b_bold">METODO DE PAGO</strong></h1>
        <form action="#" method="post">
        <div id="botones" class="col-md-3 align-items-center">
            <a class="btn btn-info btn-lg btn-block" type="submit" name="accion" value="Tarjeta" href="pagotarjeta.php" role="button"><i class="fab fa-cc-visa"></i> Pago con tarjeta VISA</a>
        </div>
        </form>
        <form action="#" method="post">
        <div id="botones" class="col-md-3 align-items-center">
            <a class="btn btn-info btn-lg btn-block" type="submit" name="accion" value="Efectivo" href="dpcontra.php" role="button"><i class="far fa-money-bill-alt"></i> Pago contra entrega (+ S/. 2) </a>
        </div>
        </form>
    </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>