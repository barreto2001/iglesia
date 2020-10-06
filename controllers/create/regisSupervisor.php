<?php
require_once('../../model/conexion/conexion.php');
require_once('../../model/query/create/acompañante.php');
require_once('../../model/query/update/updateMisa.php');
require_once('../../model/query/read/verification.php');


function insertSupervisor()
{


	session_start();
	$name = $_SESSION['name'];
	$tipo = $_SESSION['tipo'];
	$document = $_SESSION['documento'];
	$email = $_SESSION['email'];
	$cel = $_SESSION['cel'];
	$address = $_SESSION['address'];
	$sillas = trim($_POST['sillas'], ',');
	$cantidad = $_POST['cantidad'];
	$acompanante = trim($_POST['acompanante'], ',');
	$misa = $_SESSION['misa'];
	$disponible = $_SESSION['sillasDisponibles'];
	$observacion = null;
	$activo = true;


	$acompanante = explode(',', $acompanante);
	$sillas = explode(',', $sillas);
	$_SESSION['cantidadAcompanante']=count($acompanante);


	for ($i = 0; $i < count($acompanante); $i++) {
		$queries = new verification();
		$result = $queries->showSupervisorTwo($acompanante[$i]);
		$resultTwo = $queries->showAcompananteTwo($acompanante[$i]);
		if (isset($result) || isset($resultTwo)) {
			$cantidad = $cantidad - 1;
			array_pop($sillas);
			$observacion = "El resto de acompañantes se encuentran activos en otra misa";
			unset($result);
		}
		if ($acompanante[$i] === $_SESSION['documento']) {
			$cantidad = $cantidad - 1;
			array_pop($sillas);
			$observacion = "no puede registrarse usted como acompañante";
			unset($result);
		}
	}
	$sillas = implode(',', $sillas);
	$acompanante = implode(',', $acompanante);
	$sdisponible = $disponible - $cantidad;


	$modelo = new create();
	$conexion = $modelo->createSupervisor($name, $tipo, $document, $email, $cel, $address, $sillas, $cantidad, $misa, $observacion, $activo);


	$model = new update();
	$conexio = $model->changeShair($misa, $sdisponible);
	unset($_SESSION['sillasDisponibles']);

}

echo insertSupervisor();
