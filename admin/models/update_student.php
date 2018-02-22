<?php
	require_once('../../connection.php');
    include('../../models/functions.php');

	if($_POST) 
	{

        $student = $_POST['student_id'];
		$email = $_POST['email'];
		$contact_number = $_POST['contact_number'];
		$street = $_POST['street'];
		$barangay = $_POST['barangay'];
		$city = $_POST['city'];
		$province = $_POST['province'];
		$updated_at = date('Y-m-d');	
		$target_dir = "../../assets/uploads/profile_picture/";
		$file = $_FILES['profile_pic']['name'];

		$filename = str_replace(' ', '_', $file);

		$imageFileType = pathinfo($filename,PATHINFO_EXTENSION);
		$uploadOk = 1;


				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" ) 
				{
					echo "<script type='text/javascript'> 
							var conf= confirm(\"Sorry, only JPG, JPEG, PNG, PDF files are allowed.\");
							if(conf == true){
								window.location.href = 'http://ojtms.x10host.com/admin/index.php';
							}
						</script>";
				    $uploadOk = 0;
				}

				if($uploadOk == 1) 
				{
					if(move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_dir.$filename)) 
					{
						$sql = "UPDATE ojt_users SET email =  '".$email."', 
								password = '".$password."', profile_picture =  '".$file."',
								contact_number = '".$contact_number."', street = '".$street."', barangay = '".$barangay."', city = '".$city."', province = '".$province."',
								updated_at = '".$updated_at."' where student_id = '".$student."' ";

						if($conn->query($sql) === TRUE) 
						{
							echo "<script type='text/javascript'> 
									var conf= confirm(\"Successfully Updated.\");
									if(conf == true){
										window.location.href = 'http://ojtms.x10host.com/admin/index.php';
									}
								</script>";
						} 
						else 
						{
							echo "<script type='text/javascript'> 
									var conf= confirm(\"Error while updating, please try again.\");
									if(conf == true){
										window.location.href = 'http://ojtms.x10host.com/admin/index.php';
									}
								</script>";
						}
					} 
					else 
					{
						echo "Error";
					}
				}
		$conn->close();
	}
?>