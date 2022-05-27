<?php 

class metodos{
   
    public function insertar($datos){
        require_once('conexion.php');
       
        if($datos[3]=$datos[4]){
            $query = $mbd->prepare("INSERT INTO usuarios (nombre, telefono, email, contrasena) VALUES (:nombre, :telefono, :email, :contrasena)");
            $query -> bindValue(':nombre', $datos[0]);
            $query -> bindValue(':telefono', $datos[1]);
            $query -> bindValue(':email', $datos[2]);
            $query -> bindValue(':contrasena', $datos[3]);
            $query -> execute();
           
        }else{
            echo "CONTRASENA NO COINCIDEN";
            header('Location: registro.html');
        }
        
      
    }

    public function getUser($correo,$hash){
        require_once('conexion.php');
        

        $query = $mbd->prepare("SELECT * FROM usuarios where email=:email and contrasena = :contrasena");
        $query -> bindValue(':email', $correo);
        $query -> bindValue(':contrasena', $hash);
        $query -> execute();

        
        if($query -> rowCount() > 0)   { 
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
        require 'conexion.php'; 
       
        $query = $mbd->prepare("SELECT * FROM usuarios WHERE email=:email ");
        $query -> bindValue(':email', $correo);
        $query -> execute();
        //$results = $query -> fetchAll(PDO::FETCH_OBJ); 
        
        if($query -> rowCount() > 0)   { 
            return 1;


        }else{
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
            return $campo;
        }else {
            return 0; 
        }


        }

}

?> 