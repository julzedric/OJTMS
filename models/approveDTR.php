<?php
/**
 * Created by PhpStorm.
 * User: Jamarin-PC
 * Date: 16 Feb 2018
 * Time: 7:50 PM
 */
require_once('../connection.php');

if($_GET) {
    $id = $_GET['id'];

    $query = "
            UPDATE ojt_hours_rendered
            SET status = 1
            WHERE id = '".$id."'";

    if($conn->query($query) === TRUE) {
        echo "<script type='text/javascript'> 
							var conf= confirm(\"Success!\");
							if(conf == true){
								window.location.href = 'http://localhost/ojtms/admin/hours_rendered.php';
							}
						</script>";
    }
    $conn->close();

}