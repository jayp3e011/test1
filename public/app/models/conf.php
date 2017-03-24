<?php
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('DBSE', 'test');
	define('PORT', '3306');

	define('HOST1', 'sql6.freemysqlhosting.net');
	define('USER1', 'sql6161771');
	define('PASS1', 'BzWAKbzp8a');
	define('DBSE1', 'sql6161771');
	define('PORT1', '3306');
	$item_per_page = 1;
	$link = mysqli_connect(HOST, USER, PASS, DBSE, PORT);
	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}
	include_once('UserClass.php');
	$con = new UserClass($link);
?>