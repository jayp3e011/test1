<?php
	include('conf.php');
	if($link){
		$table='question';
		// $table='exam_questions';
		if(isset($_POST['action'])){
			if($_POST['action']=="loadquestions"){
				$table1='subject';
				$sql = "select id,name,timeduration,items from $table1 WHERE id=".$_POST['subject_id'];
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				$row=mysqli_fetch_assoc($result);
				$limit = intval($row['items']);
				$sql1 = "select * from $table WHERE subject_id=".$_POST['subject_id']." limit ".$limit;	
				$result1 = mysqli_query($link, $sql1) or die("Invalid query" . mysqli_error($link));
				$arr = array();
				$count=0;
				while($row1=mysqli_fetch_assoc($result1)){

					$row1['selected'] = "X";
					$arr[] = $row1;
				}

				$sql = "UPDATE exam_user SET status='ONGOING', time_start=NOW() WHERE user_id='".$_POST['user_id']."'";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));

				$data = array();
				$data['subjects'] = $row;
				$data['questions'] = $arr;
				echo json_encode($data);
			}
		}
		else{	
			$sql = "select * from $table";
		    $result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
			$arr = array();
			$count=0;
			while($row=mysqli_fetch_assoc($result)){
				$row['question'] = htmlspecialchars($row['question']);
				$row['choice_a'] = htmlspecialchars($row['choice_a']);
				$row['choice_b'] = htmlspecialchars($row['choice_b']);
				$row['choice_c'] = htmlspecialchars($row['choice_c']);
				$row['choice_d'] = htmlspecialchars($row['choice_d']);
				$row['reference'] = htmlspecialchars($row['reference']);
				$arr[] = $row;
				$count++;
			}
			echo json_encode($arr);
		}
	}
?>