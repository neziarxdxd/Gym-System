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
    include 'dbcon.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
if(isset($_POST['email'])){

$email_code = $_POST["email-code"];
$query 		= mysqli_query($con, "SELECT * FROM members WHERE  username='$email_code'");
$row		= mysqli_fetch_array($query);
$num_row 	= mysqli_num_rows($query);

if($num_row > 0){
    try {
        $otp_code = rand(100000, 999999);
       
       //Server settings
       $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
       $mail->isSMTP();                                            //Send using SMTP
       $mail->Host       = 'smtp-relay.brevo.com';                     //Set the SMTP server to send through
       $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
       $mail->Username   = 'raizensangalang.tech@gmail.com';                     //SMTP username
       $mail->Password   = 'C3QgGZsTVFDU2IMk';                               //SMTP password
       $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
       $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
   
       //Recipients
       $mail->setFrom('no-reply@gmail.com', 'otp-code');
       $mail->addAddress($email_code, 'User');     //Add a recipient
   
   
       //Attachments
       // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
       // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
   
       //Content
       $mail->isHTML(true);                                  //Set email format to HTML
       $mail->Subject = 'Here is your One Time Password (OTP)';
       $mail->Body    = 'Hello, Here is your OTP: '.$otp_code;
       $mail->AltBody = 'Hello, Here is your OTP: '.$otp_code;
   
       $mail->send();
       echo 'Message has been sent';
   
   //     // redirect to success page
   //     // add session message 
      
       // expire within 1 minute
       $one_minute_epoch = 60 * 5;
       $expire = time() + $one_minute_epoch;
       echo "otp $otp_code \n";
       echo "expire $expire";
   
       
       
       $sql = "insert into otp(email,code,expiration) values('$email_code', '$otp_code', '$expire')";
       $result = mysqli_query($con, $sql);
       echo "result $result";
       echo "email code $email_code";
       // execute query
       if ($result) {
               session_start();
               $_SESSION['forget-pass-msg'] = $email_code;
               header('Location:../../otp.php');
               echo "success";
   
           }
       else{
           echo "fail $result";
       }
       } catch (Exception $e) {
       echo "huhuhuh Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
   }
}
else{
echo "<script>alert('wrong email')</script>";
$_SESSION['message_error'] = "Email does not exist, Kindly check your email and try again";
echo "<script>window.location.href = '../../index.php'</script>";
// header('Location:../../index.php');

}
}
?>