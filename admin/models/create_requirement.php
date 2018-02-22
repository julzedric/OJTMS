<?php
	require_once('../../connection.php');

	if($_POST) {
		$name = $_POST['name'] == 'Others'? $_POST['others']: $_POST['name'];
		$created_at = date('Y-m-d');
		$description = $_POST['description'];
		$type = $_POST['type'];
		$step = isset($_POST['step'])? $_POST['step'] : '';
		$is_online = isset($_POST['mode'])? $_POST['mode'] : '';

		$target_dir = "../../assets/uploads/requirements/";
		$file = $_FILES['file']['name'];
		
		$r = rand(0,50000);
		$imageFileType = pathinfo($file,PATHINFO_EXTENSION);
		$filename = str_replace(' ', '_', $name.'_'.$r.'.'.$imageFileType);

		// Allow certain file formats
		$imageFileType = strtolower($imageFileType);
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" && $imageFileType != "docx" && $imageFileType != "xlsx" && $imageFileType != "" ) {
		    echo "<script type='text/javascript'> 
					var conf= confirm(\"Sorry, only JPG, JPEG, PNG, PDF, DOCX, XLSX files are allowed.\");
					if(conf == true){
						window.location.href = 'http://ojtms.x10host.com/admin/requirements.php';
					}
				</script>";
		    $uploadOk = 0;
		} else {
			$uploadOk = 1;
		}

		// Check file size
		if ($_FILES["file"]["size"] > 5000000) {
		    echo "<script type='text/javascript'> 
					var conf= confirm(\"Sorry, your file is too large. File limit is 5mb.\");
					if(conf == true){
						window.location.href = 'http://ojtms.x10host.com/admin/requirements.php';
					}
				</script>";
		    $uploadOk = 0;
		} else {
			$uploadOk = 1;
		}

		if($uploadOk == 1) {
			if($file == '') {
				$sql = "INSERT INTO ojt_requirements_list (name,description,created_at,type,step,is_online)
				values ('".$name."','".$description."','".$created_at."','".$type."','".$step."','".$is_online."')";

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
			} else {
				if(move_uploaded_file($_FILES['file']['tmp_name'], $target_dir.$filename)) {
					if($type == 0)
					{
						$sql = "INSERT INTO ojt_requirements_list (name,file,description,created_at)
						values ('".$name."','".$filename."','".$description."','".$created_at."')";

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
					} else {
						$sql = "INSERT INTO ojt_requirements_list (name,file,description,created_at,type,step,is_online)
						values ('".$name."','".$filename."','".$description."','".$created_at."','".$type."','".$step."','".$is_online."')";

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
					}
				} else {
					echo "<script type='text/javascript'> 
						var conf= confirm(\"Error. Please try again.\");
						if(conf == true){
							window.location.href = 'http://ojtms.x10host.com/admin/requirements.php';
						}
					</script>";
				}

			}
			
		}
		
		$conn->close();
	}
?>