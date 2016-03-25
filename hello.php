<?php
$id=$_POST["id"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];

$con=mysqli_connect("localhost", "nicholas", "jk385b", "nicky");
$sql="INSERT INTO sstest values('$id', '$fname', '$lname')";
if (mysqli_query($con, $sql)) {
	echo $id . $fname . $lname;
}
?>
