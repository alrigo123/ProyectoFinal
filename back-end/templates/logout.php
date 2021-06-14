<?php
session_name("validar");
  session_destroy();
  header('Location: ../../index.php');
?>
