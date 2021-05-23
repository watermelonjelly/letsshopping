<?php

  include("dbconnect.php"); 
  include("session.php");

  
  $sql = "select CHILDNAME, CHILDCLASS from CHILDREN,SCHOOLUSER where CHILDREN.PARENTEMAIL=SCHOOLUSER.EMAIL and SCHOOLUSER.USERNAME='$user_check'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
    while($row = $result->fetch_assoc()) {
        // Use the uppercase column names for the associative array indices
    
	echo "childname:" , $row['CHILDNAME'] , "<br>";
	echo "class:" , $row['CHILDCLASS'] , "<br>";
	echo "<p><HR><p>";
      }
  } else {
      echo "0 results";
  }

$conn->close();

?> 
