<?php session_start();
include('dbcon.php'); ?>
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
    
    <div id="loginbox">            
            <form id="loginform" class="form-vertical" method="POST" action="pages/actions/email.php">
				 <div class="control-group normal_text"> <h3>Forgot Password</h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="email" name="email-code" placeholder="Email" />
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
                    <span class="pull-right"><button type="submit" name="email" class="btn btn-success" />Forgot Password</button></span>
                </div>
                <div class="g">
                <a href="../index.html"><h6>Go Back</h6></a>
                </div>
               

                
                <?php
// Assuming $con is your database connection object

                    if(isset($_POST['login'])){
                        $username = mysqli_real_escape_string($con, $_POST['email']);
                        echo "<p>username: $username</p>";

                        $query = "SELECT * FROM members WHERE username='$username'";
                        $result = mysqli_query($con, $query);

                        if ($result) {
                            $row = mysqli_fetch_array($result);
                            $num_row = mysqli_num_rows($result);
                            
                            if ($num_row > 0) {
                                echo "<div class='alert alert-success alert-dismissible' role='alert'> Check your email to reset your password!</div>";
                            } else {
                                echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                                    Invalid Email/Password or Account has been Expired!
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                    </div>";
                            }
                        } else {
                            // Display an error message
                            echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                                Error in the query: " . mysqli_error($con) . "
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                </div>";
                        }
                    }
?>

            </form>
           
        </div>           
            
            
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
        <script>
        
<script src="js/matrix.js"></script>
    </body>

</html>
