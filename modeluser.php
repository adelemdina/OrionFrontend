<?php 

class user{ 
    public function getUser($correo,$pass){
        $c = new conectar();
        $conexion=$c->conexion(); 

        $sql = "SELECT * FROM usuario where correo='$correo' and contrasena = '$pass'";

        $result = mysqli_query($conexion,$sql);

        $numRows = $result->num_rows; 
        if($numRows == 1){
            return true;
        }

        return false; 

    }
}

?> 