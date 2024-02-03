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

    // include 'dbcon.php';
    include 'dbcon.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
if(isset($_POST['verify'])){
    
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
    session_start();
    $email = $_SESSION['forget-pass-msg'];
    $code = $_POST['otp-code'];
    $sql = "SELECT * FROM `otp` WHERE email = '$email' and code = '$code'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $expiration_time = $row['expiration'];
        $now = time();
        $is_expired = $expiration_time < $now;
        if($is_expired){
            echo "<script>alert('Code has expired')</script>";
            // header('Location:../../index.php');
            echo "<script>window.location.href = '../../index.php'</script>";
        }
        else if ($row['code'] == $code) {
        //    header('Location:../../new_password.php');
        echo "<script>alert('correct code')</script>";
        echo "<script>window.location.href = '../../new_password.php'</script>";
        $query_delete = mysqli_query($con, "DELETE FROM `otp` WHERE email = '$email'");
        
        }
        else{
            echo "<script>alert('wrong code')</script>";
            echo "<script>window.location.href = '../../otp.php'</script>";
        }
    }else{
        echo "<script>alert('wrong code')</script>";
        
        echo "<script>window.location.href = '../../otp.php'</script>";
    }

    

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}
?>