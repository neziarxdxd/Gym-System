
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
<body>
<style>
  .end-button{
    float: right;
    padding-right: 10px;
    padding-top: 10px;
  }
</style>
<!--Header-part-->
<div id="header">
  <h1><a href="index.php">Fitness Connection</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<?php include '../includes/topheader.php'?>
<!--close-top-Header-menu-->

<!--start-top-serch-->
<!-- <div id="search">
  <input type="hidden" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div> -->
<!--close-top-serch-->
<!--sidebar-menu-->
<?php $page="dashboard"; include '../includes/sidebar.php'?>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="You're right here" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    
<!--End-Action boxes-->    

    <div class="row-fluid">
	  
      <div class="span6">
       
       <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
            <h5>My To-Do List</h5>
            <div class="end-button">
            <a href="to-do.php"><i class="icon-plus-sign"></i></a>
            </div>
          </div>
         
          <div class="widget-content nopadding">

        <?php
            include "dbcon.php";
            include "session.php";
            $qry="SELECT * FROM todo WHERE user_id='".$_SESSION['user_id']."'";
            $result=mysqli_query($con,$qry);

            echo"<table class='table table-striped table-bordered'>
              <thead>
                <tr>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Opts</th>
                </tr>
              </thead>";
              while($row=mysqli_fetch_array($result)){
              echo"<tbody>
                <tr>
                  <td class='taskDesc'><a href='to-do.php'><i class='icon-plus-sign'></i></a>".$row['task_desc']."</td>
                  <td class='taskStatus'><span class='in-progress'>".$row['task_status']."</span></td>
                  <td class='taskOptions'><a href='update-todo.php?id=".$row['id']."' class='tip-top' data-original-title='Update'><i class='icon-edit'></i></a>  <a href='actions/remove-todo.php?id=".$row['id']."' class='tip-top' data-original-title='Done'><i class='icon-ok'></i></a></td>
                </tr>
				
               
              </tbody>";
              }
        ?>

            </table>
          </div>
        </div>
       
      
       
      </div> <!-- End of ToDo List Bar -->
	  
    
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>To-Do Lists</h5>
          </div>
          <div class="widget-content nopadding">
            <form id="form-wizard" class="form-horizontal" action="add-to-do.php" method="POST">
              <div id="form-wizard-1" class="step">

              <div class="control-group">
                <label class="control-label">Please Enter Your Task :</label>
                <div class="controls">
                    <input type="text" required class="span11" name="task_desc" placeholder="I'll be doing 12 set up and . . ." />
                </div>
                </div>

                 <div class="control-group">
                    <label class="control-label">Please Select a Status:</label>
                    <div class="controls">
                        <select name="task_status" required="required" id="select">
                        <option value="In Progress">In Progress</option>
                        <option value="Pending">Pending</option>
                        </select>
                    </div>
                </div>

              <div class="form-actions">
              <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                <input id="add" class="btn btn-primary" type="submit" value="Add To List" />
                <div id="status"></div>
              </div>
              <div id="submitted"></div>
            </form>
          </div><!--end of widget-content -->
        </div><!--end of widget box-->
      </div> <!-- end of announcement -->
	  
    </div><!-- End of row-fluid -->

    
    <div class="row-fluid">
      <div class="span6"></div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>Gym Announcement</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
              <li>

              <?php

                include "dbcon.php";
                $qry="select * from announcements";
                  $result=mysqli_query($con,$qry);
                  
                while($row=mysqli_fetch_array($result)){
                  echo"<div class='user-thumb'> <img width='70' height='40' alt='User' src='../img/demo/av1.jpg'> </div>";
                  echo"<div class='article-post'>"; 
                  echo"<span class='user-info'> By: System Administrator / Date: ".$row['date']." </span>";
                  echo"<p><a href='#'>".$row['message']."</a> </p>";
                 
                }

                echo"</div>";
                echo"</li>";
              ?>
                <a href="announcement.php"><button class="btn btn-warning btn-mini">View All</button></a>
              </li>
            </ul>
          </div>
        </div>
      </div> <!-- end of announcement -->
	  
    </div><!-- End of row-fluid -->


  </div><!-- End of container-fluid -->
</div><!-- End of content-ID -->

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> <?php echo date("Y");?> &copy; Fitness Connection</a> </div>
</div>



<style>
#footer {
  color: white;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 460px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
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
