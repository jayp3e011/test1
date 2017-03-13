<?php
//id,subject_id,topic_id,question,choice_a,choice_b,choice_c,choice_d,answer,reference
include('conf.php');

if($link){
	if(isset($_POST['action'])){
		if($_POST['action']=="getquestions"){
			$table='question';
			$sql = "select * from $table WHERE topic_id=".$_POST['subjectid'];
			$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
			$arr = array();
			$count=0;
			while($row=mysqli_fetch_assoc($result)){
				$arr[] = $row;
				$count++;
			}
			echo json_encode($arr);
		}
		else if($_POST['action']=="examQuestions"){
			$table = "question";
			$table2 = "topic";
			$sql = "select * from $table";
			$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
			$arr = array();
			while($row=mysqli_fetch_assoc($result)){
				$sql2 = "select * from $table2 where subject_id='".$_POST['subjectid']."'";
				$result2 = mysqli_query($link, $sql2) or die("Invalid query" . mysqli_error($link));
				while($row2=mysqli_fetch_assoc($result2)){
					if ($row['topic_id']==$row2['id']) {
						$arr[] = $row;
					}
				}
			}
			echo json_encode($arr);
		}
	}
	else{
		$table='exam';
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

<?php
	// if($link){
	// 	$table = 'exam';
	// 	$primaryKey = 'id';
	// 	$columns = array(
	// 		array( 'db' => 'id', 'dt' => 0 ),
	// 		array( 'db' => 'user_id',  'dt' => 1 ),
	// 		array( 'db' => 'subject_id',   'dt' => 2 ),
	// 		array( 'db' => 'question_id',     'dt' => 3 ),
	// 		array( 'db' => 'answer',     'dt' => 4 )
	// 	);
	// 	$sql_details = array(
	// 	    'user' => USER,
	// 	    'pass' => PASS,
	// 	    'db'   => DBSE,
	// 	    'host' => HOST
	// 	);
	// 	require( 'ssp.php' );
	// 	echo json_encode(
	// 	    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
	// 	);
	// }
?>