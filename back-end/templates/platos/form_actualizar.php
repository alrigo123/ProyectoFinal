<?php
//Parte del composer 
require '../../vendor/autoload.php';

//Validacion si el Id_Plato es numerico o esta definida (isset)
if (isset($_GET['Id_Plato']) && is_numeric($_GET['Id_Plato'])) {
  $id = $_GET['Id_Plato'];


  $plato = new FastFood\Plato;
  $resultado = $plato->mostrarPorId($id);
  //print '<pre>';
  //print_r($resultado);
  //die;

  //Si no existe el Id_Plato redirecciona al index dentro de platos 
  if (!$resultado)
    header("Location: indexGestion.php");
  //print '<pre>';
  //print_r($resultado);
  //die;

} else {
  header("Location: indexGestion.php");
}



?>
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

  <!-- Fixed navbar (Responsive) -->
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
  <!-- Formulario de Actualizacion -->
  <div class="container" id="main">
    <div class="row">
      <div class="col-md-12">
        <fieldset>
          <legend>Datos del Plato</legend>
          <!-- Inicio Formulario -->
          <form method="post" action="../acciones.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php print $resultado['Id_Plato'] ?>">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nombre Plato</label>
                  <input value="<?php print $resultado['NombrePlato'] ?>" type="text" class="form-control" name="NombrePlato" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Descripción</label>
                  <textarea class="form-control" name="Descripcion" id="" cols="3" required><?php print $resultado['Descripcion'] ?></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Categorias</label>
                  <select class="form-control" name="Categoria_Id" required>
                    <option value="" disabled selected>--SELECCIONE--</option>
                    <!-- Obtener Id y nombre de Categoria para mostrar los tipos de categoria de cada plato -->
                    <?php

                    require '../../vendor/autoload.php';
                    $categoria = new FastFood\Categoria;
                    $info_categoria = $categoria->mostrar();
                    $cantidad = count($info_categoria);

                    for ($x = 0; $x < $cantidad; $x++) {
                      $item = $info_categoria[$x];


                    ?>
                      <option value="<?php print $item['Id_Categoria'] ?>" <?php print $resultado['Id_Categoria'] == $item['Id_Categoria'] ? 'selected' : '' ?>>

                        <?php print $item['nombre'] ?>

                      </option>

                    <?php }  ?>

                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Imagen</label>
                  <input type="file" class="form-control" name="Imagen">
                  <input type="hidden" name="foto_temp" value="<?php print $resultado['Imagen'] ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Precio</label>
                  <input value="<?php print $resultado['Precio'] ?>" type="text" class="form-control" name="Precio" placeholder="S/. 0.00" required>
                </div>
              </div>
            </div>
            <input type="submit" class="btn btn-primary" name="accion" value="Actualizar">
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