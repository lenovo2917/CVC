<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar y validar datos del formulario
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mensaje = filter_var($_POST['mensaje'], FILTER_SANITIZE_STRING);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "dev.amgv6@gmail.com"; // Reemplaza con tu dirección de correo electrónico
        $subject = "Nuevo mensaje de contacto de $nombre";
        $body = "Nombre: $nombre\nEmail: $email\n\nMensaje:\n$mensaje";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            echo "Mensaje enviado con éxito.";
        } else {
            echo "Hubo un error al enviar el mensaje. Por favor, intenta de nuevo.";
        }
    } else {
        echo "Correo electrónico no válido.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>