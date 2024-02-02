<?php
	use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
     
    /*
       We have to require the config.php file to use our Gmail account login details.
    */

     
    /**
       We have to require the path to the PHPMailer classes.
    */
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
if(isset($_POST['email'])){
    
try {
    // //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    // $mail->isSMTP();                                            //Send using SMTP
    // $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    // $mail->Username   = 'appgymsystem@gmail.com';                     //SMTP username
    // $mail->Password   = 'wiio dvfa pfro yjlt';                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    // $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // //Recipients
    // $mail->setFrom('appgymsystem@gmail.com', 'Mailer');
    // $mail->addAddress('raizensangalang.tech@gmail.com', 'Joe User');     //Add a recipient


    // //Attachments
    // // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    // //Content
    // $mail->isHTML(true);                                  //Set email format to HTML
    // $mail->Subject = 'Here is the subject';
    // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // $mail->send();
    // echo 'Message has been sent';

    // redirect to success page
    // add session message 
    $_SESSION['forget-pass-msg'] = 'FORGET-PASS';
    header('Location:../../index.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}
?>