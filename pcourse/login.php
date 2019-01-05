<?php
session_start();

// initializing variables
$username = "";
$password = "";
$errors=array(); 

// connect to the database
$db = mysqli_connect('localhost', 'students', 'password', 'course_site');

$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  	$_SESSION['logerror'] = "请输入用户名";
  	header('location: index.php');
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  	$_SESSION['logerror'] = "请输入密码";
  	header('location: index.php');
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['user'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  		$_SESSION['logerror'] = "用户名或密码错误";
  		header('location: index.php');
  	}
  }
?>