<?php
include 'database.class.php';

$id = "npesa9";
//$fname = $_POST["fname"];
//$lname = $_POST["lname"];

$database = new Database();

//$sql = 'INSERT INTO sstest (id, fname, lname) VALUES (:id, :fname, :lname)';
$sqlget = 'SELECT * FROM sstest WHERE id = :id';

$database->query($sqlget);

$database->bind(':id', $id);
//$database->bind(':fname', $fname);
//$database->bind(':lname', $lname);

$database->execute();

$row = $database->rowCount();

echo $row=5;
//echo json_encode($row);

?>
