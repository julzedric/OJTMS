<?php
	require_once('../../connection.php');

	if($_POST) {
		$id = $_POST['id'];

		$sql = "DELETE FROM ojt_users WHERE user_id = '".$id."'";

		if($conn->query($sql) === TRUE) {
			$result = "Success";
		} else {
			$result = "Error";
		}

		print(json_encode($result));

		// $conn->close();
	}
?>