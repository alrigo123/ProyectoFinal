<?php 

session_start();

if($_SERVER['REQUEST_METHOD'] ==='POST'){
    require 'funciones.php';
    $id = $_POST['Id_Plato'];
    $cantidad = $_POST['cantidad'];

    if(is_numeric($cantidad)){

        if(array_key_exists($id,$_SESSION['carrito']))
            actualizarPlato($id,$cantidad);  
    }

    header("Location:carrito.php");
}

?>