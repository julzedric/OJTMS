<?php
	require_once('../../connection.php');

	$id = $_POST['id'];

	$sql = "UPDATE ojt_student_requirements SET is_completed =  1  where id = '".$id."' ";
	
		if($conn->query($sql) === TRUE) {
			$result = "Success";
		} else {
			$result = "Error";
		}

		print(json_encode($result));
	
?>