<?php
/**
 * Created by PhpStorm.
 * User: Jhulie-PC
 * Date: 21 Feb 2018
 * Time: 9:00 PM
 *admin>models
 */
require_once('../../connection.php');

if($_GET) {
    $id = $_GET['id'];
    $date = date('Y-m-d');

    $query = "
            UPDATE ojt_announcements
            SET deleted_at = '".$date."'
            WHERE id = '".$id."'";

    if($conn->query($query) === TRUE) {
        echo "<script type='text/javascript'> 
							var conf= confirm(\"Success!\");
							if(conf == true){
								window.location.href = 'http://localhost/ojtms/admin/announcement-list.php';
							}
						</script>";
    }
    $conn->close();

}