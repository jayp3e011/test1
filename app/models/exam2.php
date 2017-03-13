<?php
	//id,subject_id,topic_id,question,choice_a,choice_b,choice_c,choice_d,answer,reference
	include('conf.php');

	if($link){
		$table='question';
		$action = $_POST['action'];
		if (isset($action)) {
			if ($action=="totalitems") {
				$results = mysqli_query($connecDB,"SELECT COUNT(*) FROM $table");
				$get_total_rows = mysqli_fetch_array($results); //total records

				//break total records into pages
				$pages = ceil($get_total_rows[0]/$item_per_page); 
				echo $pages;
			}
			else if ($action=="getquestion") {
				$table2 = "topic";
				$sql = "SELECT * FROM $table";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				$arr = array();
				while($row=mysqli_fetch_assoc($result)){
					$sql2 = "SELECT * FROM $table2 WHERE subject_id='".$_POST['subjectid']."'";
					$result2 = mysqli_query($link, $sql2) or die("Invalid query" . mysqli_error($link));
					while($row2=mysqli_fetch_assoc($result2)){
						if ($row['topic_id']==$row2['id']) {
							$arr[] = $row;
						}
					}
				}
				echo json_encode($arr);
			}
			else{
			    $page_number = filter_var($action, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
			    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
				else{
				    $page_number = 1;
				}

				//get current starting point of records
				$position = (($page_number-1) * $item_per_page);


				//query
				$table2 = "topic";
				$sql = "SELECT * FROM $table ORDER BY id ASC LIMIT $position, $item_per_page";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				$arr = array();
				while($row=mysqli_fetch_assoc($result)){
					$sql2 = "SELECT * FROM $table2 WHERE subject_id='".$_POST['subjectid']."'";
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
	}
?>