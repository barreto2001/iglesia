<?php 

class verification{
	
	public function showSupervisor($id){
		$resultado=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();

		$sql="SELECT * FROM supervisor WHERE document=:id";
				
		$result=$conexion->prepare($sql);
		$result->bindParam(':id',$id);

		$result->execute();

		while ($f=$result->fetch()){
            $resultado[]=$f;
        }

        return $resultado;


	}
	public function showSupervisorTwo($id){
		$resultado=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$activo=true;

		$sql="SELECT * FROM supervisor WHERE document=:id AND activo=:activo";
				
		$result=$conexion->prepare($sql);
		$result->bindParam(':id',$id);
		$result->bindParam(':activo',$activo);

		$result->execute();

		while ($f=$result->fetch()){
            $resultado[]=$f;
        }

        return $resultado;


	}

	public function showAcompanante($id){
		$resultado=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();

		$sql="SELECT * FROM acompanante WHERE document=:id";
				
		$result=$conexion->prepare($sql);
		$result->bindParam(':id',$id);

		$result->execute();

		while ($f=$result->fetch()){
            $resultado[]=$f;
        }

        return $resultado;


	}
	public function showAcompananteTwo($id){
		$resultado=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$activo=true;

		$sql="SELECT * FROM acompanante WHERE document=:id AND activo=:activo";
				
		$result=$conexion->prepare($sql);
		$result->bindParam(':id',$id);
		$result->bindParam(':activo',$activo);


		$result->execute();

		while ($f=$result->fetch()){
            $resultado[]=$f;
        }

        return $resultado;


	}

		public function showAcompanantes($id){
		$resultado=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$activo=true;


		$sql="SELECT * FROM acompanante WHERE supervisor=:id AND activo=:activo";
				
		$result=$conexion->prepare($sql);
		$result->bindParam(':id',$id);
		$result->bindParam(':activo',$activo);

		$result->execute();

		while ($f=$result->fetch()){
            $resultado[]=$f;
        }

        return $resultado;


	}

	public function showAllSupervisor($id){
		$resultado=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();

		$sql="SELECT * FROM supervisor WHERE misa=:id";
				
		$result=$conexion->prepare($sql);
		$result->bindParam(':id',$id);

		$result->execute();

		while ($f=$result->fetch()){
            $resultado[]=$f;
        }

        return $resultado;


	}

	public function showMiMisaTwo($id){
		$resultado=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();

		$sql="SELECT * FROM misa WHERE id=:id";
				
		$result=$conexion->prepare($sql);
		$result->bindparam(":id",$id);

		$result->execute();

		while ($f=$result->fetch()){
            $resultado[]=$f;
        }

        return $resultado;


	}


}



?>