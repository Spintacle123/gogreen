<?php

    session_start();
    
    require __DIR__ . '/vendor/autoload.php';

    if(isset($_POST['mobile']) && isset($_POST['msg'])){

        // use Twilio\Rest\Client;

        $sid = 'AC6c3e1cb4403f65aa95f3bec7320d8dab';
        $token = '52c1dc431f446494e06dfdb4019fe373';
        
        $client = new Twilio\Rest\Client($sid, $token);
        
        $message = $client->messages->create(
            $_POST['mobile'],array(
                'from' => '+13862804582',
                'body' => $_POST['msg']
            )
        );

        if($message){
            header('location:ad_view_pending.php');
            $_SESSION['response']="Message sent successfully!";
            $_SESSION['res_type']="success";
        }
        else{
            echo 'something wrong';
        }
    }
?>