<?php
error_reporting(0);
require_once('../../model/conexion/conexion.php');
require_once('../../model/query/read/verification.php');
require_once('../../model/query/read/misas.php');
require_once('../../controllers/read/load.php');
require_once('../../controllers/verification/updateMisa.php');
session_start();

if (!isset($_SESSION['login'])) { // verifica que existe la session activa
	if ($_SESSION['rol'] != 1) {
		echo "<script>
	            location.href='../../index.php';
			</script>";
	}
}
if (isset($_GET['id'])) {
	$_SESSION['misa'] = $_GET['id'];
	$_SESSION['sillasDisponibles'] = $_GET['dispo'];
}
$_SESSION['url'] = "<script>window.location;</script>";
unset($_SESSION['factura']);
//al existir la session genera 2 variables necesarias corresponiendtes al logueo

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>IGLESIA</title>
	<link rel="Shortcut Icon" type="image/x-icon" href="../../img/icon.png" />
	<link rel="stylesheet" href="../../css/estilos.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Bootstrap core CSS -->
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="../../css/mdb.min.css" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="../../css/style.css" rel="stylesheet">
	<link href="../../css/main.min.css" rel="stylesheet" />
	<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-bulma/bulma.css" rel="stylesheet">
</head>

<body>
	<?php
	include("nav4.php");

	?>
	<center>
		<br>



		<section id='sectionCompra'>


			<?php

			echo cargarSillas();

			?>




			<!-- seccion de notificaciones-->

			<p id="sillas"></p>
			<div style="background-color: white; width: 30%; border-radius: 10px;">
				<p id="title"></p>
				<br>
				<?php
				if (!isset($_SESSION['factura'])) {

					$quer = new queriesMisas();
					//Genera consulta en la tabla user para obtener los datos de la misa
					$res = $quer->showMiMisa($_GET['id']);

					date_default_timezone_set("America/Bogota");

					foreach ($res as $mos) {
						$hini = date("h:i a ", strtotime($mos['hora_inicio']));
						$hfini = date("h:i a", strtotime($mos['hora_fin']));
						$fecha = date("d-m-Y", strtotime($mos['fecha']));

						echo '							
					<p>Misasss: ' . $mos['name'] . '</p>
					<p>Fecha: ' . $fecha . '</p>
					<p>Hora Inicio: ' . $hini . '</p>
					<p>Hora fin: ' . $hfini . '</p>
					<br>
					<br>

				';
					}
				}

				?>
				<p id="nombre"></p>
				<p id="documento"></p>
				<p id="Nacompañantes"></p>
				<p id="acompañantes"></p>
				<div id="datos">

				</div>
			</div>

			<!-- fin de seccion de notificaciones-->
		</section>

	</center>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<script src="../../js/main.js"></script>
	<script src="../../js/seleccion.js"></script>
	<script src="../../js/compra.js"></script>
	<script src="../../js/cobrar.js"></script>
	<script src="../../js/update/delete.js"></script>
	<!--  -->

	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="../../js/js/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="../../js/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="../../js/js/mdb.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>


</body>

</html>