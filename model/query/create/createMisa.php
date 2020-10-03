<?php 

class create{
	
	public function createMisa($name,$fecha,$horaini,$horafin,$filas,$columnas,$sillas,$activo){

		$modelo= new conexion();
		$conexion=$modelo->get_conexion();

		$sql="INSERT INTO misa (name,fecha,hora_inicio,hora_fin,filas,columnas,total,disponibles,activo) VALUES (:name,:fecha,:horaini,:horafin,:filas,:columnas,:total,:sillas,:activo)";
				
		$result=$conexion->prepare($sql);
		$result->bindParam(':name',$name);
		$result->bindParam(':fecha',$fecha);
		$result->bindParam(':horaini',$horaini);
		$result->bindParam(':horafin',$horafin);
		$result->bindParam(':filas',$filas);
		$result->bindParam(':columnas',$columnas);
		$result->bindParam(':total',$sillas);
		$result->bindParam(':sillas',$sillas);
		$result->bindParam(':activo',$activo);

		

		$result->execute();

	}

}



?>