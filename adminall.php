<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="./style/navbar.css">
  <link rel="stylesheet" href="./style/list.css">
</head>

<body>

<?php
  require_once "./session_checks/admin_loginchk.php";
?>

<div class="topnav">
    <a href="adminpage.php">Home</a>
    <a href="cardetails.php">Car Details</a>
    <a href="adminact.php">Active Bookings</a>
    <a class="active" href="#top">All Bookings</a>
    <a href="adminfb.php">Feedback</a>
    <a href="logout.php" class="logoutbtn"><img src="./images/logouticon.png" height="43px" width="43px"></a>
</div>

<?php

    require_once "config.php";

    $sql = "SELECT * FROM booking"; 
    if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) { 
        echo "<table>"; 
        echo "<tr>"; 
        echo "<th><font size=5pt>BookingID&nbsp;&nbsp;&nbsp;</font></th>";
        echo "<th><font size=5pt>Username&nbsp;&nbsp;&nbsp;</font></th>"; 
        echo "<th><font size=5pt>Model&nbsp;&nbsp;&nbsp;</font></th>"; 
        echo "<th><font size=5pt>Booking_From&nbsp;&nbsp;</font></th>";
        echo "<th><font size=5pt>Booking_To&nbsp;&nbsp;</font></th>";
        echo "<th><font size=5pt>Liscense_Number&nbsp;&nbsp;&nbsp;</font></th>";
        echo "<th><font size=5pt>Amount&nbsp;&nbsp;&nbsp;</font></th>";
        echo "</tr>"; 
        while ($row = mysqli_fetch_array($res)) { 
            echo "<tr>"; 
            echo "<td>".$row['bookingid']."</td>"; 
            echo "<td>".$row['email']."</td>"; 
            echo "<td>".$row['model']."</td>"; 
            echo "<td>".$row['bookingfrom']."</td>";
            echo "<td>".$row['bookingto']."</td>";
            echo "<td>".$row['licenseno']."</td>"; 
            echo "<td>".$row['amount']."</td>"; 
            echo "</tr>"; 
        } 
        echo "</table>";
    } 
    else { 
        echo "No Bookings"; 
    } 
} 
else { 
    echo "ERROR: Could not able to execute $sql. "; 
} 

 ?>

</body>
</html>