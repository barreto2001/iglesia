<?php 
	require_once('../../model/conexion/conexion.php');
	require_once('../../model/query/create/acompañante.php');
	require_once('../../model/query/read/verification.php');

	function insertAcompañante(){
		session_start();
		$name=ucwords(strtolower($_POST['name']));
		$tipo=$_POST['tipo'];
		$document=$_POST['document'];
		$supervisor=$_POST['supervisor'];
		$misa=$_SESSION['misa'];
		$activo=true;


			$queries = new verification();
			$result=$queries->showSupervisorTwo($document);
			$resultTwo=$queries->showAcompananteTwo($document);
			
			if (isset($result) || isset($resultTwo)) {

				echo "<script>alert('Acompañante registrado en otra misa')</script>";
				

			}else{

				$modelo= new create();
				$conexion=$modelo->createAcompanante($name,$tipo,$document,$supervisor,$misa,$activo);
			}
			unset($result);
		


		

		

	}

	echo insertAcompañante();
