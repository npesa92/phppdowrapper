<?php
include 'database.class.php';

$id = $_POST["id"];
$pass = $_POST["pass"];
$hashedpass = sha1($pass);
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$age = $_POST["age"];
$school = $_POST["school"];

$database = new Database();

//$sql = 'INSERT INTO sstest (id, fname, lname) VALUES (:id, :fname, :lname)';
$checkusr = 'SELECT * FROM ssusers WHERE id = :id';
$checkpass = 'SELECT * FROM ssusers where id=:id && pass = :pass';
$createusr = 'INSERT INTO ssusers VALUES(:id, :fname, :lname, :age, :school, :pass)';


$database->beginTransaction();

$database->query($checkusr);
$database->bind(':id', $id);
$database->execute();
$row = $database->rowCount();

if ($row < 1) {
		$database->query($createusr);
		$database->bind(':id', $id);
		$database->bind(':fname', $fname);
		$database->bind(':lname', $lname);
		$database->bind(':age', $age);
		$database->bind(':school', $school);
		$database->bind(':pass', $hashedpass);
		$database->execute();
		echo $row = 0;
} else {
	echo $row;	
}

$database->endTransaction();

//print_r($row);
//echo json_encode($row);
?>
