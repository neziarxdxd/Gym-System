<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "fitness_connection");
$output = '';
$cnt = 1;
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM members";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th>#</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Contact Number</th>
                    <th>D.O.R</th>
                    <th>Address</th>
                    <th>Amount</th>
                    <th>Choosen Service</th>
                    <th>Plan</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$cnt.'</td>  
                         <td>'.$row["fullname"].'</td>  
                         <td>'.$row["username"].'</td>  
                        <td>'.$row["gender"].'</td>  
                        <td>'.$row["contact"].'</td>
                        <td>'.$row["dor"].'</td>
                        <td>'.$row["address"].'</td>
                        <td>'.$row["amount"].'</td>
                        <td>'.$row["services"].'</td>
                        <td>'.$row["plan"].'Month/s</td>
                    </tr>
   ';
   $cnt++;}
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
  }
?>