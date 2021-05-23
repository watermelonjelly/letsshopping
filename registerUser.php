<?php 

include("dbconnect.php");
include("email.php");


$firstname=$_POST["firstName"];
$lastname=$_POST["lastName"];
$username=$_POST["username"];
$email=$_POST["email"];
$password=$_POST["psw"];
$email=$_POST["email"];
$streetNo=$_POST["streetNo"];
$streetName=$_POST["streetName"];
$surburb=$_POST["surburb"];
$state=$_POST["state"];
$postcode=$_POST["postcode"];
$card=$_POST["card"];
$expDate=$_POST["expDate"];
$child1=$_POST["child1"];
$child1class=$_POST["child1class"];
$child2=$_POST["child2"];
$child2class=$_POST["child2class"];
$child3=$_POST["child3"];
$child3class=$_POST["child3class"];
$address=$streetNo." ".$streetName.", ".$surburb.", ".$state." ".$postcode;
$creditcard=$card." exp:".$expDate;




$from = "ye.shen2@student.mq.edu.au";
$to = $email;
$subject = "Registration Confirmation";

//$headers = 'MIME-Version: 1.0' . "\r\n";
//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From:ye.shen2@student.mq.edu.au" . $from;

$message = 'COMP344 Assignment 1,2019' . "\r\n";
$message .= 'Ye Shen' . "\r\n";
$message .= '45132658' . "\r\n";
$message .= 'Details:'. "\r\n";
$message .= 'Full Name: '."$firstname " . " $lastname" . "\r\n";
$message .= 'Username: ' . "$username" . "\r\n";
$message .= 'Children: ' . "$child1 " . "$child1class " ." $child2 " . "$child2class" . " $child3 " ."$child3class" . "\r\n";

$message .= 'From:ye.shen2@student.mq.edu.au';



$sql = "INSERT INTO `45132658`.`SCHOOLUSER` (`FIRSTNAME`, `LASTNAME`, `USERNAME`, `PASSWORD`, `EMAIL`, `ADDRESS`, `CREDIT CARD`) VALUES ('$firstname', '$lastname', '$username', '$password','$email', '$address','$creditcard')"; 
$sql2 ="INSERT INTO `45132658`.`CHILDREN` (`CHILDNAME`, `CHILDCLASS`, `PARENTEMAIL`) VALUES ('$child1', '$child1class', '$email'),('$child2', '$child2class', '$email'),('$child3', '$child3class', '$email')";

if (empty($_POST['child2']) && empty($_POST['child3'])) {
  $sql2 ="INSERT INTO `45132658`.`CHILDREN` (`CHILDNAME`, `CHILDCLASS`, `PARENTEMAIL`) VALUES ('$child1', '$child1class', '$email')";
}
 else if (empty($_POST['child2'])) {
  $sql2 ="INSERT INTO `45132658`.`CHILDREN` (`CHILDNAME`, `CHILDCLASS`, `PARENTEMAIL`) VALUES ('$child1', '$child1class', '$email'),('$child3', '$child3class', '$email')";
}
 else if (empty($_POST['child3'])) {
   $sql2 ="INSERT INTO `45132658`.`CHILDREN` (`CHILDNAME`, `CHILDCLASS`, `PARENTEMAIL`) VALUES ('$child1', '$child1class', '$email'),('$child2', '$child2class', '$email')";
}
 else
   $sql2 ="INSERT INTO `45132658`.`CHILDREN` (`CHILDNAME`, `CHILDCLASS`, `PARENTEMAIL`) VALUES ('$child1', '$child1class', '$email'),('$child2', '$child2class', '$email'),('$child3', '$child3class', '$email')";



if (mysqli_query($conn, $sql) === TRUE && mysqli_query($conn, $sql2) === TRUE) {
  
  echo "Thank you for registration and Please check the details.";

  $mailcheck = spamcheck($to);
  if ($mailcheck == FALSE)
    echo "Invalid receiver's email address.";
  else if (spamcheck($from) == FALSE)
    echo "Invalid sender's email address.";
  else{
    mail($to, $subject, $message, $headers);
    echo "<p>The email has been sent to</p>";
    echo "<p>$to</p>";
  }

  
} else {
    echo "Error: Query did not succeed";
}

?>

