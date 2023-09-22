<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require '../assets/PHPMailer/src/SMTP.php';
  require '../assets/PHPMailer/src/PHPMailer.php';
  require '../assets/PHPMailer/src/Exception.php';

  try {
      // Intentar crear una nueva instancia de la clase PHPMailer
      $mail = new PHPMailer (true);

      $mail->isSMTP();
      $mail->SMTPAuth = true;
      // Datos personales
      $mail->Host = "smtp.gmail.com";
      $mail->Port = "465";
      $mail->Username = "icaroooard@gmail.com";
      $mail->Password = "ooyzmbmuyupnlsgq";
      $mail->SMTPSecure = "ssl";

      // Remitente
      $mail->setFrom('icaroooard@gmail.com', 'PORTAFOLIO');
      // Destinatario, opcionalmente también se puede especificar el nombre
      $mail->addAddress('mrodriguez74@ucol.mx', 'Jordán Rodríguez');

      $mail->isHTML(true);
      // Asunto
      $mail->Subject = 'CONTACTO DESDE PORTAFOLIO';
      // Contenido HTML
      $mail->Body = $_POST['subject'].'. '.$_POST['name'].' te ha mandado el mensaje '.$_POST['message'].'. Para ponerse en contato use el correo '.$_POST['email'];

      // Agregar archivo adjunto
      $mail->send();
      echo "OK";


  } catch (Exception $e) {
          echo "Mailer Error: ".$mail->ErrorInfo;
  }

?>
