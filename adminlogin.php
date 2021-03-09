<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./style/adminlogin.css">
  </head>

  <body>

	<div class="body"></div>
        <div class="grad"></div>
		<div class="header">
			<div>Admin<span>Login</span></div>
		</div>
		<br>
		<div class="login">
            <form method="post">
				<input type="text" placeholder="username" name="uname"><br>
				<input type="password" placeholder="password" name="psw"><br>
                <input type="submit" value="Login" name="alogin">
            </form>
            </br></br>
            <label><a href="index.php">Not an Admin?</a></label>
	</div>


  <?php

	require_once "config.php";
	
	require_once "./session_checks/check_already_loggedin.php";

  ////////////////////////ADMIN - LOGIN//////////////////////  
    if(isset($_POST['alogin']))
    {
      $uname = $_POST['uname'];
      $psw = $_POST['psw'];
      $sql="SELECT * FROM admin WHERE username='{$uname}' AND password='{$psw}'";
      $res=mysqli_query($conn,$sql);
      if(mysqli_num_rows($res)==1)
      {      
        session_start();
		$_SESSION['admin_loggedin'] = true;
        header("location: adminpage.php");
      }
      else
      { 
        echo "<script type = \"text/javascript\">
            alert(\"Invalid Email or Password................\");
            window.location = (\"adminlogin.php\")
            </script>";
      }
    }


?>
  </body>
</html>

