<?php
include('php/conexion.php');

if(!empty($_POST)){
$id 		    = $_REQUEST['id'];
$tokenUser 		= $_REQUEST['tokenUser'];
$pass       = $_REQUEST['pass'];

$passconfi = $_POST['passconfi']; 

$hash = md5($pass);
$hash1 = md5($passconfi);

if ($hash != $hash1){

    ?>
    <script>

    alert('Las contraseña no coinciden');

    location.href = "registro.html";

    </script>
<?php 

}else{

    $c = new conectar();
    $conexion=$c->conexion(); 

    $updateClave    = ("UPDATE usuario SET contrasena='$hash' WHERE id='$id' AND tokenUser='$tokenUser' ");
    $queryResult    = mysqli_query($conexion,$updateClave); 
    if(isset($queryResult)){
    ?>
        <script>
    
        alert('Contraseña Actualizada');
    
        location.href = "login.php";
    
        </script>
    <?php 
    
    }
}

}


?>

