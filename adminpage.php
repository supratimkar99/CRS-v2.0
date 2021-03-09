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
    <a class="active" href="#home">Home</a>
    <a href="cardetails.php">Car Details</a>
    <a href="adminact.php">Active Bookings</a>
    <a href="adminall.php">All Bookings</a>
    <a href="adminfb.php">Feedback</a>
    <a href="logout.php" class="logoutbtn"><img src="./images/logouticon.png" height="43px" width="43px"></a>
  </div>

  <?php 
    require_once "config.php";

    $sql = "SELECT count(*) FROM models";
    if ($res = mysqli_query($conn, $sql)) {
      $row = mysqli_fetch_array($res);
      $models = $row[0];
    }
    else { 
      $models = 6;
    }

    $sql = "SELECT count(*) FROM booking";
    if ($res = mysqli_query($conn, $sql)) {
      $row = mysqli_fetch_array($res);
      $ords = $row[0];
    }
    else { 
      $ords = 0;
    }

    $sql = "SELECT count(*) FROM customer";
    if ($res = mysqli_query($conn, $sql)) {
      $row = mysqli_fetch_array($res);
      $cust = $row[0];
    }
    else { 
      $cust = 0;
    }
  ?>

  <div class="container">

    <h2>Our Platform in Numbers</h2>

    <ul>
      <li>
        <img src="./images/caricon.png" height="100px" width="130px">
        <h3>Car Models</h3>
        <p>Our Platform boasts a variety of <strong style="font-size:25px;"><?php echo $models; ?></strong> unique car models.</p>
      </li>
      
      <li>
        <img src="./images/custicon.png" height="100px" width="130px">
        <h3>Happy Customers</h3>
        <p>A total of <strong style="font-size:25px;"><?php echo $cust; ?></strong> satisfied users are registered with our platform.</p>
      </li>

      <li>
        <img src="./images/ordersicon.png" height="100px" width="130px">
        <h3>Countless Rides</h3>
        <p>We have fascilitated <strong style="font-size:25px;"><?php echo $ords; ?></strong> odd bookings with utmost ease.</p>
      </li>

    </ul>
  </div>
    
</body>

</html>