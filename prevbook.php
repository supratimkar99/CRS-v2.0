<!DOCTYPE html>
<html>
<br>
<br>
<br>
<br>
<style>
	body{
background-image:url('bck.jpg');
background-size:cover;
}
	</style>
<head>
<h1><font align=centre size=6 style="Times New Roman"><b><u>Previous Orders</b></u></font></h1>
</head>
<body>
<?php

   $host = "localhost";
  $user = "root";
  $pass = "";
  $db = "project";
  
  $conn = new mysqli($host, $user, $pass, $db);
  if($conn->connect_error){
    echo "Failed:" . $conn->connect_error;
  }

  session_start();
    $uname=$_SESSION['username'];

  $sql = "SELECT bookingid,model,bookingfrom,bookingto,amount FROM booking where email='{$uname}'"; 
  if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) { 
        echo "<table>"; 
        echo "<tr>"; 
        echo "<th><font size=5pt>BookingID&nbsp;&nbsp;&nbsp;</font></th>"; 
        echo "<th><font size=5pt>Model&nbsp;&nbsp;&nbsp;</font></th>"; 
        echo "<th><font size=5pt>Booking_From&nbsp;&nbsp;&nbsp;</font></th>";
        echo "<th><font size=5pt>Booking_To&nbsp;&nbsp;&nbsp;</font></th>";
        echo "<th><font size=5pt>Amount&nbsp;&nbsp;&nbsp;</font></th>";
        echo "</tr>"; 
        while ($row = mysqli_fetch_array($res)) { 
            echo "<tr>"; 
            echo "<td>".$row['bookingid']."</td>"; 
            echo "<td>".$row['model']."</td>"; 
            echo "<td>".$row['bookingfrom']."</td>";
            echo "<td>".$row['bookingto']."</td>";
            echo "<td>".$row['amount']."</td>"; 
            echo "</tr>"; 
        } 
        echo "</table>";
    } 
    else { 
        echo "No Previous Orders"; 
    } 
} 
else { 
    echo "ERROR: Could not able to execute $sql. "; 
} 

 ?>

</body>
</html>
