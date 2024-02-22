<?php 

session_start();
//the isset function to check username is already loged in and stored on the session
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
echo 'Hello\n';
echo $start_date . " " . $end_date;
header("Location: staffs.php");

?>