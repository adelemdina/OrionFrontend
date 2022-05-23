<?php
require_once('conexion.php');

if(!empty($_POST)){
$id 		    = $_REQUEST['id'];
$tokenUser 		= $_REQUEST['tokenUser'];
$pass       = $_REQUEST['pass'];

$passconfi = $_POST['passconfi']; 

$hash = md5($pass);
$hash1 = md5($passconfi);

if ($hash != $hash1){


   header('Location:registro.html'); 

  

}else{

    $query = $mbd->prepare("UPDATE usuarios SET contrasena=:pass WHERE id= :id AND token=:token ");
    $query->bindValue(':pass',$hash);
    $query->bindValue(':id',$id);
    $query->bindValue(':token',$tokenUser);

    $query->execute();

    if(isset($query))
    {
        $message = 'Constraseña actualizada';
        header('Location:login.php');
    }else{
        $message = 'Lo sentimos, pero ha ocurrido un problema al actualizar sus datos';
    }   

   
    
}

}


?>

