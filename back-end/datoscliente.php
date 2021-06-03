<?php
session_start();
require 'funciones.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DATOS</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
	  <link rel="stylesheet" href="assets/css/contact-form.css" type="text/css">
    <link href="favicon.html" rel="icon">
    <script src="https://kit.fontawesome.com/74c4c07f2a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/74c4c07f2a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&family=Merriweather:wght@300&family=Noto+Serif:ital@1&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Domine&family=Lora:ital@1&family=Merriweather:wght@300&family=Noto+Serif:ital@1&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
  </head>

  <body>

    <!-- Fixed navbar -->
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
          <a id="titulo-pagina" class="navbar-brand" href="indexCarta.php">Menu Platos</a>
          <ul class="nav navbar-nav pull-right">
            <li>
            <a id="car" href="carrito.php" class="btn"><i class="fas fa-shopping-cart"></i> CARRITO <span id="icon" class="badge"><?php print cantidadPlatos(); ?></span></a>            </li> 
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" id="main">
        <div class="main-form">
            <div class="row">
                <div class="col-md-12">
                    <fieldset>
                        <legend>Completar Datos</legend>
                        <!-- Cmabiar nombre al php -->
                            <form action="completar_pedido.php" method="post">
                                <div class="form-group">
                                <label id="iconos"> <i class="fa fa-user"> </i> Nombre(s)</label>
                                    <input type="text" class="form-control" name="Nombre" required>
                                </div>
                                <div class="form-group">
                                <label id="iconos"> <i class="fa fa-user"> </i> Apellidos</label>
                                    <input type="text" class="form-control" name="Apellido" required>
                                </div>
                                <div class="form-group">
                                <label id="iconos"> <i class="fa fa-envelope"> </i> Correo Electronico</label>
                                    <input type="email" class="form-control" name="Correo" required>
                                </div>
                                <div class="form-group">
                                <label id="iconos"> <i class="fa fa-phone"> </i> Celular o Teléfono</label>
                                    <input type="text" class="form-control" name="Celular" pattern="[0-9]+" maxlength="9" minlength="9" required>
                                </div>
                                <div class="form-group">
                                <label id="iconos"> <i class="fa fa-address-card-o"> </i> Dirección</label>
                                    <textarea name="Direccion" class="form-control"  rows="4" required></textarea>
                                </div>

                                <button id="icono-b" type="submit" class="btn btn-primary btn-block"><i id="icono-b" class="fas fa-check-circle"></i> Confirmar</button>
                                <button id="icono-b" type="reset" class="btn btn-primary btn-block"><i class="fa fa-trash"></i> LIMPIAR</button>
                            </form>
                    </fieldset>
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
