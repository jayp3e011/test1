<?php
	include('conf.php');
	//id,user_id,subject_id,name,date

	if($link){
		$table='topic';
		if(isset($_POST['action'])){
			if($_POST['action']=="createtopic"){
				echo "create topic ok!";
				$user_id = $_POST['user_id'];
				$subject_id = $_POST['subject_id'];
				$name = $_POST['name'];
				$date = date("Y-m-d H:i:s"); 
				$sql = "insert into $table VALUES('','$user_id','$subject_id', '$name','$date')";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
			if($_POST['action']=="updatetopic"){
				echo "update topic ok!";
				$id = $_POST['id'];
				$subject_id = $_POST['subject_id'];
				$name = $_POST['name'];
				$sql = "update $table SET subject_id='$subject_id', name='$name' where id='$id'";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
			if($_POST['action']=="deletetopic"){
				echo "delete topic ok!";
				$id = $_POST['id'];
				$sql = "delete from $table  where id='$id'";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
		}
		else{	
			$sql = "select t.id, concat_ws(' ',u.firstname, u.lastname) as user_id, coalesce(s.name) as subject_id, t.name, t.date from $table t join user u on t.user_id=u.id join subject s on t.subject_id=s.id";
		    $result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
			$arr = array();
			$count=0;
			while($row=mysqli_fetch_assoc($result)){
				$arr[] = $row;
				$count++;
			}
			// echo $arr;
			echo json_encode($arr);
		}
	}
?>