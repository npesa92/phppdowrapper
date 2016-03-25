<?php
include 'database.class.php';

$id="nuzbuzta420";
$pass = $_GET['pass'];
$hashpass = sha1($pass);
$database = new Database();

$sql = 'UPDATE ssusers SET pass = :pass WHERE id = :id';

$database->query($sql);
$database->bind(':pass', $hashpass);
$database->bind(':id', $id);
$database->execute();
$row = $database->rowCount();
echo $row;

?>
