<?php
	// define('HOST', 'localhost');
	// define('USER', 'root');
	// define('PASS', '');
	// define('DBSE', 'test');

	// $link = mysqli_connect(HOST, USER, PASS, DBSE);
	// if (!$link) {
	//     echo "Error: Unable to connect to MySQL." . PHP_EOL;
	//     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	//     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	//     exit;
	// }
	$dbopts = parse_url(getenv('DATABASE_URL'));
	$link->register(new Herrera\Pdo\PdoServiceProvider(),
	   array(
	       'pdo.dsn' => 'pgsql:dbname='.ltrim($dbopts["path"],'/').';host='.$dbopts["host"] . ';port=' . $dbopts["port"],
	       'pdo.username' => $dbopts["user"],
	       'pdo.password' => $dbopts["pass"]
	   )
	);
?>