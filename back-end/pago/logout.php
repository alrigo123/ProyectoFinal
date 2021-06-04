<?php
  session_start();
  session_destroy();
  if (isset($_SESSION['carrito'])) {  
    //Si el el producto existe en el carrito
    echo 'work';
    die;
    } else {
      //echo 'do not work';
      //die;
     header('Location: gracias.php');//cambiar a gracias
    }
?>
