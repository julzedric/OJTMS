<?php
	require_once('../../connection.php');

	if($_POST) {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$announcement = $_POST['announcement'];
		$updated_at = date('Y-m-d');

		$sql = "INSERT INTO ojt_announcements (title,announcements,created_at)
		values ('".$title."','".$announcement."','".$created_at."')";

		$sql = "UPDATE ojt_announcements SET title =  '".$title."', announcements = '".$announcement."', updated_at = '".$updated_at."' where id = '".$id."' ";

		if($conn->query($sql) === TRUE) {
			echo "<script type='text/javascript'>alert('Successfully Updated.');</script>";
			header("Location: ../announcement-list.php");
		} else {
			echo "<script type='text/javascript'>alert('Error while uplaoding record.');</script>";
			header("Location: ../announcement-list.php");
		}

		$conn->close();
	}
?>