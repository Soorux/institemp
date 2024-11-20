<?php
// Incluir el autoload de Composer para cargar PHPMailer
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $name = $_POST['ebook-form-name'];
    $email = $_POST['ebook-email'];

    // Crear una instancia de PHPMailer
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Cambia por el servidor SMTP que usarás
        $mail->SMTPAuth = true;
        $mail->Username = 'tu-correo@gmail.com'; // Tu correo electrónico
        $mail->Password = 'tu-contraseña-de-aplicación'; // Contraseña de aplicación o tu contraseña de correo
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // El puerto usado por el servidor SMTP
        
        // Configurar el remitente y el destinatario
        $mail->setFrom($email, $name);  // Usamos el correo del usuario como remitente
        $mail->addAddress('saul1912006@gmail.com');  // Correo del destinatario

        // Si deseas responder al correo del usuario, puedes usar la siguiente línea
        $mail->addReplyTo($email, $name);

        // Contenido del mensaje
        $mail->isHTML(true);
        $mail->Subject = 'Interés en más información sobre InstiTemps';
        $mail->Body    = "Nombre: " . $name . "<br>Correo Electrónico: " . $email . "<br><br>El usuario está interesado en más información sobre InstiTemps.";

        // Enviar el correo
        $mail->send();
        echo "Gracias por tu interés. Nos pondremos en contacto contigo pronto.";
    } catch (Exception $e) {
        // Si hay un error al enviar el correo
        echo "Hubo un problema al enviar tu mensaje. Intenta nuevamente. Error: {$mail->ErrorInfo}";
    }
}
?>
