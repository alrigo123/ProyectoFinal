<?php

session_start();
if (isset($_SESSION['carrito'])) {
    echo 'work';
  } else {
    echo 'do no work';
   // die;
    header('Location: ../error.php');
  }

if($_SERVER['REQUEST_METHOD'] ==='POST'){

    require 'funciones.php';
    require 'vendor/autoload.php';

    if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
        $cliente = new FastFood\Cliente;
    
        $_params = array(
            'Nombre' => $_POST['Nombre'],
            'Apellido' => $_POST['Apellido'],
            'Correo' => $_POST['Correo'],
            'Celular' => $_POST['Celular'],
            'Direccion' => $_POST['Direccion']
            
        );
    
        $cliente_id = $cliente->registrar($_params);
    
        
        $pedido = new FastFood\Pedido;
        date_default_timezone_set("America/Lima");
        $_params = array(
            'Total' => calcularTotal(),
            'FechaPedido' => date('Y-m-d H:i:s'),
            'Id_Cliente'=>$cliente_id
        );
        
        $pedido_id =  $pedido->registrar($_params);

        foreach($_SESSION['carrito'] as $indice => $value){
            $_params = array(
                "IdPlato" => $value['Id_Plato'],
                "IdPedido" => $pedido_id,
                "PrecioUnit" => $value['Precio'],
                "Cantidad" => $value['cantidad'],
            );

            $pedido->registrarDetalle($_params);
        }

        $_SESSION['carrito'] = array();

        header('Location: pago/pago.php');

    }


}//PORQUE ME BOTA ERROR ESO PRBAR 
    ?>
