
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
<link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body><!-- Visit codeastro.com for more projects -->

<!--Header-part-->
<div id="header">
  <h1><a href="index.php">Fitness Connection</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<?php include '../includes/topheader.php'?>
<!--close-top-Header-menu-->
<!--sidebar-menu-->
<?php $page="report"; include '../includes/sidebar.php'?>
<!--sidebar-menu-->

<?php
    include 'dbcon.php';
    include "session.php";
    // $id=$_GET['id'];
    $qry= "select * from members WHERE user_id='".$_SESSION['user_id']."'";
    $result=mysqli_query($con,$qry);
    while($row=mysqli_fetch_array($result)){
?> 


<!--main-container-part-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="" class="current">My Profile</a> </div>
  </div>
  <div class="container-fluid">
    
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
        <div class="widget-content">
            <div class="row-fluid">
              
              <div class="span12">
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
                      <th class="head0">Fullname</th>
                      <th class="head1">Username</th>
                      <th class="head0 right">Gender</th>
                      <th class="head1 right">Contact Number</th>
                      <th class="head0 right">D.O.R</th>
                      <th class="head0 right">Address</th>
                      <th class="head0 right">Amount</th>
                      <th class="head0 right">Plan</th>
                      <th class="head0 right">Current Height (Meters)</th>
                      <th class="head0 right">Current Weight (KG)</th>
                      <th class="head0 right">Initial Body Mass</th>
                      <th class="head0 right">Current Body Mass</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><div class="text-center"><?php echo $row['fullname']; ?></div></td>
                      <td><div class="text-center"><?php echo $row['username']; ?></div></td>
                      <td><div class="text-center"><?php echo $row['gender']; ?></div></td>
                      <td><div class="text-center"><?php echo $row['contact']; ?></div></td>
                      <td><div class="text-center"><?php echo $row['dor']; ?></div></td>
                      <td><div class="text-center"><?php echo $row['address']; ?></div></td>
                      <td><div class="text-center"><?php echo "₱".$row['amount']; ?></div></td>
                      <td><div class="text-center"><?php echo $row['plan']; ?>Month/s</div></td>
                      <td><div class="text-center"><?php echo $row['ini_weight']; ?>Meters</div></td>
                      <td><div class="text-center"><?php echo $row['curr_weight']; ?>KG</div></td>
                      <td><div class="text-center"><?php echo $row['ini_bodytype']; ?></div></td>
                      <td><div class="text-center"><?php echo $row['curr_bodytype']; ?></div></td>
                    </tr>
                  </tbody>
                </table>
                <table class="table table-bordered table-invoice-full">
                  <tbody>
                    <tr>
                      <td class="msg-invoice" width="55%"> <div class="text-center"><h4>Last Payment Done:  ₱<?php echo $row['amount']; ?>/-</h4>
                        <em><a href="#" class="tip-bottom" title="Registration Date" style="font-size:15px;">Member Since: <?php echo $row['dor']; ?> </a></em> </td>
                        </div>
                    </tr>
                  </tbody>
                </table>
              </div> <!-- end of span 12 -->
              
            </div>

            <div class="row-fluid">
                <div class="pull-left">
                <h4>Dear Member <?php echo $row['fullname']; ?>,<br/> <br/>Your Membership is currently <?php echo $row['status']; ?>! <br/></h4><p>Thank you for choosing our services.<br/>- on the behalf of whole team</p>
                </div>
                <div class="pull-right">
                  <h4><span>Approved By:</h4>
                  <img src="../img/report/stamp-sample.png" width="124px;" alt=""><p class="text-center">Note:AutoGenerated</p> </div>
                  
            </div>
          </div>
    </div>
    <?php
}
      ?>
  </div>
</div>
</div>
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

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
