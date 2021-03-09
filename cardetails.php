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
    <a class="active" href="#top">Car Details</a>
    <a href="adminact.php">Active Bookings</a>
    <a href="adminall.php">All Bookings</a>
    <a href="adminfb.php">Feedback</a>
    <a href="logout.php" class="logoutbtn"><img src="./images/logouticon.png" height="43px" width="43px"></a>
</div>

<?php

    require_once "config.php";
    $sql = "SELECT * FROM models"; 
    if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) { 
        echo "<table>"; 
        echo "<tr>"; 
        echo "<th><font size=5pt>Model&nbsp;&nbsp;&nbsp;&nbsp;</font></th>"; 
        echo "<th><font size=5pt>Rate&nbsp;&nbsp;</font></th>"; 
        echo "<th><font size=5pt>Units-Available&nbsp;&nbsp;&nbsp;&nbsp;</font></th>";
        echo "<th><font size=5pt>Times-Booked</font></th>";
        echo "</tr>"; 
        while ($row = mysqli_fetch_array($res)) { 
            echo "<tr>"; 
            echo "<td>".$row['name']."</td>"; 
            echo "<td>".$row['rate']."</td>"; 
            echo "<td>".$row['units']."</td>";
            echo "<td>".$row['timesbooked']."</td>"; 
            echo "</tr>"; 
        } 
        echo "</table>";
    } 
    else { 
        echo "No Feedbacks";
    } 
} 
else { 
    echo "ERROR: Could not able to execute $sql. "; 
} 

 ?>

</body>
</html>
