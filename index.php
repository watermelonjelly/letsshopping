<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php"); // Redirecting To Profile Page
}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  body {
    font-family: Arial, Helvetica, sans-serif;
    margin-left:200px;
    margin-right:200px;
  }

  form {
    border: 3px solid #f1f1f1;
  }

  input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }
  
  a {
    text-decoration: none;
  }

  button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }

  button:hover {
    opacity: 0.8;
  }

  .SignUp {
    width: auto;
    padding: 10px 18px;
    background-color: #4CAF50;
  }

  .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
  }

  img.avatar {
    width: 40%;
    border-radius: 50%;
  }

  .container {
    padding: 16px;
  }

  span.psw {
    float: right;
    padding-top: 16px;
  }

  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
    span.psw {
      display: block;
      float: none;
    }
    .cancelbtn {
      width: 100%;
    }
  }

</style>
</head>
<body>
<div class="ID" id="MyID">
   <ul>
     <li><b>COMP344 Assignment 1,2019</b></li>
     <li><b>Ye Shen</b></li>
     <li><b>45132658</b></li>
   </ul>
</div>
<h2>ACCOUNT LOGIN</h2>

<form method="post" action="login.php">
  <div class="imgcontainer">
    <img src="login.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit" name="submit">Login</button>
    <label>
    <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="SignUp"><a href="registration.html">Sign Up</a></button>
    <span class="psw">Forgot <a href="#">Password?</a></span>
  </div>
</form>

</body>
</html>
