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

    public function getUser($correo,$hash){
        $c = new conectar();
        $conexion=$c->conexion(); 

        $sql = "SELECT * FROM usuario where email='$correo' and contrasena = '$hash'";

        $result = mysqli_query($conexion,$sql);

        $numRows = $result->num_rows; 
        if($numRows == 1){
            return true;
        }

        return false; 

    }

    public function isEmail($correo){

        if(filter_var($correo,FILTER_VALIDATE_EMAIL)){
            return true; 
        }else{
            return false; 
        }
    }

    public function validaPassword($var1,$var2){
       
        if(strcmp($var1,$var2) !== 0 ){
            return false; 
        }else{
            return true; 
        }

    }

    public function emailExiste($correo){
        
        $c = new conectar();
        $conexion=$c->conexion(); 

        $sql = "SELECT * FROM usuario WHERE email='$correo'";

        $result = mysqli_query($conexion,$sql);
        
        $numRows = $result->num_rows; 
       
        if($numRows > 0){
            return 1;
        }else {
            return 0; 
        }

        
 
}
        function getValor($campo,$campoWhere){


             
        $c = new conectar();
        $conexion=$c->conexion(); 

        $sql = "SELECT $campo FROM usuario WHERE $campoWhere=? limit 1";

        $result = mysqli_query($conexion,$sql);

        $numRows = $result->num_rows; 
       
        if($numRows > 0){
            return $_campo;
        }else {
            return 0; 
        }


        }

}

?> 