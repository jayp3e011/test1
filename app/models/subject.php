<?php
	include('conf.php');

	if($link){
		$table='subject';
		if(isset($_POST['action'])){
			if($_POST['action']=="createsubject"){
				echo "create subject ok!";
				$name = $_POST['name'];
				$timeduration = $_POST['timeduration'];
				$passingrate = $_POST['passingrate'];
				$description = $_POST['description'];
				$attempt = $_POST['attempt'];
				$items = $_POST['items'];
				$sql = "insert into $table VALUES('','$name','$description','$timeduration','$passingrate','$attempt','$items')";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
		}
		else{			
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
	}
?>