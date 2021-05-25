<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastFoodSpartan</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,300&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/login.css"> -->
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="titulo-pagina" class="navbar-brand" href="../index.php">FastFood Spartan</a>
            </div>

        </div>
    </nav>

    <div class="container" id="main">
        <div class="main-login">
            <form method="post" action="validar.php">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="text-center" style="font-family: 'Newsreader', serif; font-size: 20px; font-weight: bold;">ACCESO A GESTION DE PLATOS</h3>

                    </div>
                    <div class="panel-body">
                        <p class="text-center"><img src="assets/imagenes/logo2.png" alt="" width="150px"></p>
                        <h2 class="text-center" style="font-family: 'Newsreader', serif; font-size: 18px; font-weight: bold; font-style:oblique;">Ingrese datos para validar</h2>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="Username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="">Contraseña</label>
                            <input type="password" class="form-control" name="Contraseña" placeholder="Contraseña" required>
                        </div>
                        <!-- <button type="submit" class="btn btn-primary btn-block">Log In</button> -->
                        <input type="submit" value="Log In" class="btn btn-primary btn-block">
                    </div>
                </div>
            </form>
        </div>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>