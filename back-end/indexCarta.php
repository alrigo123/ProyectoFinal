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
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a id="titulo-pagina" class="navbar-brand" href="../index.php">FastFood Spartan</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
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
      $info_platos = $plato->mostrar();
      
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
                  <img style="width:325px; height:200px;" src="<?php print $foto; ?>" class="img-resposive" data-toggle="popover" data-trigger="hover" data-content="<?php echo $item['Descripcion']; ?>">
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