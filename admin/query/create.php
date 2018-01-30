<?php
	require_once('../../connection.php');

	if($_POST) {
		$title = $_POST['title'];
		$announcement = $_POST['announcement'];
		$created_at = date('Y-m-d');

		$sql = "INSERT INTO ojt_announcements (title,announcements,created_at)
		values ('".$title."','".$announcement."','".$created_at."')";

		if($conn->query($sql) == TRUE) {
			echo "<script type='text/javascript'>alert('New Record successfully created.');</script>";
			header("Location: ../announcement-list.php");
		} else {
			echo "<script type='text/javascript'>alert('Error. Please try again.');</script>";
			header("Location: ../announcement-list.php");
		}

		$conn->close();
	}
?>