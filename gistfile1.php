<?php

// API access key from Google API's Console
include 'config.php';
include 'database.class.php';


class GCM {

	function __construct() {
	}

	function sendpushnoti($registrationIds, $msg) {
		$fields = array
		(
			'registration_ids' 	=> $registrationIds,
			'data'				=> $msg
		);
 
		$headers = array
		(
			'Authorization: key=' . GOOGLE_API_KEY,
			'Content-Type: application/json'
		);
 
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );

		echo $result;
	}
}

function getAllUsers() {
 	$sql = "SELECT * FROM bldgs";
	$db = new Database();
	$db->query($sql);
	$result = $db->resultSet();
	return $db->query($sql);

}

?>
