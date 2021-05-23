<?php

$servername = "ash.science.mq.edu.au";
$username = "45132658";
$password = "WWUgU2hlbg==";
$database = "45132658";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

if (mysqli_connect_errno()) 
{
 die("Connection failed to database: " . mysqli_connect_error());
}

// Use database 
mysqli_select_db($conn, $database);


?> 


