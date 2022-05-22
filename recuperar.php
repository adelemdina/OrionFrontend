<?php 



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require_once("conexion.php");
require_once("metodos.php");


require_once ('PHPMailer/Exception.php');
require_once ('PHPMailer/PHPMailer.php');
require_once ('PHPMailer/SMTP.php');


$errors = array(); 

if(!empty($_POST)){

    $correo = $_POST['email']; 

    $obj= new metodos();

    if($obj->emailExiste($correo)){

      
        $query = $mbd->prepare("SELECT * FROM usuario WHERE email ='$correo' ");
        $query -> execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
       
        if( $query){
            if( $query -> rowCount() > 0){

                $fila =  $result; 
              
            function generandoTokenClave($length = 20) {
                    return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklymopkz', ceil($length/strlen($x)) )),1,$length);
                }
                $miTokenClave     = generandoTokenClave();
                
                //Agregando Token en la tabla BD
               
                $query = $mbd->prepare("UPDATE usuario SET token = :token  WHERE email = :email ");
                $query->bindValue(':token',$miTokenClave);
                $query->bindValue(':email',$correo);

                $query->execute();

                if($query->rowCount() > 0)
                {
                    $message = 'Se ha creado su cuenta satisfactoriamente en la pagina';
                }else{
                    $message = 'Lo sentimos, pero ha ocurrido un problema con la base de datos';
                }   
                
                           
                $linkRecuperar      = "https://localhost/OrionFrontend/nuevaclave.php?id=".$fila['id']."&tokenUser=".$miTokenClave;
                
              
                $mail = new PHPMailer(true);

                                  
                try {
                    $mail->SMTPDebug =0;
                    $mail->isSMTP();                  
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'phpmailerpro@gmail.com';
                    $mail->Password   = '1q2w3e4r$';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;
                
                    $mail->setFrom($correo, 'Orion');
                    $mail->addAddress($correo);
                    //$mail->addCC('copia a correo');
                   // $mail->addReplyTo('marcoantoniot089@gmail.com');
                
                    $mail->isHTML(true);
                    $mail->Subject = 'Recuperacion de Clave Orion';
                    $mail->Body = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"></head> <html><h1>Recuperar Tu contraseña '.$fila['nombre'].'</h1><br> <br><a href='.$linkRecuperar.'>Recuperar Clave</a></html>';
                
                    $mail->send();
                    
                    echo"Correo Enviado";  
                }
                catch(Exception $e){
                    print "Hubo un error {$mail->ErrorInfo}";
               
            } 
            }


        }
        
     
       
    }else{
        echo "no";
    }
}


?> 