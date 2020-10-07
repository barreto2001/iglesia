<?php
require_once('../../model/conexion/conexion.php');
require_once('../../model/query/create/registro.php');
require_once( '../modales/modal.php');
session_start();
echo'<body>';
echo '<link rel="stylesheet" href="../../css/main.min.css">';

$email=$_POST['email'];
$pass=md5($_POST['pass']);

$model= new getUser();

$consulta=$model->getUsuarios($email);

if (isset($consulta)) {


       
    foreach ($consulta as $row) {

        $password=$row['pass'];
        $name=$row['name'];
        $tipo=$row['tipo'];
        $doc=$row['documento'];
        $email=$row['email'];
        $cel=$row['cel'];
        $rol=$row['rol'];
        $address=$row['address'];
    }

        if($pass==$password){

                

            $_SESSION['name']=$name;
            $_SESSION['tipo']=$tipo;
            $_SESSION['documento']=$doc;
            $_SESSION['email']=$email;
            $_SESSION['cel']=$cel;
            $_SESSION['rol']=$rol;
            $_SESSION['address']=$address;


            $_SESSION['login']=true;

            if ($_SESSION['rol']==2) {
                echo "<script>
                   

                    location.href='../../view/cliente/tableMisas.php';

                    </script>";
            }else if ($_SESSION['rol']==1) {
                echo "<script>
                    

                    location.href='../../view/admin/index.php';

                    </script>";
            }else{
                
            modalAlert('Contraseña incorrecta','../../index.php','error',2);
            }
            
            

        }else{
            modalAlert('Contraseña incorrecta','../../index.php','error',2);
        }
}else{

    modalAlert('El usuario no existe','../../index.php','error',2);

}
