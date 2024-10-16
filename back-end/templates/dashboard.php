<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FastFoodSpartan</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/estilos.css">
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
        <a class="navbar-brand" href="indexLogin.php">FastFood Spartan</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav pull-right">
          <li>
            <a href="pedidos/index.php" class="btn">Pedidos</a>
          </li>
          <li>
            <a href="platos/indexGestion.php" class="btn">Platos</a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Cerrar Sesion</a></li>
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
          <legend>Listado de los 10 últimos Pedidos</legend>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>N° Pedido</th>
                <th>Total</th>
                <th>Fecha</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              require '../vendor/autoload.php';
              $pedido = new FastFood\Pedido;
              $info_pedido = $pedido->mostrarUltimos();


              $cantidad = count($info_pedido);
              if ($cantidad > 0) {
                $c = 0;
                for ($x = 0; $x < $cantidad; $x++) {
                  $c++;
                  $item = $info_pedido[$x];
              ?>


                  <tr>
                    <td><?php print $c ?></td>
                    <td><?php print $item['Nombre'] . ' ' . $item['Apellido'] ?></td>
                    <td><?php print $item['Id_Pedido'] ?></td>
                    <td><?php print $item['Total'] ?> PEN</td>
                    <td><?php print $item['FechaPedido'] ?></td>

                    <td class="text-center">
                      <a href="pedidos/ver.php?Id_Pedido=<?php print $item['Id_Pedido'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>

                    </td>

                  </tr>

                <?php
                }
              } else {

                ?>
                <tr>
                  <td colspan="6">NO HAY REGISTROS</td>
                </tr>

              <?php } ?>


            </tbody>

          </table>
        </fieldset>
      </div>
    </div>

  </div> <!-- /container -->


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>