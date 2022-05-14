<?php

$destinatario = "orion@gmai.com";

// Llamando campos 
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$pais = $_POST['pais'];
$mensaje = $_POST['mensaje'];

//datos para el correo
$asunto = "Contacto desde Orion.com";

$carta = "De: $nombre \n";
$carta .= "Correo: $correo \n";
$carta .= "Telefono: $telefono \n";
$carta .= "Pais: $pais \n";
$carta .= "Mensaje: $mensaje";

//enviando mensaje
mail($destinatario, $asunto, $carta);
header('Location:contacto.html');

?>