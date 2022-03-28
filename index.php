<?php 

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require 'vendor/autoload.php';

  if( isset($_POST["send"]) ) {

    $mail = new PHPMailer(true);

    try {

      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
      $mail->isSMTP();                                           
      $mail->Host       = 'smtp.example.com';                    
      $mail->SMTPAuth   = true;                                  
      $mail->Username   = 'user@example.com';                     
      $mail->Password   = 'secret';                               
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
      $mail->Port       = 465;                                    
  
      //Recipients
      $mail->setFrom('from@example.com', 'Mailer');
      $mail->addAddress('joe@example.net', 'Joe User');     
      $mail->addAddress('ellen@example.com');               
      $mail->addReplyTo('info@example.com', 'Information');
      $mail->addCC('cc@example.com');
      $mail->addBCC('bcc@example.com');
  
      //Attachments
      $mail->addAttachment('/var/tmp/file.tar.gz');         
      $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    
  
      //Content
      $mail->isHTML(true);                                  
      $mail->Subject = 'Here is the subject';
      $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $mail->send();
      echo 'Message has been sent';

    } catch(Exception $e) {
      echo $e;
    }

  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Send Money Form</title>
  <style>
    body {
      overflow-y: hidden;
    }
    .container {
      height: 100vh;
      display: grid;
      place-content: center;
    }
    .form {
      display: flex;
      flex-direction: column;
      gap: 15px;
      margin-bottom: 50px;
    }

  </style>
</head>
<body>
  <main class="container">
    <h1>Fill the form to ask for money</h1>
    <div>
      <form class="form" method="POST">
        <label>
          Your e-mail
          <input type="text" name="sender_email">
        </label>
        <label>
          Receivers e-mail
          <input type="text" name="receiver_email">
        </label>
        <label>
          Amount to ask
          <input type="number" name="amount">
        </label>
        <div>
          <button type="submit" name="send">Send</button>
          <button type="button">Preview</button>
        </div>
      </form>
    </div>
    <div class="preview">
      <h2>E-mail preview</h2>
      <p>From:</p>
      <p>To:</p>
      <p>Subject: Send me money please! Urgent!</p>
      <p>Email body: Hey, I really need you to send me {X} amount of money ASAP! It really is for a good cause</p>
    </div>
  </main>
</body>
</html>