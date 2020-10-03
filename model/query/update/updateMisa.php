<?php 


class update{
	
	public function changeShair($id,$disponible){

		$modelo= new conexion();
		$conexion=$modelo->get_conexion();

		$sql="UPDATE misa SET disponibles=:disponible WHERE id=:id";
		$result=$conexion->prepare($sql);
		$result->bindparam(":id",$id);
		$result->bindparam(":disponible",$disponible);

		$result->execute();

	} //cierre de function changeShair

	public function updateAllAcompanante($id){
		$resultado=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$activo=false;

		$sql="UPDATE acompanante SET activo=:activo WHERE misa=:id";
				
		$result=$conexion->prepare($sql);
		$result -> bindParam(":id", $id);
		$result -> bindParam(":activo", $activo);

		$result->execute();

	


	}

	public function updateAllSupervisor($id){
		$resultado=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$activo=false;

		$sql="UPDATE supervisor SET activo=:activo WHERE misa=:id";
				
		$result=$conexion->prepare($sql);
		$result -> bindParam(":id", $id);
		$result -> bindParam(":activo", $activo);

		$result->execute();

	


	}
	
	public function updateAllMisas($id){

		$resultado=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$activo=false;
		
		

		$sql="UPDATE misa SET activo=:activo WHERE id=:id";
				
		$result=$conexion->prepare($sql);
		$result -> bindParam(":id",$id);
		$result -> bindParam(":activo", $activo);

		$result->execute();

	


	}

	public function misaSupervisorTwo($document,$sillas,$cantidad,$misa){
		$resultado=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();

		$sql="UPDATE supervisor SET sillas=:sillas,cantidad_sillas=:cantidad WHERE document=:document AND misa=:id";
				
		$result=$conexion->prepare($sql);
		$result -> bindParam(":id", $misa);
		$result -> bindParam(":document", $document);
		$result -> bindParam(":sillas", $sillas);
		$result -> bindParam(":cantidad", $cantidad);


		$result->execute();

	


	}

	public function misaSupervisor($document,$sillas,$cantidad,$misa){
		$resultado=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();

		$sql="UPDATE supervisor SET sillas=:sillas WHERE document=:document AND misa=:id";
				
		$result=$conexion->prepare($sql);
		$result -> bindParam(":id", $misa);
		$result -> bindParam(":document", $document);
		$result -> bindParam(":sillas", $sillas);


		$result->execute();

	


	}


	public function misaAcompanante($id,$name,$tipo,$document,$supervisor,$misa){
		$resultado=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();

		$sql="UPDATE acompanante SET name=:name, tipo=:tipo, document=:document  WHERE id=:id AND supervisor=:supervisor AND misa=:misa";
				
		$result=$conexion->prepare($sql);

		$result -> bindParam(":name", $name);
		$result -> bindParam(":tipo", $tipo);
		$result -> bindParam(":document", $document);
		$result -> bindParam(":id", $id);
		$result -> bindParam(":supervisor", $supervisor);
		$result -> bindParam(":misa", $misa);
	


		$result->execute();

	


	}
}





 ?>