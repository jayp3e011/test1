<?php
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('DBSE', 'test');

	$link = mysqli_connect(HOST, USER, PASS, DBSE);
	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}
?>