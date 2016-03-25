<?php

include 'database.class.php';

$id = $_POST["id"];

$database = new Database();

$sqlusrcheck = 'SELECT * FROM ssusers WHERE id = :id';

$database->query($sqlusrcheck);
$database->bind(':id', $id);
$database->execute();
echo $row = $database->rowCount();
?>
