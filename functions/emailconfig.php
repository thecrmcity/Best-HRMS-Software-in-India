<?php



include('PHPMailer/PHPMailerAutoload.php');



$mail = new PHPMailer;



//$mail->SMTPDebug = 3;                               // Enable verbose debug output



$mail->isSMTP();                                      // Set mailer to use SMTP

$mail->Host = $host;  // Specify main and backup SMTP servers

$mail->SMTPAuth = true;                               // Enable SMTP authentication

$mail->Username = $user;                 // SMTP username

$mail->Password = $pass;                           // SMTP password

$mail->SMTPSecure = $ssl;                            // Enable TLS encryption, `ssl` also accepted

$mail->Port = $port;                                    // TCP port to connect to





$mail->setFrom($email,$name);



$mail->isHTML(true); 