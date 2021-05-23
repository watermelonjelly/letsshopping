<?php

include('dbconnect.php'); 
include('session.php');

if (isset($_POST['submit'])) 
{
  if (empty($_POST['uname']) || empty($_POST['psw'])) {
    $error = "Username or Password is invalid";
  }
  else{
   // Define $username and $password
   $uname = $_POST['uname'];
   $psw = $_POST['psw'];
  }

   // SQL query to fetch information of registerd users and finds user match.
  $query = "SELECT USERNAME,PASSWORD FROM SCHOOLUSER WHERE USERNAME=? AND PASSWORD=? LIMIT 1";

   // To protect MySQL injection for Security purpose
  $stmt = $conn->prepare($query);
  $stmt->bind_param("ss", $uname, $psw);
  $stmt->execute();
  $stmt->bind_result($uname, $psw);
  $stmt->store_result();
  
  if($stmt->fetch()){
      //fetching the contents of the row    
	  $_SESSION['login_user'] = $uname; // Initializing Session

    header("location: profile.php"); // Redirecting To HomePage
  }
  else
  echo "Error: Username or Password is invalid";
}

?>