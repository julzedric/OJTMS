<?php
	require_once('../../connection.php');

	if(isset($_POST['a_get'])){

		$id = $_POST['id'];
		$sql = "SELECT * from ojt_users where user_id = '".$id."'";
	    $result = $conn->query($sql);

	    while($row = $result->fetch_assoc())
	        {
	        	$data[] = array(
	        		$row['user_id'],
	        		$row['student_id'],
	        		$row['lastname'],
	        		$row['firstname'],
	        		$row['middlename'],
	        		$row['suffix'],
	        		$row['course'],
	        		$row['birthdate'],
	        		$row['gender'],
	        		$row['contact_number'],
	        		$row['email'],
	        		$row['street'],
	        		$row['barangay'],
	        		$row['city'],
	        		$row['province'],
	        		$row['profile_picture']
	        	);
	        }
	        echo json_encode($data);
	}

	if(isset($_GET['loadstudent'])){
		$sql = "SELECT user_id, concat(firstname, ' ',IFNULL(middlename,' '),' ',lastname,' ',IFNULL(suffix,' ')) 
	            as name, student_id, course, email from ojt_users where is_admin = 0";
	    $result = $conn->query($sql);

	    if($result->num_rows > 0) {
	        while($row = $result->fetch_assoc())
	        {
	            $button = "<center><button type='button' class='btn btn-info btn-sm' onclick='view_(".$row['user_id'].")' title='View Profile'><i class='fa fa-eye'></i></button>
	                        <button type='button' class='btn btn-success btn-sm' title='Send Message'><i class='fa fa-envelope'></i></button>
	                        <button type='button' class='btn btn-danger btn-sm' onclick='delete_(".$row['user_id'].")' title='Remove'><i class='fa fa-trash'></i></button></center>";

	            $data[] = array(
	            	$row['student_id'],
	            	$row['name'],
	            	$row['course'],
	            	$row['email'],
	            	$button);
	        }
	    } else {
	    	$data = array();
	    }

	    	$response = array(
			  'aaData' => $data,
			  'iTotalRecords' => count($data),
			  'iTotalDisplayRecords' => count($data),
			  'iDisplayStart' => 0
			);

			header("Content-Type: application/json", true);
			echo json_encode($response);
	}

	if(isset($_GET['get_student'])){

		$f_course = $_GET['course'];

		$sql = "SELECT user_id, concat(firstname, ' ',IFNULL(middlename,' '),' ',lastname,' ',IFNULL(suffix,' ')) 
	            as name, student_id, course, email FROM ojt_users WHERE is_admin = 0 AND course = '".$f_course."'";
	    $result = $conn->query($sql);

	    if($result->num_rows > 0) {
	        while($row = $result->fetch_assoc())
	        {
	            $button = "<center><button type='button' class='btn btn-info btn-sm' onclick='view_(".$row['user_id'].")' title='View Profile'><i class='fa fa-eye'></i></button>
	                        <button type='button' class='btn btn-success btn-sm' title='Send Message'><i class='fa fa-envelope'></i></button>
	                        <button type='button' class='btn btn-danger btn-sm' onclick='delete_(".$row['user_id'].")' title='Remove'><i class='fa fa-trash'></i></button></center>";

	            $data[] = array(
	            	$row['student_id'],
	            	$row['name'],
	            	$row['course'],
	            	$row['email'],
	            	$button);
	        }
	    } else {
	    	$data = array();
	    }

	    	$response = array(
			  'aaData' => $data,
			  'iTotalRecords' => count($data),
			  'iTotalDisplayRecords' => count($data),
			  'iDisplayStart' => 0
			);

			header("Content-Type: application/json", true);
			echo json_encode($response);
	}

?>