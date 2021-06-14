<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    require '../vendor/autoload.php';

    if (isset($_SESSION['carrito'])) {

        $pago = new FastFood\Pago;
        date_default_timezone_set("America/Lima");
        $_params = array(
            'IdPedido' => $_POST['Id_Pedido'],
            'Total' => $_POST['Total'],
            'FechaPago' => date('Y-m-d H:i:s'),
            'TipoPago' => $_POST['TipoPago']

        );

        $pagoid = $pago->registrarPago($_params);

            //Aqui poner las funciones d eresgistro apgo y registro detalee d apgo

        date_default_timezone_set("America/Lima");
          $_params = array(
                'FechaDetalle' => date('Y-m-d H:i:s'),
                'TotalDetalle' => $_POST['Total'],
                'Id_Pago' => $_POST['Id_Pago']
            );
    
        $pagoid = $pago->registrarDetallePago($_params);
  


        $_SESSION['carrito'] = array();


//agregar envio a correo de geral


        header('Location: dp.php');
    }else{
        header('Location: ../../error.php');
        echo 'ERROR';
    }
}
