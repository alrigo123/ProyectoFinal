<?php
session_start();
require 'funciones.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FastFoodSpartan</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="stylesheet" href="../cssb/footer.css">
  <link rel="stylesheet" href="assets/css/footer.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/estilos.css">
  <script src="https://kit.fontawesome.com/74c4c07f2a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&family=Merriweather:wght@300&family=Noto+Serif:ital@1&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <!-- <a  id="" href="#" style="color:#fff;" class="navbar-brand scroll-top" target="_blank">FastFood Spartan</a> -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <a id="titulo-pagina" class="navbar-brand" href="../index.php">Inicio</a>
        <ul class="nav navbar-nav pull-right">
          <li>
            <a id="car" href="carrito.php" class="btn"><i class="fas fa-shopping-cart"></i> CARRITO <span id="icon" class="badge badge-success"> <?php print cantidadPlatos(); ?></span></a>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container" id="main">
    <!-- MOSTRAR LA CARTA DE PLATOS PARA AÑADIR AL CARRITO -->
    <div class="row">
      <?php
      require 'vendor/autoload.php';
      $plato = new FastFood\Plato;
      $info_platos = $plato->mostrar(); //order by algo
      $cantidad = count($info_platos);
      if ($cantidad > 0) {
        for ($x = 0; $x < $cantidad; $x++) {
          $item = $info_platos[$x];
      ?>

          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-heading ">
                <h1 class="text-center nombre-plato"><?php print $item['NombrePlato'] ?>
                  <BR></BR>
                  S/. <?php print $item['Precio'] ?>
                </h1>
              </div>
              <div class="panel-body">
                <?php
                $foto = 'upload/' . $item['Imagen'];

                if (file_exists($foto)) {
                ?>
                  <a href="carrito.php?Id_Plato=<?php print $item['Id_Plato']; ?>">
                    <img style="width:325px; height:200px;" src="<?php print $foto; ?>" class="img-resposive" data-toggle="popover" data-trigger="hover" data-content="<?php echo $item['Descripcion']; ?>" href="">
                  </a>
                <?php } else { ?>
                  <img src="assets/imagenes/not-found.jpg" class="img-resposive">
                <?php } ?>
              </div>

              <div class="panel-footer">
                <a href="carrito.php?Id_Plato=<?php print $item['Id_Plato']; ?>" class="btn btn-success btn-block">
                  <span class="glyphicon glyphicon-shopping-cart"> Añadir a Carrito</span>

                  <!-- 
                     <i class="fas fa-cart-plus">    Compra</i> -->
                </a>
              </div>

            </div>

          </div>

        <?php }
      } else { ?>
        <h4>No hay registros</h4>
      <?php } ?>
    </div>

  </div> <!-- /container -->

  <footer id="footer" class="text-center text-lg-start bg-light text-muted">
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <div id="social" class="container">
        <div class="row">
          <div class="col-md-4">
            <p id="fast">Copyright &copy; 2021 FastFood Spartan</p>
          </div>
          <div class="col-md-4">
            <ul class="social-icons">
              <a id="s1" rel="nofollow" href="https://www.facebook.com/Spartan-Fast-Food-103642148450759" target="_parent"><i class="fa fa-facebook"></i></a>
              <a id="s2" href="https://www.instagram.com/spartan.22/"><i class="fa fa-instagram"></i></a>
            </ul>
          </div>
          <div class="col-md-4">
            <p id="fast">Designed by <em>UAC-ADS-II</em></p>
          </div>
        </div>
      </div>
  </footer>


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script>
    $(function() {
      $('[data-toggle="popover"]').popover()
    });
  </script>

</body>

</html>