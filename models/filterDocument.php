<?php
/**
 * Created by PhpStorm.
 * User: Julius
 * Date: 21/02/2018
 * Time: 10:12 PM
 */
require_once ('../connection.php');
$date_from = date("Y-m-d", strtotime($_GET['from']) );
$date_to = date("Y-m-d", strtotime($_GET['to']) );

$sql = "SELECT a.*, b.firstname, b.lastname, c.name AS document_type
            FROM ojt_student_requirements AS a
            JOIN ojt_users AS b
            ON a.stud_id = b.student_id
            JOIN ojt_requirements_list as c 
            ON a.requirement_id = c.id
            WHERE a.created_at >= '{$date_from}'
            AND a.created_at <= '{$date_to}'
            ";
$result = $conn->query($sql);
$data = array();

if($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
echo json_encode($data);