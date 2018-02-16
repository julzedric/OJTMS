<?php
	require_once('../../connection.php');

	if($_POST) {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$announcement = $_POST['announcement'];
		$updated_at = date('Y-m-d');
		$start_date =$_POST['date_from'];
		$end_date =$_POST['date_to']; 

		if($end_date < $start_date)
		{
			echo "<script type='text/javascript'> 
	                var conf= confirm(\"Error, End Date is greater than Start Date.\");
	                if(conf == true){
	                    window.location.href = 'http://localhost/ojtms/admin/announcement-list.php';
	                }
	              </script>";
		}
		else
		{
			$sql = "UPDATE ojt_announcements SET title =  '".$title."', announcements = '".$announcement."', updated_at = '".$updated_at."' where id = '".$id."' ";

			if($conn->query($sql) === TRUE) {
				echo "<script type='text/javascript'> 
						var conf= confirm(\"Successfully Updated.\");
						if(conf == true){
							window.location.href = 'http://localhost/ojtms/admin/announcement-list.php';
						}
					</script>";
			} else {
				echo "<script type='text/javascript'> 
						var conf= confirm(\"Error while updating, please try again.\");
						if(conf == true){
							window.location.href = 'http://localhost/ojtms/admin/announcement-list.php';
						}
					</script>";
			}
		}

		$conn->close();
	}
?>