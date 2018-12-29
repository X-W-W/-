<?php
header("Content-type:text/html;charset=utf-8"); 
session_start();

// initializing variables
$searchText = "";

$errors=array(); 

// connect to the database
$db = mysqli_connect('localhost', 'students', 'password', 'course_site');
mysqli_query($db,'set names utf8');
$searchText = mysqli_real_escape_string($db, $_POST['searchText']);

  if (empty($searchText)) {
  	array_push($errors, "searchText is required");
  	header('location: course.php');
  }

  if (count($errors) == 0) {
  	$query = "SELECT id FROM course WHERE coursename = '$searchText'";
  	
  	$results = mysqli_query($db, $query);
  	$searchResult = mysqli_fetch_assoc($results);

  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['search'] = $searchResult['id'];
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: course-detail.php');
  	}else {
		array_push($errors, "Sorry, No such record");
  	}
  }
?>