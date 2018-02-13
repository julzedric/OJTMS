<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 10/02/2018
 * Time: 12:00 AM
 */

function getQuery(){

}
function getDocumentRequest($conn){
    $sql = "SELECT a.*, b.firstname, b.lastname
            FROM ojt_student_requirements AS a
            JOIN ojt_users AS b
            ON a.stud_id = b.student_id";
    $result = $conn->query($sql);
    $data = array();

    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}