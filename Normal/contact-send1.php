<?php

// $result = "";

if (isset($_POST['submit'])){
    
    
    require "../PHPMailer/PHPMailerAutoload.php";
    echo "hiiii";
    
    $mail = new PHPMailer(true);
   
    
    $mail->isSMTP();
   

    // echo "1";

    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->Username = 'pawankumarrayal@gmail.com';
    $mail->Password = 'yxavwlpxgtbmzzbt';

    $mail->setFrom($_POST['Email']);
    $mail->addAddress('pawankumarrayal@gmail.com');
    // $mail->addReplyTo($_POST['Email'], $_POST['Name']);

    $mail->isHTML(true);
    $mail->Subject = 'New form submissions. <br> Email: '.$_POST['Email'].'<br>Message'.$_POST['Message'].'</h1>';
    $mail->Body = $_POST['Message'];

    // echo "2";

    if (!$mail->send()) {
        $result = "Something went wrong. Please try again. ";
    } else {
        $result = "Thanks ".$_POST['Name']."for contacting us. We'll get back to you soon";
        // echo "3";
    }
    // echo "4";
    echo $result;
    // echo "5";

    $mail->smtpClose();
}