<?php
include_once 'gistfile1.php';

$regids = $_GET["regid"];
$message = $_GET["message"];

if (isset($regids) && isset($message)) {
	$gcm = new GCM();
	
	$registrationids = array($regids);
	$msg = array("message" => $message);
	
	$result = $gcm->sendpushnoti($registrationids, $msg);
	echo $result;

}


?>
