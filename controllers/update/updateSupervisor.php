<?php 
	require_once('../../model/conexion/conexion.php');
	require_once('../../model/query/create/acompañante.php');
	require_once('../../model/query/update/updateMisa.php');
	require_once('../../model/query/read/verification.php');


	function insertSupervisor(){


		session_start();
		$document=$_SESSION['documento'];
		
		$sillas=trim($_POST['sillas'],',');
		$cantidad=$_POST['cantidad'];
		$misa=$_SESSION['misa'];
		

        $model= new update();
		$conexion=$model->misaSupervisor($document,$sillas,$cantidad,$misa);



	}

	echo insertSupervisor(); 

?>