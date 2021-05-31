<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FastFoodSpartan</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/estilos.css">
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
        <a id="titulo-pagina" class="navbar-brand" href="../../../index.php">FastFood Spartan</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav pull-right">
          <!-- <li>
            <a href="../pedidos/index.php" class="btn">Pedidos</a>
          </li> -->
          <li class="active">
            <a href="indexGestion.php" class="btn">Gestión de Plato</a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">admin <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../logout.php">Salir</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>



  <div class="container" id="main">
    <div class="row">
      <div class="col-md-12">
        <fieldset>
          <legend>Datos del Plato</legend>
          
          <!-- Inicio Formulario -->
          <form method="post" action="../acciones.php" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nombre del Plato</label>
                  <input type="text" class="form-control" name="NombrePlato" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Descripción</label>
                  <textarea class="form-control" name="Descripcion" id="" cols="3" required></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Categorias</label>
                  <select class="form-control" name="Categoria_Id" required>
                    <option value="" disabled selected>--SELECCIONE--</option>
                    <?php

                    require '../../vendor/autoload.php';
                    $categoria = new FastFood\Categoria;
                    $info_categoria = $categoria->mostrar();
                    $cantidad = count($info_categoria);

                    for ($x = 0; $x < $cantidad; $x++) {
                      $item = $info_categoria[$x];


                    ?>
                      <option value="<?php print $item['Id_Categoria'] ?>"><?php print $item['nombre'] ?></option>

                    <?php }  ?>


                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Imagen</label>
                  <input type="file" class="form-control" name="Imagen" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Precio</label>
                  <input type="text" class="form-control" name="Precio" placeholder="0.00" required>
                </div>
              </div>
            </div>
            <input type="submit" name="accion" class="btn btn-primary" value="Registrar">
            <a href="indexGestion.php" class="btn btn-default">Cancelar</a>
          </form>
        </fieldset>

      </div>
    </div>

  </div> <!-- /container -->


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>

</body>

</html>