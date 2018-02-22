<?php
	require_once('../../connection.php');

	if($_POST) {
		$hours_rendered = $_POST['hours_rendered'];
		$created_at = date('Y-m-d');
		$stud_id = $_SESSION['stud_id'];
		$status = 0;

		$target_dir = "../../assets/uploads/dtr/";
		$file = $_FILES['attachment']['name'];
		$filename = str_replace(' ', '_', $file);

		$imageFileType = pathinfo($filename,PATHINFO_EXTENSION);

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" && $imageFileType != "" ) {
		    echo "<script type='text/javascript'> 
					var conf= confirm(\"Sorry, only JPG, JPEG, PNG & PDF files are allowed.\");
					if(conf == true){
						window.location.href = 'http://ojtms.x10host.com/student/profile.php';
					}
				</script>";
		    $uploadOk = 0;
		} else {
			$uploadOk = 1;
		}

		if($uploadOk == 1) {
				if(move_uploaded_file($_FILES['attachment']['tmp_name'], $target_dir.$filename)) {
					$sql = "INSERT INTO ojt_hours_rendered (hours_rendered,dtr,status,stud_id,created_at)
					values ('".$hours_rendered."','".$file."','".$status."','".$stud_id."','".$created_at."')";

					if($conn->query($sql) == TRUE) {
						echo "<script type='text/javascript'> 
								var conf= confirm(\"Successfully Created.\");
								if(conf == true){
									window.location.href = 'http://ojtms.x10host.com/student/profile.php';
								}
							</script>";
					} else {
						echo "<script type='text/javascript'> 
								var conf= confirm(\"Error. Please try again.\");
								if(conf == true){
									window.location.href = 'http://ojtms.x10host.com/student/profile.php';
								}
							</script>";
					}
				} else {
					echo "Error";
				}

			
			
		}
		
		$conn->close();
	}
?>