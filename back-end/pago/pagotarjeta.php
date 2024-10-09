<?php 
session_start();

if (isset($_SESSION['carrito'])) {  
	//Si el el producto existe en el carrito
	//echo 'work';
	} else {
	  //echo 'do not work';
	  //die;
	 // header('Location: ../../error.php');
	}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
   
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Formulario de Tarjeta de Crédito Dinámico</title>

	<link rel="stylesheet" href="design/css/estilos.css">

</head>





	


<body>

<nav class="navbar navbar-default navbar">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <a id="titulo-pagina" class="navbar-brand" href="#">"No puedes comprar la felicidad ,pero puedes comprar comida y esto es muy rapido"</a>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>



	<div class="contenedor">

		<!-- Tarjeta -->
		<section class="tarjeta" id="tarjeta">
			<div class="delantera">
				<div class="logo-marca" id="logo-marca">
					<!-- <img src="img/logos/visa.png" alt=""> -->
				</div>
				<img src="design/img/chip-tarjeta.png" class="chip" alt="">
				<div class="datos">
					<div class="grupo" id="numero">
						<p class="label">Número Tarjeta</p>
						<p class="numero">#### #### #### ####</p>
					</div>
					<div class="flexbox">
						<div class="grupo" id="nombre">
							<p class="label">Nombre Tarjeta</p>
							<p class="nombre">Su Nombre</p>
						</div>
						<div class="grupo" id="expiracion">
							<p class="label">Expiracion</p>
							<p class="expiracion"><span class="mes">MM</span> / <span class="year">AA</span></p>
						</div>
					</div>
				</div>
			</div>

			<div class="trasera">
				<div class="barra-magnetica"></div>
				<div class="datos">
					<div class="grupo" id="firma">
						<div class="firma">
							<p></p>
						</div>
					</div>
					<div class="grupo" id="ccv">
						<p class="label">CCV</p>
						<p class="ccv"></p>
					</div>
				</div>
				<p class="leyenda" type="hidden">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus
					exercitationem,
					voluptates illo.</p>
				<a href="#" class="link-banco">www.tubanco.com</a>
			</div>
		</section>

		<!-- Contenedor Boton Abrir Formulario -->
		<div class="contenedor-btn">
			<button class="btn-abrir-formulario" id="btn-abrir-formulario">
				<i class="fas fa-plus"></i>
			</button>
		</div>

		<!-- Formulario -->
		<form action="../index.html" id="formulario-tarjeta" class="formulario-tarjeta">
			<div class="grupo">
				<label for="inputNumero">Número Tarjeta VISA</label>
				<input type="text" id="inputNumero" maxlength="19" autocomplete="off" >
			</div>
			<div class="grupo">
				<label for="inputNombre">Nombre</label>
				<input type="text" id="inputNombre" maxlength="19" autocomplete="off" >
			</div>
			<div class="grupo">
				<label for="inputCorreo">Correo Electronico</label>
				<input type="email" id="inputCorreo" maxlength="19" autocomplete="off" >
			</div>
			<div class="flexbox">
				<div class="grupo expira">
					<label for="selectMes">Expiracion</label>
					<div class="flexbox">
						<div class="grupo-select">
							<select name="mes" id="selectMes" >
								<option disabled selected>Mes</option>
							</select>
							<i class="fas fa-angle-down"></i>
						</div>
						<div class="grupo-select">
							<select name="year" id="selectYear" >
								<option disabled selected>Año</option>
							</select>
							<i class="fas fa-angle-down"></i>
						</div>
					</div>
				</div>

				<div class="grupo ccv">
					<label for="inputCCV">CCV</label>
					<input type="text" id="inputCCV" maxlength="3" >
				</div>
			</div>
			<a href="dptarjeta.php">
				<input type="" class="btn-enviar" onclick="validarCorreo(form.inputCorreo.value)" name="Pagar" value="Pagar">
			</a>

			<script>
				function hizoClick() {
					alert("El pago se a realizado con exito");
				}

				function validarCorreo(inputCorreo) {
					var expReg = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
					var valid = expReg.test(inputCorreo);
					if (valid == true) {
						"<h1>Es valido</h1>"
					} else {
						"<h1>No es valido</h1>"
					}

				}
			</script>

		</form>
	</div>

	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
	<script src="design/js/main.js"></script>
</body>

</html>