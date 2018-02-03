<?php
	require_once('../../connection.php');

	if($_POST) {
		$title = $_POST['title'];
		$announcement = $_POST['announcement'];
		$created_at = date('Y-m-d');

		$sql = "INSERT INTO ojt_announcements (title,announcements,created_at)
		values ('".$title."','".$announcement."','".$created_at."')";

		if($conn->query($sql) == TRUE) {
			echo "<script type='text/javascript'> 
                    var conf= confirm(\"Successfully Created.\");
                    if(conf == true){
                        window.location.href = 'http://localhost/ojtms/admin/announcement-list.php';
                    }
                  </script>";
		} else {
            echo "<script type='text/javascript'> 
                    var conf= confirm(\"Error. Please try again.\");
                    if(conf == true){
                        window.location.href = 'http://localhost/ojtms/admin/announcement-list.php';
                    }
                  </script>";
		}

		$conn->close();
	}