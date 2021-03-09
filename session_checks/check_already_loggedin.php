<?php

session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: homepage.php"); ////enter the location of your home page
    exit;
}

if(isset($_SESSION["admin_loggedin"]) && $_SESSION["admin_loggedin"] === true){
  header("location: adminpage.php"); ////enter the location of your home page
  exit;
}

?>