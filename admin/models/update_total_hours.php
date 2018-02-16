<?php
	require_once('../../connection.php');

	if($_POST) {
		$id	=  $_POST['id'];
		$school_year = $_POST['school_year'];
		$semester = $_POST['semester'];
		$course = $_POST['course'];
		$total_hours = $_POST['total_hours'];
		$updated_at = date('Y-m-d');

			$sql = "UPDATE ojt_total_hours SET school_year =  '".$school_year."', semester = '".$semester."',  course = '".$course."', total_hours = '".$total_hours."', updated_at = '".$updated_at."' where id = '".$id."' ";

			if($conn->query($sql) === TRUE) {
				echo "<script type='text/javascript'> 
						var conf= confirm(\"Successfully Updated.\");
						if(conf == true){
							window.location.href = 'http://localhost/ojtms/admin/requirements.php';
						}
					</script>";
			} else {
				echo "<script type='text/javascript'> 
						var conf= confirm(\"Error while updating, please try again.\");
						if(conf == true){
							window.location.href = 'http://localhost/ojtms/admin/requirements.php';
						}
					</script>";
			}

		$conn->close();
	}
?>