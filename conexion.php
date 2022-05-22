<?php

 try {
    $user = "root";
    $password = "";   
    $mbd = new PDO('mysql:host=localhost;dbname=orion', $user, $password);
    //print "conexion exitosa";
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}


?> 