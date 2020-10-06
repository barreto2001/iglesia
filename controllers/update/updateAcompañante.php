<?php 
	require_once('../../model/conexion/conexion.php');
	require_once('../../model/query/update/updateMisa.php');
	require_once('../../model/query/read/verification.php');

	function insertAcompañante(){
        session_start();
        $id=$_POST['id'];
		$name=ucwords(strtolower($_POST['name']));
		$tipo=$_POST['tipo'];
		$document=$_POST['document'];
		$supervisor=$_SESSION['documento'];
		$misa=$_SESSION['misa'];
		$activo=true;


			$queries = new verification();
			$result=$queries->showSupervisorTwo($document);
			$resultTwo=$queries->showAcompananteTwo($document);
			
			if (isset($result) || isset($resultTwo)) {

				$model= new update();
                $conexion=$model->misaAcompananteTwo($id,$name,$tipo,$document,$supervisor,$misa);
				

			}else{

                $model= new update();
                $conexion=$model->misaAcompanante($id,$name,$tipo,$document,$supervisor,$misa);
			}
			unset($result);
		


		

		

	}

	echo insertAcompañante(); 

?>