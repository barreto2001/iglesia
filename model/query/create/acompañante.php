<?php 

class create{
	
	public function createAcompanante($name,$tipo,$document,$supervisor,$misa,$activo){

		$modelo= new conexion();
		$conexion=$modelo->get_conexion();

		$sql="INSERT INTO acompanante (name,tipo,document,supervisor,misa,activo) VALUES (:name,:tipo,:document,:supervisor,:misa,:activo)";
				
		$result=$conexion->prepare($sql);
		$result->bindParam(':name',$name);
		$result->bindParam(':tipo',$tipo);
		$result->bindParam(':document',$document);
		$result->bindParam(':supervisor',$supervisor);
		$result->bindParam(':misa',$misa);
		$result->bindParam(':activo',$activo);

		

		$result->execute();


	}

	public function createSupervisor($name,$tipo,$document,$email,$cel,$address,$sillas,$cantidad,$misa,$observacion,$activo){

		$modelo= new conexion();
		$conexion=$modelo->get_conexion();

		$sql="INSERT INTO supervisor (name,tipo,document,email,cel,address,sillas,cantidad_sillas,misa,observacion,activo) VALUES (:name,:tipo,:document,:email,:cel,:address,:sillas,:cantidad,:misa,:observacion,:activo)";
				
		$result=$conexion->prepare($sql);
		$result->bindParam(':name',$name);
		$result->bindParam(':tipo',$tipo);
		$result->bindParam(':document',$document);
		$result->bindParam(':email',$email);
		$result->bindParam(':cel',$cel);
		$result->bindParam(':address',$address);
		$result->bindParam(':sillas',$sillas);
		$result->bindParam(':cantidad',$cantidad);
		$result->bindParam(':misa',$misa);
		$result->bindParam(':observacion',$observacion);
		$result->bindParam(':activo',$activo);


	

		$result->execute();


	}
}



?>