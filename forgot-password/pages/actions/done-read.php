<?php
// <!-- Visit codeastro.com for more projects -->
session_start();
//the isset function to check username is already loged in and stored on the session
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}

if(isset($_GET['id'])){
$id=$_GET['id'];

include 'dbcon.php';


$qry="UPDATE `announcements` SET `status`=1 WHERE `id`=$id";
$result=mysqli_query($con,$qry);

if($result){
    echo"Read Successfully";
    header('Location:../announcement.php');
}else{
    // show result
    echo "Error: " . $qry . "<br>" . $con->error;
    echo"ERROR!!";
}
}

if(isset($_GET['read'])){
    $id=$_GET['read'];
    
    include 'dbcon.php';
    
    
    $qry="UPDATE `announcements` SET `status`= 1";
    $result=mysqli_query($con,$qry);
    
    if($result){
        echo"Read Successfully";
        header('Location:../announcement.php');
    }else{
        // show result
        echo "Error: " . $qry . "<br>" . $con->error;
        echo"ERROR!!";
    }
    }
?>