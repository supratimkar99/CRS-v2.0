<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Times New Roman;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

col-25,
col-50,
col-75 {
  padding: 0 16px;
}

container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

button {
  background-color: blue;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

button:hover {
  background-color: red;
}
}
</style>
</head>
<body>
            <h3><font size=6><b><u>Enter Payment Info</b></u></font></h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
  <h4><font size=5>Amount To Be Paid:</font></h4>
      <?php
      session_start();
        $amount=$_SESSION['tamount'];
        ?>
  <input type="text" id="amnt" value="<?php echo $amount ?>"/>

      <form method="post">
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="enter name">
            <label for="ccnum">Debit/Credit card number</label>
            <input type="text" id="ccnum" name="cardno" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Expiry Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="month">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Expiry Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="yyyy">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="password" id="cvv" name="cvv" placeholder="***">
                <br><br>
				<button name="paymentbtn" type="submit">Pay</button>
      </form>

<?php

if(isset($_POST['paymentbtn']))
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

    $cardname = $_POST['cardname'];
    $cardno = $_POST['cardno'];
    $expm = $_POST['expmonth'];
    $expy = $_POST['expyear'];  
    if(strlen($cardno)!=16)
    {
      echo "<font color=red size=5pt>Please provide a valid card number</font>";
    }
    else
    {
       $query = "INSERT INTO payment(bookingid,nameoncard,cardno,expmonth,expyear,amount) VALUES (NULL,'$cardname','$cardno','$expm','$expy','$amount')";
        if(mysqli_query($conn, $query)){
        echo "Records added successfully.";
        echo "<script type = \"text/javascript\">
                  window.location = (\"otp.php\")
                  alert(\"Payment is being processed......\");
                  </script>";}
    }
}
?>


</body>
</html>
