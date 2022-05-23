<?php 

class metodos{
   
    public function insertar($nombre,$telefono,$correo,$hash1,$hash){
       
        if($hash=$hash1){
            $query = $mbd->prepare("INSERT INTO usuarios (nombre, telefono, email, contrasena) VALUES (:nombre, :telefono, :email, :contrasena)");
            $query -> bindValue(':nombre', $nombre);
            $query -> bindValue(':telefono', $telefono);
            $query -> bindValue(':email', $correo);
            $query -> bindValue(':contrasena', $hash);
            $query -> execute();
           
        }else{
            echo "CONTRASENA NO COINCIDEN";
            header('Location: registro.html');
        }
        
      
    }

    public function getUser($correo,$hash){
       
        

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