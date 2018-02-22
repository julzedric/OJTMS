<?php
/**
 * Created by PhpStorm.
 * User: Julius-PC
 * Date: 16 Feb 2018
 * Time: 7:50 PM
 */
require_once('../connection.php');
include ('../notifyStudentViaEmail.php');

if($_GET) {
    $id = $_GET['id'];
    $sql = "
            SELECT a.stud_id , b.*
            FROM ojt_student_recommendation AS a 
            JOIN ojt_users as b
            ON a.stud_id = b.student_id
            WHERE id = '".$id."'
           ";
    $result = $conn->query($sql);
    $data = array();
    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data = $row;
        }
    }
    $query = "
            UPDATE ojt_student_recommendation
            SET status = 1
            WHERE id = '".$id."'";

    if($conn->query($query) === TRUE) {
        echo "<script type='text/javascript'> 
							var conf= confirm(\"Success!\");
							if(conf == true){
								window.location.href = 'http://ojtms.x10host.com/admin/notifyStudent.php';
							}
						</script>";
        sendNotification($data['email'], $data['username']);
    }
    $conn->close();

}