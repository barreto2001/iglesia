<?php
require_once('../../model/conexion/conexion.php');
require_once('../../model/query/create/registro.php');
session_start();

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
                echo "<script>
            alert('Contraseña incorrecta');

            location.href='../../index.php';

            </script>";
            }
            
            

        }else{
            echo "<script>
            alert('Contraseña incorrecta');

            location.href='../../index.php';

            </script>";
        }
}else{
    echo "<script>
    alert('el usuario no existe');

   location.href='../../index.php';

    </script>";

}

?>