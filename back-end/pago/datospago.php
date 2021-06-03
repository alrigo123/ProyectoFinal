<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    require '../vendor/autoload.php';

    if (isset($_SESSION['carrito'])) {

        $pago = new FastFood\Pago;

        $_params = array(
            'IdPedido' => $_POST['Id_Pedido'],
            'Total' => $_POST['Total'],
            'FechaPago' => date('Y-m-d\TH:i:sP'),
            'TipoPago' => $_POST['TipoPago']

        );

        $pagoid = $pago->registrarPago($_params);

            //Aqui poner las funciones d eresgistro apgo y registro detalee d apgo



        $_SESSION['carrito'] = array();





        header('Location: dp.php');
    }else{
        header('Location: ../../index.php');
    }
}
