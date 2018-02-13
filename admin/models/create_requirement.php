<?php
	require_once('../../connection.php');

	if($_POST) {
		$name = $_POST['name'];
		$created_at = date('Y-m-d');
		$description = $_POST['description'];
		$type = $_POST['type'];
		$step = $_POST['step'];
		$is_online = $_POST['mode'];

		$target_dir = "../../assets/uploads/requirements/";
		$file = $_FILES['file']['name'];
		$filename = str_replace(' ', '_', $file);

		$imageFileType = pathinfo($filename,PATHINFO_EXTENSION);

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" && $imageFileType != "" ) {
		    echo "<script type='text/javascript'> 
					var conf= confirm(\"Sorry, only JPG, JPEG, PNG & PDF files are allowed.\");
					if(conf == true){
						window.location.href = 'http://localhost/ojtms/admin/requirements.php';
					}
				</script>";
		    $uploadOk = 0;
		} else {
			$uploadOk = 1;
		}

		if($uploadOk == 1) {
			if($filename == '') {
				$sql = "INSERT INTO ojt_requirements_list (name,description,created_at,type,step,is_online)
				values ('".$name."','".$description."','".$created_at."','".$type."','".$step."','".$is_online."')";

				if($conn->query($sql) == TRUE) {
					echo "<script type='text/javascript'> 
							var conf= confirm(\"Successfully Created.\");
							if(conf == true){
								window.location.href = 'http://localhost/ojtms/admin/requirements.php';
							}
						</script>";
				} else {
					echo "<script type='text/javascript'> 
							var conf= confirm(\"Error. Please try again.\");
							if(conf == true){
								window.location.href = 'http://localhost/ojtms/admin/requirements.php';
							}
						</script>";
				}
			} else {
				if(move_uploaded_file($_FILES['file']['tmp_name'], $target_dir.$filename)) {
					$sql = "INSERT INTO ojt_requirements_list (name,file,description,created_at,type,step)
					values ('".$name."','".$filename."','".$description."','".$created_at."','".$type."','".$step."')";

					if($conn->query($sql) == TRUE) {
						echo "<script type='text/javascript'> 
								var conf= confirm(\"Successfully Created.\");
								if(conf == true){
									window.location.href = 'http://localhost/ojtms/admin/requirements.php';
								}
							</script>";
					} else {
						echo "<script type='text/javascript'> 
								var conf= confirm(\"Error. Please try again.\");
								if(conf == true){
									window.location.href = 'http://localhost/ojtms/admin/requirements.php';
								}
							</script>";
					}
				} else {
					echo "Error";
				}

			}
			
		}
		
		$conn->close();
	}
?>