<?php
require_once('../../model/conexion/conexion.php');
require_once('../../model/query/create/acompañante.php');
require_once('../../model/query/read/verification.php');

function insertAcompañante()
{

	

	session_start();
	$data = json_decode($_POST['array'],true);
	foreach ($data as $row) {
		$name = ucwords(strtolower($row['name']));
		$tipo = $row['tipo'];
		$document = $row['document'];
		$supervisor = $row['supervisor'];
		$misa = $_SESSION['misa'];
		$activo = true;


		$queries = new verification();
		$result = $queries->showSupervisorTwo($document);
		$resultTwo = $queries->showAcompananteTwo($document);

		if (isset($result) || isset($resultTwo)) {

			echo "<script>alert('Acompañante registrado en otra misa')</script>";
		} else {


			$modelo = new create();
			$conexion = $modelo->createAcompanante($name, $tipo, $document, $supervisor, $misa, $activo);
		}
		unset($result);
	}
}

echo insertAcompañante();
