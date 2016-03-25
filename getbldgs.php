<?php

include 'database.class.php';

$sch = $_POST["sch"];

$db = new Database();

$sql = 'SELECT * FROM bldgs WHERE sch = :sch';

$db->beginTransaction();

$db->query($sql);
$db->bind(':sch', $sch);
$row = $db->resultSet();
echo json_encode($row);

$db->endTransaction();

?>
