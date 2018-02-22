<?php
	require_once('../../connection.php');

	if($_POST) {
		$stud_id = $_SESSION['stud_id'];
		$company_name = $_POST['company_name'];
		$company_address = $_POST['company_address'];
		$supervisor_name =$_POST['supervisor_name'];
		$supervisor_position =$_POST['supervisor_position'];
		$supervisor_contact = $_POST['supervisor_contact'];
		$status = 0; 
		$created_at = date('Y-m-d');

			$sql = "INSERT INTO ojt_student_recommendation ( stud_id,company_name,company_address,supervisor_name,supervisor_position, supervisor_contact,status,created_at)
			values ('".$stud_id."','".$company_name."','".$company_address."','".$supervisor_name."','".$supervisor_position."','".$supervisor_contact."','".$status."','".$created_at."')";

			if($conn->query($sql) == TRUE) {
				echo "<script type='text/javascript'> 
	                    var conf= confirm(\"Successfully Created.\");
	                    if(conf == true){
	                        window.location.href = 'http://ojtms.x10host.com/student/index.php';
	                    }
	                  </script>";
			} else {
	            echo "<script type='text/javascript'> 
	                    var conf= confirm(\"Error. Please try again.\");
	                    if(conf == true){
	                        window.location.href = 'http://ojtms.x10host.com/student/index.php';
	                    }
	                  </script>";
			}

	$conn->close();
	}