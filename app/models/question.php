<?php
	include('conf.php');

	if($link){
		$table='question';
		$sql = "select * from $table";
	    $result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
		$arr = array();
		$count=0;
		while($row=mysqli_fetch_assoc($result)){
			$arr[] = $row;
			$count++;
		}
		echo json_encode($arr);
	}
?>