<?php
include 'database.class.php';

$sch = $_POST["sch"];
$lat = $_POST["lat"];
$lon = $_POST["lon"];
$bldg = $_POST["bldg"];


$db = new Database();

$sql = 'INSERT INTO bldgs VALUES(:sch, :bldg, :lat, :lon)';
$checkbuild = 'SELECT * FROM bldgs WHERE sch = :sch && bldg = :bldg';

$db->beginTransaction();

$db->query($checkbuild);
$db->bind(':sch', $sch);
$db->bind(':bldg', $bldg);
$db->execute();
$row = $db->rowCount();

if ($row < 1) {
	$db->query($sql);
	$db->bind(':sch', $sch);
	$db->bind(':bldg', $bldg);
	$db->bind(':lat', $lat);
	$db->bind(':lon', $lon);
	$db->execute();
	echo $row = $db->rowCount();
} else {
	$row = 2;
	echo $row;
}

$db->endTransaction();

?>
