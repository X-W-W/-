<?php
session_start();
$login_session = $_SESSION['user'];
$search_session = $_SESSION['search'];

// initializing variables
$teacher_name = "";
$text    = "";
$errors=array(); 



// connect to the database
$db = mysqli_connect('localhost', 'students', 'password', 'course_site');
mysqli_query($db, 'set names utf8');
// REGISTER USER

  // receive all input values from the form
  $text = mysqli_real_escape_string($db, $_POST['text']);
  $teacher_name  = mysqli_real_escape_string($db, $_POST['sel1']);
  echo $search_session;
  $ses_sql=$db->query("select teacher_id from courseteacher where teacher_name = '$teacher_name' and course_id = '$search_session'");
  $row = $ses_sql->fetch_assoc();
  $teacher_id = $row['teacher_id'];
  // first check the database to make sure 

 
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

  	$query = "INSERT INTO comment (course_id, teacher_id, teacher_name, username, text, date) 
  			  VALUES('$search_session', '$teacher_id', '$teacher_name', '$login_session', '$text', now())";
  	mysqli_query($db, $query);

  	header('location: course-detail.php');
  }
?>