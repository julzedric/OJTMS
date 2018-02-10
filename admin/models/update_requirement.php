<?php
	require_once('../../connection.php');

	if($_POST) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$description = $_POST['description'];
		$type = $_POST['type'];
		$updated_at = date('Y-m-d');

		$target_dir = "../../assets/uploads/requirements/";
		$file = $_FILES['file']['name'];
		$filename = str_replace(' ', '_', $file);

		$imageFileType = pathinfo($filename,PATHINFO_EXTENSION);

		$uploadOk = 1;

		if ($file == '') {
			$sql = "UPDATE ojt_requirements_list SET name =  '".$name."', 
					description = '".$description."', type = '".$type."',
					updated_at = '".$updated_at."' where id = '".$id."' ";

				if($conn->query($sql) === TRUE) {
					echo "<script type='text/javascript'> 
							var conf= confirm(\"Successfully Updated.\");
							if(conf == true){
								window.location.href = 'http://localhost/ojtms/admin/requirements.php';
							}
						</script>";
				}
				$conn->close();
				exit;

		}
		// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" ) {
			echo "<script type='text/javascript'> 
					var conf= confirm(\"Sorry, only JPG, JPEG, PNG, PDF files are allowed.\");
					if(conf == true){
						window.location.href = 'http://localhost/ojtms/admin/edit_requirement.php?id=".$id."';
					}
				</script>";
		    $uploadOk = 0;
			}

		if($uploadOk == 1) {
			if(move_uploaded_file($_FILES['file']['tmp_name'], $target_dir.$filename)) {
				
					$sql = "UPDATE ojt_requirements_list SET name =  '".$name."', 
					description = '".$description."', file = '".$filename."', type = '".$type."',
					updated_at = '".$updated_at."' where id = '".$id."' ";

				if($conn->query($sql) === TRUE) {
					echo "<script type='text/javascript'> 
							var conf= confirm(\"Successfully Updated.\");
							if(conf == true){
								window.location.href = 'http://localhost/ojtms/admin/requirements.php';
							}
						</script>";
				} else {
					echo "<script type='text/javascript'> 
							var conf= confirm(\"Error while updating, please try again.\");
							if(conf == true){
								window.location.href = 'http://localhost/ojtms/admin/requirements.php';
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