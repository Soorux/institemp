<?php
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
	$mail->send();
	//$mail->addAddress($_GET['email'], $_GET['nombre']); // Destinatario
	//$mail->send();

	header('Location:index.php#interesado');
    echo 'Correo enviado exitosamente.';
	
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}