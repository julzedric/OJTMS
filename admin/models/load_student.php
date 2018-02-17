<?php
	require_once('../../connection.php');


	/***************get specific student****************/
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

	/***************load student****************/
	if(isset($_GET['loadstudent'])){
		$sql = "SELECT user_id, concat(firstname, ' ',IFNULL(middlename,' '),' ',lastname,' ',IFNULL(suffix,' ')) 
	            as name, student_id, course, email from ojt_users where is_admin = 0";
	    $result = $conn->query($sql);

	    if($result->num_rows > 0) {
	        while($row = $result->fetch_assoc())
	        {
	            $button = "<center><button type='button' class='btn btn-info btn-sm' onclick='view_(".$row['user_id']. ")' title='View Profile'><i class='fa fa-eye'></i></button>
	            			<button type='button' class='btn btn-primary btn-sm' data-uid='".$row['student_id']."'  onclick='view_2(getAttribute(\"data-uid\"))' title='Student&#39;s progress'><i class='fa fa-clock-o'></i></button>
	                        <button type='button' class='btn btn-danger btn-sm' onclick='delete_(" .$row['user_id'].")' title='Remove'><i class='fa fa-trash'></i></button></center>";

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

	/****************FILTER*********************/
	if(isset($_GET['get_student'])){

		$f_course = $_GET['course'];

		$sql = "SELECT user_id, concat(firstname, ' ',IFNULL(middlename,' '),' ',lastname,' ',IFNULL(suffix,' ')) 
	            as name, student_id, course, email FROM ojt_users WHERE is_admin = 0 AND course = '".$f_course."'";
	    $result = $conn->query($sql);

	    if($result->num_rows > 0) {
	        while($row = $result->fetch_assoc())
	        {
	            $button = "<center><button type='button' class='btn btn-info btn-sm' onclick='view_(".$row['user_id'].")' title='View Profile'><i class='fa fa-eye'></i></button>
	            			<button type='button' class='btn btn-primary btn-sm' data-uid='".$row['student_id']."'  onclick='view_2(getAttribute(\"data-uid\"))' title='Student&#39;s progress'><i class='fa fa-clock-o'></i></button>
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

	/******************load student requirement*********************/
	if(isset($_GET['get_stud_req'])){

		$student_id = $_GET['student_id'];

		$sql = "
              SELECT a.id, a.stud_id, a.is_completed, a.name as filename, b.is_online, a.status, b.id as req_id, b.name 
              FROM ojt_student_requirements as a 
              RIGHT JOIN ojt_requirements_list as b on a.requirement_id = b.id";
	    $result = $conn->query($sql);

	    if($result->num_rows > 0) {
	        while($row = $result->fetch_assoc())
	        {
	        	
	        	 if(is_null($row['stud_id']) ||$row['stud_id'] == $student_id)
	        	 {

	        	 	$id  = isset($row['id'])? $row['id'] : 0;
		            if($row['is_completed'] == 0){
		        	 	if($row['is_online'] == 0 && $row['is_online'] != NULL || $row['status'] == 2) {
		        	 		$button = "<center><input type='checkbox' onclick='tag_completed(".$id.",".$row['req_id'].",".$row['is_online'].")' ></center>";
		        	 	} else {
		        	 		$button = "<center><input type='checkbox' onclick='tag_completed(".$id.",".$row['req_id'].",".$row['is_online'].")' disabled></center>";
		        	 	}
		        	 } else {
		        	 	$button = "<center><input type='checkbox' onclick='tag_completed(".$id.",".$row['req_id'].",".$row['is_online'].")' checked='true'></center>";
		        	 }

		            $data[] = array(
		            	$row['name'],
		            	$row['filename'],
		            	$button);
		         } 
		         else {
		        	$data = array();
		        }
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