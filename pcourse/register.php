<?php
header("Content-type:text/html;charset=utf-8");
session_start();

// initializing variables
$username = "";
$email    = "";
$errors=array(); 



// connect to the database
$db = mysqli_connect('localhost', 'students', 'password', 'course_site');

// REGISTER USER

  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

 
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM login WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
 
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);// better to encrypt the password before saving in the database

  	$query = "INSERT INTO login (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['user'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
?>