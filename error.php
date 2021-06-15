<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERROR 403</title>
    <link rel="stylesheet" href="back-end/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="back-end/assets/css/estilos.css">
    <link rel="stylesheet" href="back-end/assets/css/footer.css">
    <link rel="stylesheet" href="css/error.css">
    <script src="https://kit.fontawesome.com/74c4c07f2a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&family=Merriweather:wght@300&family=Noto+Serif:ital@1&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Domine&family=Lora:ital@1&family=Merriweather:wght@300&family=Noto+Serif:ital@1&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
</head>

<body class="m-0 row justify-content-center"  style="background: url('back-end/upload/not.png') no-repeat center fixed;     
    background-size: cover;">

    <div id="cara" class="container col-auto p-5 text-center">
        <br>
        <div class="col-md-12">
            <h2><strong>¡Oh no! Algo salió mal...<br>
                    Tu sesión expiró o no tienes permiso para acceder a este archivo
                </strong></h2><br>
        </div>
        <div id="imagen" class="col-md-12 justify-content-center">
            <a id="bt1" class="btn btn-success btn-lg" href="index.php" role="button"  style="margin-top:15px;">MENU PRINCIPAL</a>
            <a id="bt2" class="btn btn-success btn-lg" href="back-end/pago/dp.php" role="button" style="margin-top:15px;">Ver Detalle de Pago</a>
        </div>
    </div>

    <script src="js/noback.js"></script>
</body>

</html>
<?php
session_start();
session_destroy();
?>