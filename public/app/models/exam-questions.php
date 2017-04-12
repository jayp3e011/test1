<?php
	include('conf.php');
	if($link){
		$table='question1';
		// $table='exam_questions';
		if(isset($_POST['action'])){
			if($_POST['action']=="loadquestions"){
				$inserted_id=0;
				$table1='subject';
				$sql = "select * from $table1 WHERE id=".$_POST['subject_id'];
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				$row=mysqli_fetch_assoc($result);
				$limit = intval($row['items']);
				$sql1 = "select * from $table WHERE subject_id=".$_POST['subject_id']." limit ".$limit;	
				$result1 = mysqli_query($link, $sql1) or die("Invalid query" . mysqli_error($link));
				$arr = array();
				while($row1=mysqli_fetch_assoc($result1)){

					$row1['selected'] = "X";
					$arr[] = $row1;
				}
				$data = array();
				$data['subjects'] = $row;
				$data['questions'] = $arr;

				$sql2 = "SELECT id FROM exam_user WHERE user_id='".$_POST['user_id']."' AND subject_id='".$_POST['subject_id']."'";
				$result2 = mysqli_query($link, $sql2) or die("Invalid query" . mysqli_error($link));
				$row2 = mysqli_num_rows($result2);
				if($row2>0){
					$sql = "UPDATE exam_user SET status='ONGOING', time_start=NOW() WHERE user_id='".$_POST['user_id']."' AND subject_id='".$_POST['subject_id']."'";
					$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));

				}
				else{
					$date = date("Y-m-d H:i:s");
					$sql = "INSERT INTO exam_user VALUES ('','".$_POST['subject_id']."','".$_POST['user_id']."','ONGOING','".json_encode($data['questions'])."','".$date."','".$date."')";
					$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
					$inserted_id =  mysqli_insert_id($link);
					$data['exam_id']=$inserted_id;
				}
				echo json_encode($data);
			}
			else if($_POST['action']=="loadquestionsRetake"){
				$table1='subject';
				$sql = "select * from $table1 WHERE id=".$_POST['subject_id'];
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				$row=mysqli_fetch_assoc($result);
				$limit = intval($row['items']);
				$sql1 = "select * from $table WHERE subject_id=".$_POST['subject_id']." limit ".$limit;	
				$result1 = mysqli_query($link, $sql1) or die("Invalid query" . mysqli_error($link));
				$arr = array();
				while($row1=mysqli_fetch_assoc($result1)){

					$row1['selected'] = "X";
					$arr[] = $row1;
				}
				$data = array();
				$data['subjects'] = $row;
				$data['questions'] = $arr;

				$sql2 = "SELECT id FROM exam_user WHERE user_id='".$_POST['user_id']."' AND subject_id='".$_POST['subject_id']."'";
				$result2 = mysqli_query($link, $sql2) or die("Invalid query" . mysqli_error($link));
				$row2 = mysqli_num_rows($result2);
				$exam_id=mysqli_fetch_assoc($result2);
				$data['exam_id']=$exam_id['id'];
				if($row2>0){
					$sql = "UPDATE exam_user SET status='ONGOING', time_start=NOW(), data='".json_encode($data['questions'])."' WHERE user_id='".$_POST['user_id']."' AND subject_id='".$_POST['subject_id']."'";
					$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));

				}
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