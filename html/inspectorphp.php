<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
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
  	$password = md5($password);
  	$query = "SELECT * FROM inspector WHERE user_name='$username' AND user_password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
	  include_once('./apis/auth.php');
	  $au = new Auth();
	  $au->createCookieInspector($username,true);
  	  $row = mysqli_num_rows($results);
  	  $_SESSION['useremail'] = $row['user_email'];
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: inspectorpage.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  		 header('location: employeelogin.php');
  	}
  }
}

?>