<?php
session_name("validar");
session_start();
include('db.php');
$usuario = $_POST['Username'];
$contraseña = $_POST['Contraseña'];
$_SESSION['Username'] = $usuario;

$conexion = mysqli_connect("localhost", "root", "", "proyectofastfood");

$consulta = "SELECT*FROM administrador where Username='$usuario' and Contraseña='$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas) {
  header("location:../back-end/templates/platos/indexGestion.php");
} else {
?>

  <?php

  include("indexLogin.php"); //cambiar ruta evitar datos de formulario ¿?

  ?>

  <h1 id="bad" class="text-center">Error de Validacion <br>Credenciales Incorrectas</h1>

<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>