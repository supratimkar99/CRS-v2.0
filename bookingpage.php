<!DOCTYPE html>
<html>
<style>
body{
background-image: url("bookingpicc.jpg");
background-size:cover;
  }
  button {
  background-color: blue;
  border: 1px;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  font-size: 20px;
  border-radius:4px;
}
  .button:hover {
  background-color: #4CAF50;
  color: white;
}

</style>
<body>
<h1 style="text-align:center"><b><u><font font=8 style=Times New Roman>Make your selections</b></u></h1></font>

<h2><font size=5>Car Models</font></h2>
<form method="post">
  <select name="model">
    <option value="Compact">Compact</option>
    <option value="Sedan">Sedan</option>
    <option value="SUV">SUV</option>
    <option value="Luxury">Luxury</option>
    <option value="Van">Van</option>
    <option value="Convertible">Convertible</option>
  </select>
  <br>
<h3><font size=5>Enter Number of Days:</font></h3>
<div class="col-75">
        <textarea id="days" name="days" placeholder="Enter here" style="height:20px; width:100px"></textarea>
      </div>
<h4><font size=5>Select Dates</font></h4>
  <li>From</li>
<input name="from" type="date">
  <br><br>
  <li>To</li>
<input name="to" type="date">
  <br>
  <h5><font size=5>Enter your license number:</h5>
      <div class="col-75">
        <textarea id="subject" name="subject" placeholder="Enter here" style="height:20px; width:200px"></textarea>
      </div>
    <br>
  <button name="bookbtn" type="submit" ><b>Check Availability and Book</b></button> 
  </form>

<?php

if(isset($_POST['bookbtn']))
{
    $host = "localhost";
  $user = "root";
  $pass = "";
  $db = "project";
  
  $conn = new mysqli($host, $user, $pass, $db);
  if($conn->connect_error)
  {
    echo "Failed:" . $conn->connect_error;
  }
    
    session_start();
    $email=$_SESSION['username'];

    $model = $_POST['model'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $day = $_POST['days'];
    function dateDiff($date1,$date2)
    {
      $date1_ts= strtotime($date1);
      $date2_ts= strtotime($date2);
      $diff = $date2_ts - $date1_ts;
      return round($diff / 86400);
    }
    $days = dateDiff($from,$to) + 1;
    $licenseno = $_POST['subject'];
    if(strlen($licenseno)!=15)
    {
      echo "</br></br>";
      echo "<font color=black size=6pt>Please provide a valid 15-DIGIT LICENSE NUMBER</font>";
    }
    else
    {
    if($days != $day)
    {
      echo "</br></br>";
      echo "<font color=black size=6pt>Please check your dates!</font>";
    }
    else
    {
    $sql="SELECT * FROM models WHERE name='{$model}'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res);
    $amount=$days*$row['rate'];

    $sql1="SELECT * FROM booking where model='{$model}' AND ('{$from}' between bookingfrom and bookingto OR '{$to}' between bookingfrom and bookingto)"; 
    $res1=mysqli_query($conn,$sql1);
    //echo mysqli_num_rows($res1);

    if($row['units']-mysqli_num_rows($res1)>=1)
    {
        session_start();
        $_SESSION['tamount']=$amount;

        $query = "INSERT INTO booking(bookingid,email,model,bookingfrom,bookingto,licenseno,amount) VALUES (NULL,'$email','$model','$from','$to','$licenseno','$amount')";
        if(mysqli_query($conn, $query)){
        echo "Records added successfully.";
        echo "<script type = \"text/javascript\">
                  window.location = (\"payment.php\")
                  alert(\"Booking Successful, Proceed to Payment......\");
                  </script>";}
    }
    else
    { 
      echo "<script type = \"text/javascript\">
                  alert(\"Model currently not available, Please select any other model or try again later\");
                  window.location = (\"bookingpage.php\")
                  </script>";
    }
  }
}
}
?>


</body>
</html>
