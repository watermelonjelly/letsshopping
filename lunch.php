<?php

   include("dbconnect.php"); 

  
  $sql = 'select * from LUNCH order by LUNCHID asc';

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
    while($row = $result->fetch_assoc()) {
        // Use the uppercase column names for the associative array indices
    echo "productID:" , $row['LUNCHID'] , "<br>";
	echo "productname:" , $row['LUNCHNAME'] , "<br>";
	echo "productprice:" , $row['LUNCHPRICE'] , "<br>";
	echo "<p><HR><p>";
      }
  } else {
      echo "0 results";
  }

$conn->close();

?> 
