<?php 

use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

        require_once("php/conexion.php");
        require_once("php/metodos.php"); 
       

        require_once ('PHPMailer/Exception.php');
        require_once ('PHPMailer/PHPMailer.php');
        require_once ('PHPMailer/SMTP.php');
    

    $errors = array();


        if(!empty($_POST)){


        $nombre = $_POST['nombre']; 
        $telefono =  $_POST['telefono']; 
        $correo =  $_POST['correo']; 
        
        $passconfi = $_POST['passconfi']; 
        $hash1 = md5($passconfi);

        $pass = $_POST['pass'];
        $hash = md5($pass);

        if ($_POST['pass'] != $_POST['passconfi']){

            ?>
            <script>

           alert('Las contraseña no coinciden');

            location.href = "registro.html";

            </script>
        <?php 

        

        }else{
            
            $obj = new metodos();

            if($obj->emailExiste($correo)){ 
             
                ?>
                <script>
    
               alert('Correo electronico ya registrado');
    
                location.href = "registro.html";
    
                </script>
            <?php
                
            }else{ 

                $datos=array(
                    $nombre,$telefono,$correo,$hash,$hash1
        
                );       
                
              $obj= new metodos();
                if($obj->insertar($datos)){
                   
                    
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
                    
                        $mail->setFrom('adelemdina@gmail.com', 'Orion');
                        $mail->addAddress('adelemdina@gmail.com');
                        //$mail->addCC('copia a correo');
                       // $mail->addReplyTo('marcoantoniot089@gmail.com');
                    
                        $mail->isHTML(true);
                        $mail->Subject = 'Gracias por registrarte';
                        $mail->Body = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"></head> <html><h1>Te damos la bienvenida '.$nombre = $_POST['nombre'].'</h1><br> <p><b>Datos ingresado</b> <br><b>Correo</b>: '.$correo = $_POST['correo'].'<br> <b>Número telefonico</b>:'.$telefono = $_POST['telefono'].' <br> <b>Contraseña</b>: **** </p> <br><a href="http://orion.test/OrionFrontend/login.php">Inicia tu sesión</a></html>';
                    
                        $mail->send();
                        
                        echo"<script type=\"text/javascript\">alert('Registrado Con Exito Usted esta siendo redireccionado a la pagina de login'); window.location='login.php';</script>";  
                    }
                    catch(Exception $e){
                        print "Hubo un error {$mail->ErrorInfo}";
                   
                } 
                    
                }else{
                    echo "No se pudo registrar usuario";
                }

            }

               
            
          
          
        }  
        
        

        }
        
?> 