<?php 

class deleteMisas{

	public function deleteAllAcompanante($supervisor,$id){
		$resultado=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();

		
		$sql = "DELETE FROM acompanante WHERE supervisor=:supervisor AND misa = :id";
				
		$result=$conexion->prepare($sql);
		$result -> bindParam(":id", $id);
		$result -> bindParam(":supervisor", $supervisor);

		$result->execute();

	


	}

	public function deleteAllSupervisor($document,$id){
		$resultado=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();

		
		$sql = "DELETE FROM supervisor WHERE document=:document AND misa = :id";
				
		$result=$conexion->prepare($sql);
		$result -> bindParam(":id", $id);
		$result -> bindParam(":document", $document);

		$result->execute();

	


	}
	
	public function deleteAllMisas($id){
		$resultado=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();

		
		$sql = "DELETE FROM misa WHERE id = :id";
				
		$result=$conexion->prepare($sql);
		$result -> bindParam(":id", $id);


		$result->execute();

	


	}



}



?>