<?php
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Configuración de la conexión a la base de datos
$servername = "localhost";  // Cambia esto si tu base de datos no está en localhost
$username = "root";        // Cambia esto con tu nombre de usuario de MySQL
$password = "";            // Cambia esto con tu contraseña de MySQL
$dbname = "Landing";       // Nombre de tu base de datos

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Cambia esto por tu servidor SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'institemp@gmail.com'; // Cambia esto por tu correo
    $mail->Password = 'zqem nwxy jzrg iqkr'; // Cambia esto por tu contraseña
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // O PHPMailer::ENCRYPTION_SMTPS
    $mail->Port = 587; // Puerto 587 para STARTTLS, 465 para SSL

    // Configuración del correo
    $mail->setFrom('institemp@gmail.com', 'InstiTemps'); // Remitente
    $mail->addAddress($_GET['email'], $_GET['nombre']); // Destinatario

    // Contenido del correo
    $mail->isHTML(true); // Indicar que el correo tendrá HTML
    $mail->Subject = 'Correo de Prueba';
    $mail->Body = '<h1>Hola '.$_GET['nombre'].'</h1><p>Este es un correo de prueba enviado desde PHPMailer.</p>';
    $mail->AltBody = 'Este es el texto alternativo para clientes que no soportan HTML.';

    // Enviar el correo
    if ($mail->send()) {
        // Si el correo se envía correctamente, inserta los datos en la base de datos
        $nombre = $_GET['nombre'];
        $email = $_GET['email'];

        $sql = "INSERT INTO suscriptores (nombre, email) VALUES ('$nombre', '$email')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Correo enviado y datos guardados correctamente.";
        } else {
            echo "Error al guardar los datos en la base de datos: " . $conn->error;
        }

        // Redirigir después de enviar el correo
        header('Location: index.php#interesado');
    } else {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }

} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
