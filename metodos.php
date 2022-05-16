<?php 

class metodos{

    public function insertar($datos){

        $c = new conectar();
        $conexion=$c->conexion(); 
        if($datos[3]=$datos[4]){
        $sql = "INSERT INTO usuario (nombre,telefono,email,contrasena) VALUES('$datos[0]','$datos[1]',
                        '$datos[2]','$datos[3]')";

                        return $result=mysqli_query($conexion,$sql);
        }else{
            echo "CONTRASENA NO COINCIDEN";
            header('Location: registro.html');
        }
    }

    public function getUser($correo,$pass){
        $c = new conectar();
        $conexion=$c->conexion(); 

        $sql = "SELECT * FROM usuario where email='$correo' and contrasena = '$pass'";

        $result = mysqli_query($conexion,$sql);

        $numRows = $result->num_rows; 
        if($numRows == 1){
            return true;
        }

        return false; 

    }

 
}

?> 