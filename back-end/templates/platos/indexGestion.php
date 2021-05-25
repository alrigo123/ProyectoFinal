<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FastFoodSpartan</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/estilos.css">
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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../logout.php">Cerrar Sesion</a></li>
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
        <div class="pull-right">
          <a href="form_registrar.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Añadir Plato</a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <fieldset>
          <legend>Listado de Platos</legend>
          <table class="table table-bordered">
            <thead>
            <tbody>
              <tr>
                <th>#</th>
                <th>Nombre Plato</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th class="text-center">Foto</th>
                <th class="text-center">Acciones</th>
              </tr>
              </thead>


              <?php

              require '../../vendor/autoload.php';
              $plato = new FastFood\Plato;
              $info_plato = $plato->mostrar();

              //print '<pre>';
              //print_r($info_pelicula);
              //die;

              $cantidad = count($info_plato);
              if ($cantidad > 0) {
                $c = 0;
                for ($x = 0; $x < $cantidad; $x++) {
                  $c++;
                  $item = $info_plato[$x];

              ?>
                  <tr>
                    <td><?php print $c ?></td>
                    <td><?php print $item['NombrePlato'] ?></td>
                    <td><?php print $item['nombre'] ?></td>
                    <td>S/. <?php print $item['Precio'] ?></td>
                    <td class="text-center">
                      <?php
                      $foto = '../../upload/' . $item['Imagen'];

                      if (file_exists($foto)) {
                      ?>
                        <img src="<?php print $foto; ?>" width="70">
                      <?php } else { ?>
                        SIN FOTO
                      <?php } ?>
                    </td>
                    <td class="text-center">
                      <a href="../acciones.php?Id_Plato=<?php print $item['Id_Plato']; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                      <a href="form_actualizar.php?Id_Plato=<?php print $item['Id_Plato']; ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                    </td>
                  </tr>

                <?php
                }
              } else {
                ?>
                <tr>
                  <td colspan="6">No hay registros</td>
                </tr>

              <?php
              } ?>

            </tbody>
            </tbody>
          </table>
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