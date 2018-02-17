<?php
	require_once('../../connection.php');

	if($_POST) {
		$stud_id = $_POST['stud_id'];
		$req_id = $_POST['req_id'];
		$created_at = date('Y-m-d');

		$sql = "INSERT INTO ojt_student_requirements (requirement_id,stud_id,status,created_at,is_online, is_completed)
			values ('".$req_id."','".$stud_id."','2','".$created_at."','0','1')";

			if($conn->query($sql) == TRUE) {
				$result = "Success";
			} else {
	            $result = "Error";
			}

		print(json_encode($result));
	}
?>