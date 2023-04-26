<?php
    session_start();
	

    require 'sendemail/vendor/autoload.php';

    $API_KEY = "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";

    if(isset($_POST['sendemail'])){

        $name = $_POST['name'];
        $email_id = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['msg'];

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("streettaqueriaandcafe@gmail.com", "Street Taqueria and Cafe");
        $email->setSubject($subject);
        $email->addTo($email_id, $name);
        $email->addContent("text/plain", $message);
        // $email->addContent(
        //     "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        // );
        $sendgrid = new \SendGrid($API_KEY);

        if($sendgrid->send($email)){
        //   echo '<p class="outputmsg" style="background-color: green; color: white; padding:5px">Email Notification sent Successfully!</p>';
            header('location:ad_emailnotif.php');
            $_SESSION['response']="Email sent Succesfully!";
            $_SESSION['res_type']="success";
        }
        else{
            header('location:ad_emailnotif.php');
            $_SESSION['response']="Something went wrong!";
            $_SESSION['res_type']="success";
        }

        // try {
        //     $response = $sendgrid->send($email);
        //     print $response->statusCode() . "\n";
        //     print_r($response->headers());
        //     print $response->body() . "\n";
        // } catch (Exception $e) {
        //     echo 'Caught exception: '. $e->getMessage() ."\n";
        // }

    }

?>