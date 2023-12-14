<?php
session_start();
//the isset function to check username is already loged in and stored on the session
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
?>
<!-- Visit codeastro.com for more projects -->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Fitness Connection</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/fullcalendar.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link href="../font-awesome/css/all.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Fitness Connection</a></h1>
</div>
<!--close-Header-part--> 
<!-- Visit codeastro.com for more projects -->

<!--top-Header-menu-->
<?php include 'includes/topheader.php'?>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<!-- <div id="search">
  <input type="hidden" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div> -->
<!--close-top-serch-->

<!--sidebar-menu-->
<?php $page='manage-customer-progress'; include 'includes/sidebar.php'?>
<!--sidebar-menu-->

<?php
include 'dbcon.php';
$id=$_GET['id'];
$qry= "select * from members where user_id='$id'";
$result=mysqli_query($conn,$qry);
while($row=mysqli_fetch_array($result)){
?> 

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Home</a> <a href="customer-progress.php">Customer Progress</a> <a href="#" class="current">Update Progress</a> </div>
    <h1 class="text-center">Update Progress <i class="fas fa-signal"></i></h1>
  </div>
  
  
  <div class="container-fluid" style="margin-top:-38px;">
    <div class="row-fluid">
      <div class="span12">
      <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="fas fa-signal"></i> </span>
            <h5>Progress </h5>
          </div>
          <div class="widget-content">
            <div class="row-fluid">
              
			  <div class="span2"></div>
              <div class="span8">
                <table class="table table-bordered table-invoice">
				
                  <tbody>
				  <form action="userprogress-req.php" method="POST">
                    <tr>
                    <tr>
                      <td class="width30">Member's Fullname:</td>
                      <td class="width70"><strong><?php echo $row['fullname']; ?></strong></td>
                    </tr>
                    <tr>
                      <td>Service Taken:</td>
                      <td><strong><?php echo $row['services']; ?></strong></td>
                    </tr>
                    <tr>
                      <td>Current Height:</td>
                      <td><input id="weight" type="number" name="ini_weight" value='<?php echo $row['ini_weight']; ?>' /> (meters)</td>
                    </tr>

                    <tr>
                      <td>Current Weight:</td>
                      <td><input id="weight" type="number" name="curr_weight" value='<?php echo $row['curr_weight']; ?>' /> (kg)</td>
                    </tr>
					
                    <tr>
                      <td>Initial Body Mass:</td>
                      <td><div class="controls">
                <select name="ini_bodytype" required="required" id="select">
                <option value="0" selected="selected" >Choose Body Mass</option>
                  <option value="Underweight">Underweight</option>
                  <option value="Normal weight">Normal weight</option>
                  <option value="Overweight">Overweight</option>
                  <option value="Obesity">Obesity</option>

                </select>
              </div></td>
                    </tr>
                  
              </div>
			  
                      </td>
					  
					  <tr>
                     
                    </tr>

                    <tr>
                      <td>Current Body Mass:</td>
                      <td><div class="controls">
                <select name="curr_bodytype" required="required" id="select">
                <option value="0" selected="selected" >Choose Body Mass</option>
                <option value="Underweight">Underweight</option>
                  <option value="Normal weight">Normal weight</option>
                  <option value="Overweight">Overweight</option>
                  <option value="Obesity">Obese</option>
                  <option value="Obesity">Severely Obese</option>

                </select>
              </div></td>
                    </tr>
                  
              </div>
              
			  

                      </td>
                  </tr>
                    </tbody>
                  
                </table>
              </div>
			  
			  
            </div> <!-- row-fluid ends here -->
			
			
            <div class="row-fluid">
              <div class="span12">
                
				
			
                <div class="text-center">
                  <!-- user's ID is hidden here -->
             <input type="hidden" name="id" value="<?php echo $row['user_id'];?>">
                  <button class="btn btn-primary btn-large" type="SUBMIT" href="">Save Changes</button> 
				</div>
				  
				  </form>
              </div><!-- span12 ends here -->
            </div><!-- row-fluid ends here -->
			
      <?php
}
      ?>
          </div><!-- widget-content ends here -->
		  
		  
        </div>
        
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="fas fa-signal"></i> </span>
            <h5>BMI Calculator</h5>
          </div>
          <div class="widget-content">
            <div class="row-fluid">
              
			  <div class="span2"></div>
        <div class="span8">
        <?php
        if(isset($_POST['submit']))
{
	$age=$_POST['age'];
	$weight=$_POST['weight'];
	$height=$_POST['height'];
  $m = 100;
  $origheight = $height/$m;
	$bmi=$weight/($origheight*$origheight);
  $bmi2 = substr($bmi,0,4);
	echo "Your BMI is: ".$bmi2." kg/m<sup>2</sup><br>";
}
?>
<h1>BMI calculator</h1><br>
<form method="post">
                      <td>Age:<input type="number" name="age"><br></td>
                      <td>Current Height:</td>
                      <td><input type="text" name="height"><br></td>
                      <td>Current weight:</td>
                      <td><input type="text" name="weight"><br></td>
	<input type="submit" name="submit"/>
</form>
              </div>
			  
			  
            </div> <!-- row-fluid ends here -->
              </div><!-- span12 ends here -->
            </div><!-- row-fluid ends here -->
			
      <?php

      ?>
          </div><!-- widget-content ends here -->
		  
		  
        </div>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="fas fa-signal"></i> </span>
            <h5>BMI Info</h5>
          </div>
          <div class="widget-content">
            <div class="row-fluid">
              
			  <div class="span2"></div>
        <div class="span8">
          <img src="../img/BMI_Weight_Chart-DMEforLess_2048x2048.webp" alt="BMI Chart">
        <!-- row-fluid ends here -->
              </div><!-- span12 ends here -->
            </div><!-- row-fluid ends here -->
			
      <?php

      ?>
          </div><!-- widget-content ends here -->
		  
		  
        </div><!-- widget-box ends here -->
      </div><!-- span12 ends here -->
    </div> <!-- row-fluid ends here -->
  </div> <!-- container-fluid ends here -->
  
</div> <!-- div id content ends here -->



<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> <?php echo date("Y");?> &copy; Fitness Connection</a> </div>
</div>

<style>
#footer {
  color: white;
}
</style>

<!--end-Footer-part-->

<script src="../js/excanvas.min.js"></script> 
<script src="../js/jquery.min.js"></script> 
<script src="../js/jquery.ui.custom.js"></script> 
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/jquery.flot.min.js"></script> 
<script src="../js/jquery.flot.resize.min.js"></script> 
<script src="../js/jquery.peity.min.js"></script> 
<script src="../js/fullcalendar.min.js"></script> 
<script src="../js/matrix.js"></script> 
<script src="../js/matrix.dashboard.js"></script> 
<script src="../js/jquery.gritter.min.js"></script> 
<script src="../js/matrix.interface.js"></script> 
<script src="../js/matrix.chat.js"></script> 
<script src="../js/jquery.validate.js"></script> 
<script src="../js/matrix.form_validation.js"></script> 
<script src="../js/jquery.wizard.js"></script> 
<script src="../js/jquery.uniform.js"></script> 
<script src="../js/select2.min.js"></script> 
<script src="../js/matrix.popover.js"></script> 
<script src="../js/jquery.dataTables.min.js"></script> 
<script src="../js/matrix.tables.js"></script> 


</body>
</html>