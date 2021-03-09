<!DOCTYPE html>
<html>
<br>
<br>
<br>
<br>
<style>
	input[type=text], input[type=password], input[ type=number] {
  width: 20%; 
  padding: 10px;
  margin: 5px 0 20px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;

}
	body{
background-image:url('adminlink.jpg');
background-size:cover;
}
	</style>
<head>
<h1><font align=centre size=6 style="Times New Roman">Please Enter OTP</font></h1>
</head>
<body>

<form method="post" >
	<input type="password" placeholder="* * * *" name="otp" required> <br/>
    <button align="centre" type="submit" name="btn" style="height:30px; width:150px" >Submit</button>
</form>

<?php
if(isset($_POST['btn']))
{
echo "<script type = \"text/javascript\">
                  window.location = (\"Booking.php\")
                  alert(\"Payment Successful......\");
                  </script>";
}
?>
</body>
</html>