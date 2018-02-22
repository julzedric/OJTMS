<?php
	require_once('../../connection.php');

	if($_POST) {
		$id = $_POST['id'];
        $name = $_POST['name'] == 'Others'? $_POST['others']: $_POST['name'];
        $description = $_POST['description'];
		$type = $_POST['type'];
		$step = isset($_POST['step'])? $_POST['step'] : '';
		$is_online = isset($_POST['mode'])? $_POST['mode'] : '';
		$updated_at = date('Y-m-d');

		$target_dir = "../../assets/uploads/requirements/";
		$file = $_FILES['file']['name'];

		$r = rand(0,50000);
		$imageFileType = pathinfo($file,PATHINFO_EXTENSION);
		$filename = str_replace(' ', '_', $name.'.'.$imageFileType);

		$uploadOk = 1;

		if ($file == '') {
			$sql = "UPDATE ojt_requirements_list SET name =  '".$name."', 
					description = '".$description."', type = '".$type."', is_online = '".$is_online."',
					updated_at = '".$updated_at."' where id = '".$id."' ";

				if($conn->query($sql) === TRUE) {
					echo "<script type='text/javascript'> 
							var conf= confirm(\"Successfully Updated.\");
							if(conf == true){
								window.location.href = 'http://ojtms.x10host.com/admin/requirements.php';
							}
						</script>";
				}
				$conn->close();
				exit;
		}
		// Allow certain file formats
		$imageFileType = strtolower($imageFileType);
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" && $imageFileType != "docx" && $imageFileType != "xlsx") {
			echo "<script type='text/javascript'> 
					var conf= confirm(\"Sorry, only JPG, JPEG, PNG, PDF, DOCX, XLSX files are allowed.\");
					if(conf == true){
						window.location.href = 'http://ojtms.x10host.com/admin/edit_requirement.php?id=".$id."';
					}
				</script>";
		    $uploadOk = 0;
			}

		if($uploadOk == 1) {
			if(move_uploaded_file($_FILES['file']['tmp_name'], $target_dir.$filename)) {
				
					$sql = "UPDATE ojt_requirements_list SET name =  '".$name."', 
					description = '".$description."', file = '".$filename."', type = '".$type."', is_online = '".$is_online."',
					updated_at = '".$updated_at."' where id = '".$id."' ";

				if($conn->query($sql) === TRUE) {
					echo "<script type='text/javascript'> 
							var conf= confirm(\"Successfully Updated.\");
							if(conf == true){
								window.location.href = 'http://ojtms.x10host.com/admin/requirements.php';
							}
						</script>";
				} else {
					echo "<script type='text/javascript'> 
							var conf= confirm(\"Error while updating, please try again.\");
							if(conf == true){
								window.location.href = 'http://ojtms.x10host.com/admin/requirements.php';
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