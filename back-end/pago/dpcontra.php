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
//usar esta validacion en todas las paginas --> <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        <a class="navbar-brand" href="#">Fastfood Spartan</a>
      </div>
    </div>
  </nav>

  <div class="container" id="main">
    <form action="datospago.php" method="post">
      <div class="row">
        <div class="col-md-12">
          <fieldset>
            <?php
            require '../vendor/autoload.php';

            $pago = new FastFood\Pago;

            $info_pedido = $pago->mostrarPedido();

            $info_detalle_pedido = $pago->mostrarDetallePedido();

            $info_correo = $pago->mostrarCorreo();

            $info_pago = $pago->mostrarPago();


            $cantidad = count($info_correo);
            if ($cantidad > 0) {
              for ($x = 0; $x < $cantidad; $x++) {
                $item = $info_correo[$x];

            ?>



                <legend>Información de Pago</legend>
                <div class="form-group">
                  <label>Nombre</label>
                  <input value="<?php print $item['Nombre'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label>Correo Electronico</label>
                  <input value="<?php print $item['Correo'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label>Direccion</label>
                  <input value="<?php print $item['Direccion'] ?>" type="textarea" class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label>Numero de celular</label>
                  <input value="<?php print $item['Celular'] ?>" type="text" class="form-control" readonly>
                </div>
            <?php }
            } ?>


<?php 
 $cantidad = count($info_pago);
 if ($cantidad > 0) {
   for ($x = 0; $x < $cantidad; $x++) {
     $item = $info_pago[$x];
?>
                    <input value="<?php print $item['Id_Pago']; ?>" type="hidden" name="Id_Pago" class="form-control" readonly>
               
                <?php }} ?>


            <?php
            $cantidad = count($info_pedido);
            if ($cantidad > 0) {
              for ($x = 0; $x < $cantidad; $x++) {

                $item = $info_pedido[$x];
            ?>

                <div class="form-group">
                <input type="hidden" value="<?php echo $item['Id_Pedido']?>" name="Id_Pedido">
                  <label>Fecha de Pago</label>
                  <input value="<?php print $item['FechaPedido'] ?>" type="text" class="form-control" readonly>
                </div>

            <?php }
            } ?>



            <div class="form-group">
              <label>Tipo de Pago</label>
              <input value="Contra Entrega" name="TipoPago" type="text" class="form-control" readonly>
            </div>



            <hr>
            Descripcion de Productos Comprados
            <hr>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre de Plato</th>
                  <th>Imagen</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>
                    Total
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php


                $cantidad = count($info_detalle_pedido);

                if ($cantidad > 0) {
                  $c = 0;
                  for ($x = 0; $x < $cantidad; $x++) {

                    $c++;
                    $item = $info_detalle_pedido[$x];


                ?>


                    <tr>
                      <input type="hidden" name="IdDetPedido" value="<?php print $item['IdDetPedido']; ?>">
                      <td><?php print $c ?></td>
                      <td><?php print $item['NombrePlato'] ?></td>
                      <td>
                        <?php
                        $foto = '../upload/' . $item['Imagen'];
                        if (file_exists($foto)) {
                        ?>
                          <img src="<?php print $foto; ?>" width="35">
                        <?php } else { ?>
                          SIN FOTO
                        <?php } ?>
                      </td>
                      <td>S/. <?php print $item['Precio'] ?> </td>
                      <td ><?php print $item['Cantidad'] ?></td>
                      <td>S/.
                        <?php 
                        print $item['TotalP'] ?>
                      </td>
                    </tr>

                    <tr>


                    </tr>
                <?php
                  }
                }
                ?>



              </tbody>


            </table>
            <div class="col-md-3">
              <div class="form-group">
                <!-- este total el final -->
                <label>Total Compra</label>
                <input value="S/.  <?php 
                $valor = $item['Total']+2;
                print $valor; ?>" type="text" name="" class="form-control" readonly>

                <input type="hidden" name="Total" value="<?php print $valor; ?>">
              </div>
            </div>


          </fieldset>
          <div id="pay">
          <button id="btnpay" type="submit" class="btn btn-warning btn-lg">Confirmar</button>
          </div>

    </form>


  </div>
  </div>


  </div> <!-- /container -->


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  <script>
    $('#btnImprimir').on('click', function() {

      window.print();
      return false;

    })
  </script>

</body>

</html>