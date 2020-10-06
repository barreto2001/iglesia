<?php 

	require_once('../../model/conexion/conexion.php');
	require_once('../../model/query/create/registro.php');


	$name=trim(ucwords(strtolower($_POST['name'])));
	$tipo=$_POST['type'];
	$documento=trim($_POST['documento']);
	$email=$_POST['email'];
	$pass= md5($_POST['pass']);
	$cel=trim($_POST['cel']);
	$address=trim($_POST['address']);




	$model= new getUser();

	$result1=$model->getUsuarios($email);
	$result2=$model->getUsuariosTwo($documento);

	if (isset($result1)) {
		echo "<script>
            alert('el email ya se encuentra registrado');

            location.href='../../index.php';

            </script>";
	}else if(isset($result2)) {
		echo "<script>
            alert('el documento ya se encuentra registrado');

            location.href='../../index.php';

            </script>";

	}else{
		$consulta=$model->inserUsuarios($name,$tipo,$documento,$email,$pass,$cel,$address);
	}



	


?>