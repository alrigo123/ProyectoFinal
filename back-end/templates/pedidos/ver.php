
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FastFood Spartan</title>

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
          <a class="navbar-brand" href="../dashboard.php">Fastfood Spartan</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li class="active">
              <a href="index.php" class="btn">Pedidos</a>
            </li> 
            <li>
              <a href="../peliculas/indexGestion.php" class="btn">Platos</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">admin <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Salir</a></li>
                </ul>
            </li>
          </ul>




        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" id="main">
    <div class="row">
          <div class="col-md-12">
            <fieldset>
                <?php
                    require '../../vendor/autoload.php';
                    $id = $_GET['Id_Pedido'];
                    $pedido = new FastFood\Pedido;

                   $info_pedido = $pedido->mostrarPorId($id);

                   $info_detalle_pedido = $pedido->mostrarDetallePorIdPedido($id);



                ?>


                <legend>Información de la Compra</legend>
                <div class="form-group">
                    <label>Nombre</label>
                    <input value="<?php print $info_pedido['Nombre'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Apellido</label>
                    <input value="<?php print $info_pedido['Apellido'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Correo Electronico</label>
                    <input value="<?php print $info_pedido['Correo'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Direccion</label>
                    <input value="<?php print $info_pedido['Direccion'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Fecha de Pedido</label>
                    <input value="<?php print $info_pedido['FechaPedido'] ?>" type="text" class="form-control" readonly>
                </div>
               


                <hr>
                    Productos Comprados
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
                      if($cantidad > 0){
                        $c=0;
                      for($x =0; $x < $cantidad; $x++){
                        $c++;
                        $item = $info_detalle_pedido[$x];
                        $total = $item['PrecioUnit'] * $item['Cantidad'];
                        
                    ?>


                    <tr>
                    
                      <td><?php print $c?></td>
                      <td><?php print $item['NombrePlato']?></td>
                      <td>
                      <?php
                          $foto = '../../upload/'.$item['Imagen'];
                          if(file_exists($foto)){
                        ?>
                          <img src="<?php print $foto; ?>" width="35">
                      <?php }else{?>
                          SIN FOTO
                      <?php }?>
                      </td>
                      <td><?php print $item['PrecioUnit']?> PEN</td>
                      <td><?php print $item['Cantidad']?></td>
                    <td>
                    <?php print $total?>
                    </td>
                    </tr>

                    <?php
                      }
                    }else{
                      
                      //print $item['NombrePlato'];
                     // die;
                    ?>
                    <tr>
                      <td colspan="6">NO HAY REGISTROS</td>
                      
                    </tr>

                    <?php }?>
                  
                  
                  </tbody>

                </table>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Total Compra</label>
                        <input value="<?php print $info_pedido['Total'] ?>" type="text" class="form-control" readonly>
                    </div>
                </div>
                
            </fieldset>
            <div class="pull-left">
                <a href="index.php" class="btn btn-default hidden-print">Cancelar</a>
            </div>

            <div class="pull-right">
                <a href="javascript:;" id="btnImprimir" class="btn btn-danger hidden-print">Imprimir</a>
            </div>

            
             
          </div>
        </div>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script>
        $('#btnImprimir').on('click',function(){

            window.print();

            return false;

        })
                        
    </script>

  </body>
</html>
