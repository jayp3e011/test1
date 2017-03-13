<?php
	define('HOST', 'sql6.freemysqlhosting.net');
	define('USER', 'sql6161771');
	define('PASS', 'BzWAKbzp8a');
	define('DBSE', 'sql6161771');
	define('PORT', '3306');
	define('HOST1', 'localhost');
	define('USER1', 'root');
	define('PASS1', '');
	define('DBSE1', 'test');
	define('PORT1', '3306');
	$link = mysqli_connect(HOST1, USER1, PASS1, DBSE1, PORT1);
	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}
	include_once('UserClass.php');
	$con = new UserClass($link);
?>