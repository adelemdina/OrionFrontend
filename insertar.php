<?php 
        require_once("conexion.php");
        require_once("metodos.php"); 

        $nombre = $_POST['nombre']; 
        $telefono = $_POST['telefono']; 
        $correo = $_POST['correo']; 
        $pass = $_POST['pass']; 
        $passconfi = $_POST['pass-confi']; 
    
        $datos=array(
            $nombre,$telefono,$correo,$pass,$passconfi

        );

        $obj= new metodos();
        if($obj->insertar($datos)){
            if($pass=$passconfi){
                header("location:index.html");
            }else{
                echo "Contraseña no coinciden";
            }
            
        }else{
            echo "No se pudo registrar usuario";
        }
?> 