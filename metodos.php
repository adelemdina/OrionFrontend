<?php 

class metodos{

    public function insertar($datos){

        $c = new conectar();
        $conexion=$c->conexion(); 

        $sql = "INSERT INTO usuario (nombre,telefono,email,'password') VALUES('$datos[0]','$datos[1]',
                        '$datos[2]','$datos[3]')";

                        return $result=mysqli_query($conexion,$sql);

    }
}

?> 