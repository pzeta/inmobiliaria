<?php 
	ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $from = $email;
    $to = "pauzeta@gmail.com";
    $subject = "Mensaje de contacto";
    $message = "Nombre del Usuario: $nombre. ";
    $message .= "Correo electrónico: $email. ";
    $message .= "Mensaje: $mensaje.";
    
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "El mensaje ha sido enviado.";
?>