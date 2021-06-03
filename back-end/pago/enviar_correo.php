<?php 
session_start();
if (isset($_SESSION['carrito'])) {  
  //Si el el producto existe en el carrito
  echo 'work';
  } else {
    //echo 'do not work';
    //die;
    header('Location: ../../index.php');
  }
require '../vendor/autoload.php';
$pago = new FastFood\Pago;
$info_correo = $pago->mostrarCorreo();
      
     $cantidad = count($info_correo);
     if ($cantidad > 0) {
       for ($x = 0; $x < $cantidad; $x++) {
         $item = $info_correo[$x];
    }
     $correo = $item['Correo'];
     $nombre = $item['Nombre'];
     $direccion = $item['Direccion'];
    }else{
         echo 'Error';
         header('Location: ../../index.php');
     }
     //agregar archivo en formato pdf
     echo $correo;
     mail($correo,$nombre,$direccion);

     session_unset();
     session_destroy();

     header ('Location: gracias.php')
?>

