<?php
	require_once('../../connection.php');
	
	$sql = "SELECT * FROM ojt_requirements_list WHERE `type` = 1 AND `is_online` = 1 AND `step` = '".$_POST['step']."'";
        $result = $conn->query($sql);

            if($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc())
                {
                  if($_POST) 
                  {

					$name = $_FILES['name'.$row['id']]['name'];
					$created_at = date('Y-m-d');
					$status = 1;
					$student_id = $_SESSION['stud_id'];
					$link = "../../assets/uploads/student_requirements/";
					$filename = str_replace(' ', '_', $name);
					$requirement_id = $_POST['requirement_id'.$row['id']];

					$imageFileType = pathinfo($filename,PATHINFO_EXTENSION);

					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" && $imageFileType != "docx" ) 
					{
					    echo "<script type='text/javascript'> 
								var conf= confirm(\"Sorry, only JPG, JPEG, PNG & PDF files are allowed.\");
								if(conf == true){
									window.location.href = 'http://localhost/ojtms/student/index.php';
								}
							</script>";
					    $uploadOk = 0;
					}else 
					{
						$uploadOk = 1;
					}

					if($uploadOk == 1) 
					{
						if(move_uploaded_file($_FILES['name'.$row['id']]['tmp_name'], $link.$filename))
						 {
							$sql = "INSERT INTO ojt_student_requirements (name,stud_id,created_at,link,status,requirement_id)
							values ('".$name."','".$student_id."','".$created_at."','".$link."','".$status."','".$requirement_id."')";

							if($conn->query($sql) == TRUE) 
							{
								echo "<script type='text/javascript'> 
										var conf= confirm(\"Successfully Created.\");
										if(conf == true){
											window.location.href = 'http://localhost/ojtms/student/index.php';
										}
									</script>";
							}else 
							{
								echo "<script type='text/javascript'> 
										var conf= confirm(\"Error. Please try again.\");
										if(conf == true){
											window.location.href = 'http://localhost/ojtms/student/index.php';
										}
									</script>";
							}
						}else 
						{
							echo "Error";
						}
					}

		
				  }
				}
            }
    $conn->close();
	
?>