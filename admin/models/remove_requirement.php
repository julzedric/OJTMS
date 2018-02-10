<?php
	require_once('../../connection.php');

	if($_GET) {
		$id = $_GET['id'];

			$sql = "DELETE FROM ojt_requirements_list WHERE id = '".$id."'";

			if($conn->query($sql) === TRUE) {
				echo "<script type='text/javascript'> 
						var conf= confirm(\"Successfully Remove.\");
						if(conf == true){
							window.location.href = 'http://localhost/ojtms/admin/step-requirement.php';
						}
					</script>";
			} else {
				echo "<script type='text/javascript'> 
						var conf= confirm(\"Error deleting record.\");
						if(conf == true){
							window.location.href = 'http://localhost/ojtms/admin/step-requirement.php';
						}
					</script>";
			}

		$conn->close();
	}
?>