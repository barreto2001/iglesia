<?php 

class queriesMisas{
	
	public function showMisas(){
		$resultado=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();

		$sql="SELECT * FROM misa";
				
		$result=$conexion->prepare($sql);

		$result->execute();

		while ($f=$result->fetch()){
            $resultado[]=$f;
        }

        return $resultado;


	}

	public function showMisasActivas(){
		$resultado=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$activo=true;

		$sql="SELECT * FROM misa WHERE activo=:id";
				
		$result=$conexion->prepare($sql);
		$result->bindparam(":id",$activo);

		$result->execute();

		while ($f=$result->fetch()){
            $resultado[]=$f;
        }

        return $resultado;


	}

	public function showMiMisa($id){
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

	public function showUser($id){
		$resultado=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();

		$sql="SELECT * FROM supervisor WHERE misa=:id";
				
		$result=$conexion->prepare($sql);
		$result->bindparam(":id",$id);

		$result->execute();

		while ($f=$result->fetch()){
            $resultado[]=$f;
        }

        return $resultado;


	}
	public function showUserTwo($documento,$id){
		$resultado=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();

		$sql="SELECT * FROM acompanante WHERE supervisor=:documento AND misa=:id";
				
		$result=$conexion->prepare($sql);
		$result->bindparam(":id",$id);
		$result->bindparam(":documento",$documento);

		$result->execute();

		while ($f=$result->fetch()){
            $resultado[]=$f;
        }

        return $resultado;


	}

}
