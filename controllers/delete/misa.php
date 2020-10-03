<?php
require_once('../../model/conexion/conexion.php');
require_once('../../model/query/delete/deleteMisa.php');
require_once('../../model/query/update/updateMisa.php');


function deleteMisa()
{


	session_start();
	$document = $_SESSION['documento'];
	$misa = $_SESSION['misa'];
	$cantidad = $_SESSION['cantidad'];
	$disponibles = $_SESSION['disponibles'];
	$disponibles = $disponibles + $cantidad;


	$model = new deleteMisas();
	$conexion = $model->deleteAllAcompanante($document, $misa);
	$conexion = $model->deleteAllSupervisor($document, $misa);
	$model = new update();
	$conexio = $model->changeShair($misa, $disponibles);
	unset($_SESSION['misa']);
	unset($_SESSION['cantidad']);
	unset($_SESSION['disponibles']);
}

echo deleteMisa();
