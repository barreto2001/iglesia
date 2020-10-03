<?php 
	require_once('../../model/conexion/conexion.php');
	require_once('../../model/query/create/createMisa.php');

	function insertAcompañante(){

		$name=ucfirst(strtolower($_POST['name']));
		$fecha=$_POST['fecha'];
		$hinicio=$_POST['hinicio'];
		$hfin=$_POST['hfin'];
		$filas=$_POST['n_filas'];
		$columnas=$_POST['n_columnas'];
		$sillas=0;
		$activo=true;
		
		for ($i=1; $i <=$filas; $i++) {
			
			for ($k=1; $k<=$columnas ; $k++) { 
				
				$sillas=$sillas+1;
				
			}
		}
		



		$modelo= new create();
		$conexion=$modelo->createMisa($name,$fecha,$hinicio,$hfin,$filas,$columnas,$sillas,$activo);

		

	}

	echo insertAcompañante(); 

?>