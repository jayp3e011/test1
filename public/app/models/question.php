<?php
	include('conf.php');
	//id,subject_id,topic_id,question,choice_a,choice_b,choice_c,choice_d,answer,reference

	if($link){
		$table='question';
		if(isset($_POST['action'])){
			if($_POST['action']=="createquestion"){
				echo "create question ok!";
				$subject_id = $_POST['subjectid'];
				$topic_id = $_POST['topicid'];
				$question = $_POST['question'];
				$choice_a = $_POST['choice_a'];
				$choice_b = $_POST['choice_b'];
				$choice_c = $_POST['choice_c'];
				$choice_d = $_POST['choice_d'];
				$answer = $_POST['answer'];
				$reference = $_POST['reference'];
				$sql = "insert into $table VALUES('','$subject_id','$topic_id', '$question','$choice_a','$choice_b','$choice_c','$choice_d','$answer','$reference')";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
			if($_POST['action']=="updatequestion"){
				echo "update question ok!";
				$id = $_POST['id'];
				$subject_id = $_POST['subjectid'];
				$topic_id = $_POST['topicid'];
				$question = $_POST['question'];
				$choice_a = $_POST['choice_a'];
				$choice_b = $_POST['choice_b'];
				$choice_c = $_POST['choice_c'];
				$choice_d = $_POST['choice_d'];
				$answer = $_POST['answer'];
				$reference = $_POST['reference'];
				$sql = "update $table SET subject_id='$subject_id',topic_id='$topic_id', question='$question',choice_a='$choice_a',choice_b='$choice_b',choice_c='$choice_c',choice_d='$choice_d',answer='$answer',reference='$reference' where id='$id'";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
			if($_POST['action']=="deletequestion"){
				echo "delete question ok!";
				$id = $_POST['id'];
				$answer= $_POST['answer'];
				$reference = $_POST['reference'];
				$sql = "delete from $table where id='$id'";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
			if($_POST['action']=="importquestion"){
				$question = $_POST['question'];
				$choice_a = $_POST['choice_a'];
				$choice_b = $_POST['choice_b'];
				$choice_c = $_POST['choice_c'];
				$choice_d = $_POST['choice_d'];
				$answer = trim($_POST['answer']);
				$reference = $_POST['reference'];
				$sql = "insert into question1 VALUES('','$question','$answer','$choice_a','$choice_b','$choice_c','$choice_d','$reference')";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				if ($result) {
					echo "Success!....";
				}
				else
				{
					echo "Error";
				}
				echo $result;
				
			}
			if ($_POST['action']=="getQuest1") {
				$sql = "select * from question1";
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
		else{	
			// $sql = "select * from $table";
			$sql = "select q.id, coalesce(s.name) as subject_id, coalesce(t.name) as topic_id,q.question,q.choice_a,q.choice_b,q.choice_c,q.choice_d,q.answer,q.reference from $table q join topic t on t.id=q.topic_id join subject s on t.subject_id=s.id";
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