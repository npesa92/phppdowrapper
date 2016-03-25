<?php
$id=$_POST["id"];
$con=mysqli_connect("localhost", "nicholas", "jk385b", "nicky");
$sql="SELECT * FROM sstest WHERE id='$id'";

$retval=mysqli_query($con, $sql);
if (! $retval) {
	die('Could not get data: ' . msql_error());
}
$rows = array();
while($r=mysqli_fetch_array($retval, MYSQL_ASSOC)) {
//	echo "id: {$row['id']} \n" .
//		"fname: {$row['fname']} \n" .
//		"lname: {$row['lname']} \n";
	$rows[] = $r;
}
echo json_encode($rows);
//echo "Got yur datur";
mysqli_close($con);
?>
