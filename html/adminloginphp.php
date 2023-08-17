<?php
session_start();
include("./apis/SerSessionHandler.php");
include('./apis/auth.php');
// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$sessionHander = new AdminSessionHandler();
include_once("dbcon.php");
// connect to the database
$db = $conn;
// REGISTER USER

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {

  	$query = "SELECT * FROM admin WHERE user_name='$username' AND user_password='$password'";

  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
	  $au = new Auth();
	  $au->createCookieAdmin($username,true);
  	  $row = mysqli_num_rows($results);
  	  $_SESSION['useremail'] = $row['user_email'];
  	  $_SESSION['success'] = "You are now logged in";
	  // generate Session Header Files
	  if($sessionHander->Login()){
		$_SESSION['sessid'] = $sessionHander->ReturnID();
  	  header('location: adminpanel.php');	
	  }
  	}else {
  		array_push($errors, "Wrong username/password combination");
		print_r($_POST);
  		print_r($errors) ;
  	}
  }
}

?>