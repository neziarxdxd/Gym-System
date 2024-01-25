
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="<?php if($page=='dashboard'){ echo 'active'; }?>"><a href="index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <!-- <li class="<?php if($page=='todo'){ echo 'active'; }?>"> <a href="to-do.php"><i class="icon icon-pencil"></i> <span>To-Do</span></a>

    </li> -->
  
    <li class="<?php if($page=='reminder'){ echo 'active'; }?>"><a href="customer-reminder.php"><i class="icon icon-time"></i> 
    <?php include "dbcon.php";
    
    $qry="SELECT reminder FROM members WHERE user_id='".$_SESSION['user_id']."' AND reminder = '1'";
    $result = mysqli_query($con, $qry);
    $count = mysqli_num_rows($result);
    if($count > 0){
      echo "<span class='label label-important'>$count </span>";
    }
    echo "<span>Reminders </span>";
?>  
  </a>
  </li>

    <li class="<?php if($page=='announcement'){ echo 'active'; }?>"><a href="announcement.php"><i class="icon icon-bullhorn"></i> 
    <?php include "dbcon.php";
    $qry="SELECT * FROM announcements WHERE status = '0'";
    $result = mysqli_query($con, $qry);
    $count = mysqli_num_rows($result);
    if($count > 0){
      echo "<span class='label label-important'>$count </span>";
    }
    echo "<span>Announcement</span>";
   
  ?>
  </span></a></li>
    <li class="<?php if($page=='payment'){ echo 'active'; }?>"><a href="payment.php"><i class="icon icon-money"></i> <span>Payment History</span></a></li>

  </ul>
</div>