<?php
	require_once('../../connection.php');

	if($_POST) {
		$title = $_POST['title'];
		$announcement = $_POST['announcement'];
		$created_at = date('Y-m-d');
		$start_date = date('Y-m-d', strtotime($_POST['date_from']));
		$end_date = date('Y-m-d', strtotime($_POST['date_to']));

		if($end_date < $start_date)
		{
			echo "<script type='text/javascript'> 
	                var conf= confirm(\"Error, End Date is greater than Start Date.\");
	                if(conf == true){
	                    window.location.href = 'http://ojtms.x10host.com/admin/announcement-list.php';
	                }
	              </script>";
		}
		else
		{
			$sql = "INSERT INTO ojt_announcements (title,announcements,created_at,start_date, end_date)
			values ('".$title."','".$announcement."','".$created_at."','".$start_date."','".$end_date."')";

			if($conn->query($sql) == TRUE) {
				echo "<script type='text/javascript'> 
	                    var conf= confirm(\"Successfully Created.\");
	                    if(conf == true){
	                        window.location.href = 'http://ojtms.x10host.com/admin/announcement-list.php';
	                    }
	                  </script>";
			} else {
	            echo "<script type='text/javascript'> 
	                    var conf= confirm(\"Error. Please try again.\");
	                    if(conf == true){
	                        window.location.href = 'http://ojtms.x10host.com/admin/announcement-list.php';
	                    }
	                  </script>";
			}
		}

	$conn->close();
	}