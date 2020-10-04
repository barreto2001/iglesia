<?php
error_reporting(0);
require_once('../../controllers/read/load.php');
require_once('../../controllers/verification/updateMisa.php');
session_start();

if (!isset($_SESSION['login'])) { // verifica que existe la session activa
	if ($_SESSION['rol'] != 2) {
		echo "<script>
	            location.href='../../index.php';
			</script>";
	}
}
//al existir la session genera 2 variables necesarias corresponiendtes al logueo

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>IGLESIA</title>
	<link rel="Shortcut Icon" type="image/x-icon" href="../../img/icon.png" />
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Bootstrap core CSS -->
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="../../css/mdb.min.css" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="../../css/style.css" rel="stylesheet">
	<link href="../../css/main.min.css" rel="stylesheet" />
</head>
<style>

</style>

<body>
	<?php
	include("nav.php");
	?>
	<br>

	<div class="container" style="width: 40%;">
		<div class="card">

			<h5 class="card-header info-color white-text text-center py-4">
				<strong>Registro</strong>
			</h5>

			<!--Card content-->
			<div class="card-body px-lg-5 pt-0">

				<!-- Form -->
				<form class="text-center" style="color: #757575; margin: 0 auto;" action="../../controllers/create/misa.php" method="POST" id="creadorMisa">

					<div class="form-row">
						<div class="col">
							<!-- First name -->
							<div class="md-form">
								<input type="text" id="materialRegisterFormFirstName" name="name" class="form-control" required="">
								<label for="materialRegisterFormFirstName">Nombre:</label>
							</div>
						</div>
						<div class="col">
							<!-- Last name -->
							<div class="md-form">
								<input type="date" id="materialRegisterFormLastName" name="fecha" class="form-control">
								<label for="materialRegisterFormLastName">Fecha:</label>
							</div>
						</div>
					</div>
					<!-- Phone number -->
					<div class="md-form">
						<input type="time" id="materialRegisterFormPhone" name="hinicio" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
						<label for="materialRegisterFormPhone">Hora de inicio:</label>
					</div>

					<!-- E-mail -->
					<div class="md-form mt-0">
						<input type="time" id="materialRegisterFormEmail" name="hfin" class="form-control">
						<label for="materialRegisterFormEmail">Hora Fin:</label>
					</div>

					<!-- Password -->
					<div class="md-form">
						<input type="number" id="materialRegisterFormPassword" class="form-control numberfilas" name="n_filas" aria-describedby="materialRegisterFormPasswordHelpBlock">
						<label for="materialRegisterFormPassword">Numero de filas:</label>

					</div>
					<div class="md-form mt-0">
						<input type="number" class="form-control numbercolumnas" name="n_columnas" aria-describedby="materialRegisterFormPasswordHelpBlock">
						<label for="">Numero de columnas</label>

					</div>

					<!-- Sign up button -->
					<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" style="width: auto;">Ingresar misa</button>


				</form>
				<!-- Form -->

			</div>

		</div>
		<!-- Material form register -->
	</div>
	<center>
		<br>

		<button type="button" class="btn btn-outline-info waves-effect" id="showPreview">Vista previa</button>
		<section id="preview">

			<div id="div1">
				<div id="div2">

					<p id="Nsillas"></p>

				</div>
			</div>

			<div id="sillas">



			</div>
		</section>
	</center>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="../../js/misa.js"></script>
	<script type="text/javascript" src="../../js/ajaxForm.js"></script>

	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="../../js/js/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="../../js/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="../../js/js/mdb.min.js"></script>

</body>

</html>