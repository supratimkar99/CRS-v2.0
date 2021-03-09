<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./style/login.css">
  </head>
  <body>


  <div class="login-wrap">
	<div class="login-html">
    <label class="heading">Car Rental System</label>
    </br></br></br>
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
        <form method="post">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="uname" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="psw" required>
        </div>
        </br>
				<div class="group">
					<input type="submit" name="ulogin" class="button" value="Sign In">
        </div>
        </form>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="adminlogin.php">Are you an Admin?</a>
				</div>
			</div>
			<div class="sign-up-htm">
        <form method="post">
				<div class="group">
					<label for="user" class="label">Name</label>
					<input id="user" type="text" class="input" name="name" required>
        </div>
        <div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" type="text" class="input" name="email" required>
        </div>
        <div class="group">
					<label for="pass" class="label">Phone Number</label>
					<input id="pass" type="tel" class="input" name="phone" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="pswd" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="re-psw" required>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up" name="usignup">
        </div>
        </form>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1" class="foot-lnk">Already a Member?</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

  require_once "./session_checks/check_already_loggedin.php";

  require_once "config.php";

  ////////////////////////////////////////LOGIN/////////////////////////////////////  
    if(isset($_POST['ulogin']))
    {
      $uname = $_POST['uname'];
      $psw = $_POST['psw'];
      $sql="SELECT password FROM customer WHERE email='{$uname}'";
      $res=mysqli_query($conn,$sql);
      if(mysqli_num_rows($res)==0) {
        echo "<script type = \"text/javascript\">
            alert(\"Invalid Username................\");
            window.location = (\"index.php\")
            </script>";
      }
      //decrypting the password
      $row = mysqli_fetch_array($res);
      $encrypted_pass = $row[0];
      $ciphering = "AES-128-CTR";
      $options = 0;
      $decryption_iv = '1234567891011121';
      $decryption_key = "TimBernersLee";
      $decrypted_pass=openssl_decrypt ($encrypted_pass, $ciphering, $decryption_key, $options, $decryption_iv);
      
      if($decrypted_pass == $psw)
      {      
        session_start();
        $_SESSION['username']=$uname; 
        $_SESSION["loggedin"] = true;
        header("location: homepage.php");
      }
      else
      { 
        echo "<script type = \"text/javascript\">
            alert(\"Invalid Password................\");
            window.location = (\"index.php\")
            </script>";
      }
    }

//////////////////////////////SIGNUP//////////////////////////////
if(isset($_POST['usignup']))
{

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pswd'];
    $phone = $_POST['phone'];
    $repass = $_POST['re-psw'];
    if($pass!=$repass)
    {
        echo "<script type = \"text/javascript\">
                  alert(\"Passwords do not match, Please Verify and try again..........\");
                  </script>";
    }
    else
    {
    $sql="SELECT * FROM customer WHERE email='{$email}'";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)==0)
    {
      //encrypting the password      
      $ciphering = "AES-128-CTR";
      $encryption_iv = '1234567891011121';
      $options = 0;
      $encryption_key = "TimBernersLee";
      $encrypted_pass = openssl_encrypt($pass, $ciphering, $encryption_key, $options, $encryption_iv);
      
      $query = "INSERT INTO customer(name,email,phone,password) VALUES ('$name','$email','$phone','$encrypted_pass')";
      if(mysqli_query($conn, $query)){
      echo "Records added successfully.";}
      echo "<script type = \"text/javascript\">
            window.location = (\"index.php\")
            alert(\"Signup Successful.................\");
            </script>";
    }
    else
    { 
      //echo "<p>Email already in use....!!</p>";
      echo "<script type = \"text/javascript\">
            alert(\"Email already in use................\");
            </script>";
    }
  }
}

?>

</body>
</html>

