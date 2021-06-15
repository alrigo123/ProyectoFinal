<?php 
if (isset($_SESSION['carrito'])) {  
  //Si el el producto existe en el carrito
  echo 'work';
  } else {
   // echo 'do not work';
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
<body class="m-0 row justify-content-center">
<div id="cara" class="container col-auto p-5 text-center">
  <br>
  <div class="col-md-12">  
    <h1><strong>Su pedido le llegará en la brevedad posible <br></strong> Gracias por realizar tu comprar en Fastfood Spartan</h1>
  </div>
    <div id="imagen" class="col-md-12 justify-content-center">
      <a class="btn btn-success btn-lg" href="../../index.php" role="button" style="margin-bottom:15px;margin-top: 10px;">INICIO</a>
      <br>
      <img src="../upload/final.png" alt="" style="margin-bottom:15px;">
    </div>
</div>
</body>
</html>