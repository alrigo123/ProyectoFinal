<?php 
session_start();


if(!isset($_GET['Id_Plato']) OR !is_numeric($_GET['Id_Plato']))
    header('Location: carrito.php');

$id = $_GET['Id_Plato'];

if(isset($_SESSION['carrito'])){
    unset($_SESSION['carrito'][$id]);   
    header('Location: carrito.php');
}else{
    header('Location: indexCarta.php');
}
?>