<?php
 
class DB_Functions {
 
    private $db;
 
    //put your code here
    // constructor
    function __construct() {
        include_once 'dbconnect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }
 
    // destructor
    function __destruct() {
         
    }

    public function getAllUsers() {
        $result = mysql_query("select * FROM gcmids");
        return $result;
    }
 
}
 
?>
