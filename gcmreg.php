<?php
include 'database.class.php';

$usrname = $_POST["usrname"];
$regid = $_POST["regid"];

$sql = 'INSERT INTO gcmids(username, gcmid) VALUES(:usrname, :regid)';

$answer = -1;

$db = new Database();

$db->query($sql);
$db->bind(':usrname', $usrname);
$db->bind(':regid', $regid);
$db->execute();
$row = $db->rowCount();

if ($row > 0) {
	echo 1;
}else {
	echo 0;
}
?>
