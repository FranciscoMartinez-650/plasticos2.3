<?php
    $destino = "oscar.rh@teziutlan.tecnm.mx";
    $nombre = $_POST["name"];
    $email = $_POST["email"];
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["mensaje"];

    $contenido = "Nombre: ". $nombre . "\nCorreo:" . $email . "\nAsunto: " . $asunto . "\nMensaje: " . $mensaje;
    mail($destino, $asunto, $contenido);
    header("location: contacto.php");
?>