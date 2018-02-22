<?php
	require_once('../../connection.php');

	if($_POST) {
		$sy = array($_POST['school_year_1'],$_POST['school_year_2']);
		$school_year = implode(" - ", $sy);
		$semester = $_POST['semester'];
		$course = $_POST['course'];
		$total_hours = $_POST['total_hours'];
		$created_at = date('Y-m-d');

			$sql = "INSERT INTO ojt_total_hours (school_year,semester,course,total_hours,created_at)
			values ('".$school_year."','".$semester."','".$course."','".$total_hours."','".$created_at."')";

			if($conn->query($sql) == TRUE) {
				echo "<script type='text/javascript'> 
	                    var conf= confirm(\"Successfully Created.\");
	                    if(conf == true){
	                        window.location.href = 'http://ojtms.x10host.com/admin/requirements.php';
	                    }
	                  </script>";
			} else {
	            echo "<script type='text/javascript'> 
	                    var conf= confirm(\"Error. Please try again.\");
	                    if(conf == true){
	                        window.location.href = 'http://ojtms.x10host.com/admin/requirements.php';
	                    }
	                  </script>";
			}

	$conn->close();
	}