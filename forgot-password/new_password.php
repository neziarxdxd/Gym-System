<?php session_start();
include('dbcon.php');
//the isset function to check username is already loged in and stored on the session
if(!isset($_SESSION['forget-pass-msg'])){
header('location:index.php');	
}
?>
<!DOCTYPE html>
<html lang="en">
    <!-- Visit codeastro.com for more projects -->
<head>
        <title>FItness Connection</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-style.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
        
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    
    <body>

    <?php if(isset($_SESSION['forget-pass-msg'])){} ?>
    <div id="loginbox">            
            <form id="loginform" class="form-vertical" method="POST" action="">
				 <div class="control-group normal_text"> <h3>Enter OTP</h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-asterisk"></i></span><input type="password" name="pass1" placeholder="New Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{4,}$" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" require/>
                        </div>
                    </div>
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-asterisk"></i></span><input type="password" name="pass2" placeholder="Re-Enter New Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{4,}$" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" require/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <!-- <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="pass" placeholder="Password" />
                        </div> -->
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="../index.html" class="flip-link btn btn-info" id="to-recover">Back</a></span>
                    <span class="pull-right"><button type="submit" name="new-password" class="btn btn-success" />Verifiy</button></span>
                </div>
                <div class="g">
            <a href="../index.html"><h6>Go Back</h6></a>
                </div>
                
                <?php
// Assuming $con is your database connection object

                    if(isset($_POST['new-password'])){
                        $pass1= mysqli_real_escape_string($con, $_POST['pass1']);
                        $pass2 = mysqli_real_escape_string($con, $_POST['pass2']);
                        $username = mysqli_real_escape_string($con, $_SESSION['forget-pass-msg']);
                       if($pass1 == $pass2){
                            $query = "UPDATE members SET password='$pass1' WHERE username='$username'";
                            $result = mysqli_query($con, $query);
                            if($result){
                                echo "<script>alert('password changed successfully')</script>";
                                header('location:../../../Gym-System/index.html');
                                session_destroy();
                            }
                        }
                        else{
                            echo "<script>alert('password does not match')</script>";
                        }
                    }
?>

            </form>
           
        </div>           
            
            
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
<script src="js/matrix.js"></script>
    </body>

</html>
