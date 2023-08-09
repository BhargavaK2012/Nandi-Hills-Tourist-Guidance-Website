<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "config.php";

if (isset($_POST['submit'])) {

    $email = $_POST['email'];


    $query = "select * from user_data where email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {




        require 'phpmailer/src/Exception.php';
        require 'phpmailer/src/PHPMailer.php';
        require 'phpmailer/src/SMTP.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
            $mail->SMTPAuth = true; //Enable SMTP authentication
            $mail->Username = 'bhargavak2012@gmail.com'; //SMTP username
            $mail->Password = 'girmyeulxuyywsbk'; //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('bhargavak2012@gmail.com', 'Nandi Hills');
            $mail->addAddress($email); //Add a recipient

            $code = substr(str_shuffle('1234567890abcd'), 0, 5);


            $query1 = "update user_data set code='$code' where email='$email';";
            mysqli_query($conn, $query1);
            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'Reset Password Nandi Hills';
            $mail->Body = 'To reset your password click <a href="http://localhost/nandi_hills/reset.php?code=' . $code . '">Click here</a><br>Reset your password within 24hrs.';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            header("location: mail_sent_message.php");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }







    } else {
        header("location: forgot_password_wrong.php");
    }



}


?>