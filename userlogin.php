<?php 

require_once("conexion.php");
require_once("metodos.php"); 

if(isset($_POST['submit'])){

$pass = $_POST['pass']; 
$correo = $_POST['correo']; 

    if(empty($correo) || empty($pass)){ 
        echo '<div>Nombre de usuario o contraseña vacio<div/>';
    }else{

        $obj= new metodos();

        if($obj->getUser($correo,$pass)){ 
            session_start();
           
            $_SESSION['usuario'] = $correo;
            header('Location:index.html');
            
        }else{
            echo '<div>Usuario no existe<div/>';
        }
    }
}

?> 