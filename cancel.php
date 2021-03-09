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
<h1><font align=centre size=6 style="Times New Roman"><b><u>Cancelable Bookings</b></u></font></h1>
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
  $currentdate = date('Y-m-d');

  session_start();
    $uname=$_SESSION['username'];

  $sql = "SELECT * FROM booking where bookingfrom>'{$currentdate}' and email='{$uname}'"; 
  if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) {
        echo "<table>"; 
        echo "<tr>"; 
        echo "<th><font size=5pt>BookingID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></th>"; 
        echo "<th><font size=5pt>Model&nbsp;&nbsp;&nbsp;</font></th>"; 
        echo "<th><font size=5pt>Booking_From&nbsp;&nbsp;&nbsp;</font></th>";
        echo "<th><font size=5pt>Booking_To&nbsp;&nbsp;&nbsp;</font></th>";
        echo "<th><font size=5pt>Amount&nbsp;&nbsp;&nbsp;</font></th>";
        echo "</tr>"; 
        while ($row = mysqli_fetch_array($res)) {
          if($row['bookingfrom']>$currentdate)
          {
           echo "<tr>"; 
            echo "<td><font size=5pt>".$row['bookingid']."</font></td>"; 
            echo "<td>".$row['model']."</td>"; 
            echo "<td>".$row['bookingfrom']."</td>";
            echo "<td>".$row['bookingto']."</td>";
            echo "<td>".$row['amount']."</td>"; 
            echo "</tr>"; 
          }
        } 
        echo "</table>";
    } 
    else { 
        echo "&nbsp;&nbsp;&nbsp;<font color=Red size=5pt>No Cancelable Bookings</font>"; 
    } 
} 
else { 
    echo "ERROR: Could not able to execute $sql. "; 
} 

 ?>
<br>
<br>
<br>
<br>
</div>
<form method="post">
  <h2><font size=5>Enter Booking ID that you want to cancel:</h2> 
      <div class="col-75">
        <textarea type="number" id="booking_id" name="booking_id" placeholder="Enter here" style="height:20px; width:200px"></textarea> <br>
<button type="submit" name="cancel" style="height:20px; width:80px" >Cancel</button>
<br><br>
  </form>

<?php
 
 if(isset($_POST['cancel']))
 {
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

  $sql = "SELECT * FROM booking where bookingfrom>'{$currentdate}' and email='{$uname}'"; 
  $res = mysqli_query($conn, $sql);
  if(mysqli_num_rows($res) > 0) 
  {

  $id=$_POST['booking_id'];
  $ress = "CALL cancelbooking('{$id}')";
  if($result = mysqli_query($conn,$ress))
  {
     echo "<script type = \"text/javascript\">
                  alert(\"Booking Cancelled Successfully, Refund is initiated!\");
                  window.location = (\"Booking.php\")
                  </script>";
  }
}
else
{
  echo "<script type = \"text/javascript\">
                  alert(\"Invalid Booking ID!\");
                  window.location = (\"Booking.php\")
                  </script>";
}
}
?>

</body>
</html>