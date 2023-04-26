<?php
session_start();

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST["send"])) {
  $sender_name = $_POST["sender_name"];
  $sender = $_POST["sender"];
  $subject = $_POST["subject"];
  $attachments = $_FILES["attachments"]["name"];
  $recipients = explode(",", $_POST["recipient"]);
  $body = $_POST["body"];

  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->SMTPDebug  = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'streettaqueriaandcafe@gmail.com';                     //SMTP username
    $mail->Password   = 'bgjjwkwvhziovtfm';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($sender, $sender_name);
    foreach ($recipients as $recipient ) {
      $mail->addAddress($recipient);
    }

    //Atachments
    for($i=0; $i < count($attachments); $i++){
      $file_tmp = $_FILES["attachments"]["tmp_name"][$i];
      $file_name = $_FILES["attachments"]["name"][$i];
      move_uploaded_file($file_tmp, "attachments/" . $file_name);
      $mail->addAttachment("attachments/" . $file_name);
    }

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;

    $mail->send();
    // header("Location: ../ad_emailnotif1.php?status=1");
    header('location: ../ad_inquiries.php');
		$_SESSION['response']="Email Sent Successfuly!";
		$_SESSION['res_type']="success";
  } catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    header("Location: ../ad_errorpage.php?status=2");
  }
}
