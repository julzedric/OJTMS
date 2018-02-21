<?php
/**
 * Created by PhpStorm.
 * User: Julius
 * Date: 20/02/2018
 * Time: 7:47 PM
 */
require_once('../connection.php');

if($_GET) {
    $id = $_GET['id'];

    $query = "
            UPDATE ojt_student_requirements
            SET status = 3,
            is_completed = 0
            WHERE id = '".$id."'";

    if($conn->query($query) === TRUE) {
        echo "<script type='text/javascript'> 
							var conf= confirm(\"Success!\");
							if(conf == true){
								window.location.href = 'http://localhost/ojtms/admin/document-request.php';
							}
						</script>";
    }
    $conn->close();

}