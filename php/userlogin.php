<?php 

require_once("conexion.php");
require_once("metodos.php"); 

if(isset($_POST['submit'])){

$pass = $_POST['pass']; 
$correo = $_POST['correo'];
$hash = md5($pass); 

    if(empty($correo) || empty($hash)){ 
        echo '<div>Nombre de usuario o contraseña vacio<div/>';
    }else{

        $obj= new metodos();

        if($obj->getUser($correo,$hash)){ 
            session_start();
           
            $_SESSION['usuario'] = $correo;
            header('Location:index.html');
            
        }else{
            
            ?>
            <script>

           alert('Contraseña o correo invalido');

            location.href = "../login.php";

            </script>
        <?php 
        }
    }
}

?> 