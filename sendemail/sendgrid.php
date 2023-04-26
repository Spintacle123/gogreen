<?php

require 'vendor/autoload.php';

$API_KEY = "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";

if (isset($_POST['emails'])) {


    $subject = $_POST['subject'];
    $omitemail = $_POST['emails'];
    $message = $_POST['message'];


    $fromemail = $_POST['fromemail'];
    $fromname = $_POST['fromname'];

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom($fromemail, $fromname);
    $email->setSubject($subject);



    foreach (explode(",", $omitemail) as $address) {

        
        $email->addTo($address, " ");
        $email->addContent(
                "text/html", "$message"
        );
        
        //SENDGRID_API_KEY
        $sendgrid = new \SendGrid($API_KEY);
        try {
            $response = $sendgrid->send($email);
            if ($response->statusCode() == 202) {
                echo "success";
            }
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
        
        
    }
}