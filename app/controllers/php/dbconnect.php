<?php
// mysql connection
$hostname = 'sql6.freemysqlhosting.net';
$username = 'sql6161771';
$password = 'BzWAKbzp8a';
$database = 'sql6161771';

$db = new mysqli($hostname, $username, $password, $database);
if($db->connect_errno)
	die('Error ' . $this->db->connect_error);

include_once('UserClass.php');
$con = new UserClass($db);
?>