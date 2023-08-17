<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('sql873.main-hosting.eu', 'u506548348_japrojects', 'Projects@90012', 'u506548348_japrojects');
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
    $number = mysqli_real_escape_string($db, $_POST['number']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
 


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM inspector WHERE user_name='$username' OR user_email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['user_name'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['user_email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO inspector (user_name, user_email, user_password, user_phone, user_type) 
  			  VALUES('$username', '$email', '$password','$number','Inspector')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['useremail'] = $email;
  	$_SESSION['usernumber'] = $number;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: inspectormanage.php');
  }
  
  echo $errors
  ?>
