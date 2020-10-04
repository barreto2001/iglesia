<?php
error_reporting(0);
require_once('../../model/conexion/conexion.php');
require_once('../../model/query/read/verification.php');
require_once('../../model/query/read/misas.php');
require_once('../../controllers/read/loadTwo.php');
require_once('../../controllers/verification/updateMisa.php');
session_start();

if (!isset($_SESSION['login'])) { // verifica que existe la session activa
	if ($_SESSION['rol'] != 1) {
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
	<link rel="stylesheet" href="../../css/estilos.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Bootstrap core CSS -->
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="../../css/mdb.min.css" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="../../css/style.css" rel="stylesheet">
	<link href="../../css/main.min.css" rel="stylesheet" />
</head>

<body>
	<?php
	include("nav4.php");

	?>
	<center>
		<br>



		<section id='sectionCompra'>


			<?php
			echo updateFactura();

			?>


			<!-- fin de seccion de notificaciones-->
		</section>

	</center>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<script src="../../js/main.js"></script>
	<script src="../../js/update/seleccion.js"></script>
	<script src="../../js/update/update.js"></script>
	<script src="../../js/update/delete.js"></script>
	<!--  -->

	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="../../js/js/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="../../js/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="../../js/js/mdb.min.js"></script>


</body>

</html>