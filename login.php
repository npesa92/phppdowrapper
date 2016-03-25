<?php

include 'database.class.php';

$id = $_POST["id"];
$pass = $_POST["pass"];
$hashedpass = sha1($pass);

$database = new Database();

$checkpass = 'SELECT * FROM ssusers where id=:id && pass = :pass';

$database->beginTransaction();

$database->query($checkpass);
$database->bind(':id', $id);
$database->bind(':pass', $hashedpass);
$database->execute();
$row = $database->rowCount();
if ($row == 1) {
	$row = $database->resultSet();
	echo json_encode($row);
}else {
	echo $row = 2;
}
$database->endTransaction();

?>
