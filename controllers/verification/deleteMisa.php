<?php 
require_once('model/conexion/conexion.php');
//require_once('model/query/delete/deleteMisa.php');
require_once('model/query/update/updateMisa.php');
require_once('model/query/read/misas.php');

		$queries = new queriesMisas();
		//$queriesTwo = new deleteMisas();
		  $queriesTwo = new update();
		//Genera consulta en la tabla user para obtener los usuarios
		$result=$queries->showMisasActivas();
		date_default_timezone_set("America/Bogota");
	//echo date("h:i:s",strtotime("+ 5 minutes"));
	
	if (isset($result)) {

		/* fucntion antigua para eliminar, se remplaza por actualizar
			
		foreach ($result as $row) {
			$fecha_hoy=date("d-m-Y");
			$hora_mia=date("H:i:s");
			$hora_base=date("h:i:s",strtotime($row['hora_inicio']."+ 10 minutes"));
			$fecha_base=date("d-m-Y",strtotime($row['fecha']));
			//$hora_base=$row['hora_inicio'];
			if ($fecha_base<=$fecha_hoy) {
				if ($hora_mia>$hora_base) {
					$queriesTwo->deleteAllAcompanante($row['id']);
					$queriesTwo->deleteAllSupervisor($row['id']);
					$queriesTwo->deleteAllMisas($row['id']);
				}	
			}
		}

		fin de funcion vieja*/

		/* //INICIO DE FUNCION NUEVA DE ACTUALIZAR  */

		foreach ($result as $row) {
			$fecha_hoy=date("Y-m-d");
			$hora_mia=date("H:i:s");
			$hora_base=date("h:i:s",strtotime($row['hora_inicio']."+ 10 minutes"));
			$fecha_base=date("Y-m-d",strtotime($row['fecha']));
			//$hora_base=$row['hora_inicio'];
			
			
			if ($fecha_hoy>=$fecha_base) {

				if ($hora_mia>=$hora_base) {

					$queriesTwo->updateAllAcompanante($row['id']);
					$queriesTwo->updateAllSupervisor($row['id']);
					$queriesTwo->updateAllMisas($row['id']);
				}	
			}
		}




	}



	
?>