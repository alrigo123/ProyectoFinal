<?php 
if (isset($_SESSION['carrito'])) {  
  //Si el el producto existe en el carrito
  echo 'work';
  } else {
    echo 'do not work';
    //die;
  // header('Location: ../../index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FastFood Spartan</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="stylesheet" href="design/css/diseño.css">
  </head>
<body>
  si selecciona envair por correo poner el correo
    <h1>Gracias por comprar en fsat food spartan</h1>
    <a class="btn btn-success" href="../../index.php" role="button">REGRESAR</a>
</body>
</html>