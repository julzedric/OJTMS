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
	            $sql1 = "SELECT sum(hours_rendered) as hour FROM ojt_hours_rendered WHERE stud_id = '".$row['student_id']."'";
	            $result1 = $conn->query($sql1);

	            $sql2 = "SELECT a.id, a.total_hours FROM ojt_total_hours a  INNER JOIN ojt_users b ON a.course = b.course WHERE b.student_id ='".$row['student_id']."' ";
                        $result2 = $conn->query($sql2);
                        $total = $result2->fetch_assoc()['total_hours'];

	            while($row1 = $result1->fetch_assoc())
	        	{
		            $button = "<center><button type='button' class='btn btn-info btn-sm' onclick='view_(".$row['user_id']. ")' title='View Profile'><i class='fa fa-pencil'></i></button>
		            			<button type='button' class='btn btn-primary btn-sm' data-uid='".$row['student_id']."'  onclick='view_2(getAttribute(\"data-uid\"))' title='Student&#39;s progress'><i class='fa fa-clock-o'></i></button>
		                        <button type='button' class='btn btn-danger btn-sm' onclick='delete_(" .$row['user_id'].")' title='Remove'><i class='fa fa-trash'></i></button></center>";
		            

                           	     
		            if($row1['hour'] == 0)
		            {
		            	$status = "Not Yet Started";
		            }
		            else
		            {
		            	if($row1['hour'] == $total)
			            {
			            	$status = "Completed";
			            }
			            else
			            {
			            	$status = "Ongoing";
			            }
		            }
		            

		            $data[] = array(
		            	$row['student_id'],
		            	$row['name'],
		            	$row['course'],
		            	$row['email'],
		            	$row1['hour'],
		            	$status,
		            	$button);
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

	/****************FILTER*********************/
	if(isset($_GET['get_student'])){

		$f_course = $_GET['course'];

		$sql = "SELECT user_id, concat(firstname, ' ',IFNULL(middlename,' '),' ',lastname,' ',IFNULL(suffix,' ')) 
	            as name, student_id, course, email FROM ojt_users WHERE is_admin = 0 AND course = '".$f_course."'";
	    $result = $conn->query($sql);

	    if($result->num_rows > 0) {
	        while($row = $result->fetch_assoc())
	        {
	        	$sql1 = "SELECT sum(hours_rendered) as hour FROM ojt_hours_rendered WHERE stud_id = '".$row['student_id']."'";
	            $result1 = $conn->query($sql1);

	            $sql2 = "SELECT a.id, a.total_hours FROM ojt_total_hours A  INNER JOIN ojt_users B ON A.course = B.course WHERE B.STUDENT_ID ='".$row['student_id']."' ";
                        $result2 = $conn->query($sql2);
                        $total = $result2->fetch_assoc()['total_hours'];

	            while($row1 = $result1->fetch_assoc())
	        	{
		            $button = "<center><button type='button' class='btn btn-info btn-sm' onclick='view_(".$row['user_id'].")' title='View Profile'><i class='fa fa-eye'></i></button>
		            			<button type='button' class='btn btn-primary btn-sm' data-uid='".$row['student_id']."'  onclick='view_2(getAttribute(\"data-uid\"))' title='Student&#39;s progress'><i class='fa fa-clock-o'></i></button>
		                        <button type='button' class='btn btn-danger btn-sm' onclick='delete_(".$row['user_id'].")' title='Remove'><i class='fa fa-trash'></i></button></center>";

		            if($row1['hour'] == 0)
		            {
		            	$status = "Not Yet Started";
		            }
		            else
		            {
		            	if($row1['hour'] == $total)
			            {
			            	$status = "Completed";
			            }
			            else
			            {
			            	$status = "Ongoing";
			            }
		            }

		            $data[] = array(
		            	$row['student_id'],
		            	$row['name'],
		            	$row['course'],
		            	$row['email'],
		            	$row1['hour'],
		            	$status,
		            	$button);
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

	/******************load student requirement*********************/
	if(isset($_GET['get_stud_req'])){

		$student_id = $_GET['student_id'];

		// $sql = "
  //             SELECT a.id, a.stud_id, a.is_completed, a.name as filename, b.is_online, a.status, b.id as req_id, b.name 
  //             FROM ojt_student_requirements as a 
  //             RIGHT JOIN ojt_requirements_list as b on a.requirement_id = b.id WHERE b.type = 1";
        $sql = "SELECT * FROM ojt_requirements_list WHERE type = 1";
	    $result = $conn->query($sql);

	    if($result->num_rows > 0) {
	        while($row = $result->fetch_assoc())
	        {
	        	$sql2 = "SELECT * FROM ojt_student_requirements WHERE stud_id = '".$student_id."'";
	        	$result2 = $conn->query($sql2);
	        	print_r($result2->fetch_assoc()); die();
	        	while($row2 = $result2->fetch_assoc())
	       		{
	        	 	$id  = isset($row2['id'])? $row2['id'] : 0;

	        	 	if($row['id'] == $row2['requirement_id']) {
	        	 		$filename = $row2['name'];
	        	 	} else {
	        	 		$filename = '';
	        	 	}

		            if($row2['is_completed'] == 0){
		        	 	if($row['is_online'] == 0 && $row['is_online'] != NULL || $row2['status'] == 2) {
		        	 		$button = "<center><input type='checkbox' onclick='tag_completed(".$id.",".$row['id'].",".$row['is_online'].")' ></center>";
		        	 	} else {
		        	 		$button = "<center><input type='checkbox' onclick='tag_completed(".$id.",".$row['id'].",".$row['is_online'].")' disabled></center>";
		        	 	}
		        	 } else {
		        	 	$button = "<center><input type='checkbox' onclick='tag_completed(".$id.",".$row['id'].",".$row['is_online'].")' checked='true' disabled></center>";
		        	 }

		        	$data[] = array(
		            	$row['name'],
		            	$filename,
		            	$button);
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