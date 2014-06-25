<?php
$con=mysqli_connect("HostWebsite.com","Alfonso","password123","my_database");
// Checks connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$fullname = mysqli_real_escape_string($con, $_POST['fullname']);
$email = mysqli_real_escape_string($con, $_POST['email']);

if(filter_var($email, FILTER_VALIDATE_EMAIL)){
	$sql="INSERT INTO Persons (FullName, Email)
	VALUES ('$fullname', '$email')";

	if (!mysqli_query($con,$sql)) {
  		die('Error: ' . mysqli_error($con));
	}
	echo "One record added";
  }
  else {
  	echo "Not valid email address";
  }
mysqli_close($con);
?>
