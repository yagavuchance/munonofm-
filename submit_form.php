<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST['send'])){

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'chancepediano@gmail.com';                     //SMTP username
    $mail->Password   = 'eqwvewxedlushboq';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($_POST['email']);
    $mail->addAddress('pedianostevoz@gmail.com');     //Add a recipient              //Name is optional

  
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject =$_POST['name'];
    $mail->Body    = $_POST['answer'];


    $mail->send();
    echo "
    <script>
    alert('Email sent successfully');
    document.location.href='index.html';
    </script>
    ";
}