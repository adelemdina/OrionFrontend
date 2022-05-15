<?php 
        require_once("conexion.php");
        require_once("metodos.php"); 

        $nombre = $_POST['nombre']; 
        $telefono = $_POST['telefono']; 
        $email = $_POST['correo']; 
        $password = $_POST['pass']; 

      echo $_POST["nombre"]; 

        $datos=array(
            $nombre,$telefono,$email,$password

        );
        $obj= new metodos();
        if($obj->insertar($datos)){
            header("location:index.html");
        }else{
            "No se pudo registrar usuario";
        }
?> 