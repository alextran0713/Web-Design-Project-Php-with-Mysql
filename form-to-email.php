<?php

date_default_timezone_set('America/Los_Angeles');

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $visitorEmail= $_POST['visitoremail'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  require_once "PHPMailer/PHPMailer.php";
  require_once "PHPMailer/SMTP.php";
  require_once "PHPMailer/exception.php";


  $mail =  new PHPMailer();

  //SMTP settings
  //may 3 1990
  $mail->isSMTP();
  $mail->SMTPDebug = 2;
  $mail->Host = 'smtp.digitalocean.com';
  $mail->SMTPAuth = true;
  $mail->Username = "pettinder123@gmail.com";
  $mail->password = 'Xy12@ao!zz';
  $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 465;
  $mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);


  // $mail->SMTPSecure ="ssl";
  // $mail->SMTPOptions = array(
  //       'ssl' => array(
  //           'verify_peer' => false,
  //           'verify_peer_name' => false,
  //           'allow_self_signed' => true
  //       )
  //   );


  //Email Setttings
  $mail->isHTML(true);
  $mail->setFrom($visitorEmail, $name, 0);
  $mail->addAddress("scarpellidylan@gmail.com");
  $mail->Subject = $subject;
  $mail->Body = $message;




if($mail->send())
{
  echo 'Message sent';
}
else {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


}
?>
