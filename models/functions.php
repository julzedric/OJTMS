<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 10/02/2018
 * Time: 12:00 AM
 */

function getStudentsByID($conn, $stud_id){
    $sql = "SELECT * FROM ojt_users WHERE student_id = '".$stud_id."' ";
    $result = $conn->query($sql);
    $data = array();

    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data = $row;
        }
    }
    return $data;
}
function getDocumentRequest($conn){
    $sql = "SELECT a.*, b.firstname, b.lastname, c.name AS document_type
            FROM ojt_student_requirements AS a
            JOIN ojt_users AS b
            ON a.stud_id = b.student_id
            JOIN ojt_requirements_list as c 
            ON a.requirement_id = c.id
            WHERE a.status = 1
            ";
    $result = $conn->query($sql);
    $data = array();

    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}


function getHoursRendered($conn){
    $sql = "
            SELECT a.*, b.firstname, b.lastname, b.course
            FROM ojt_hours_rendered as a
            JOIN ojt_users as b
            ON a.stud_id = b.student_id
            ";
    $result = $conn->query($sql);
    $data = array();

    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}
function getRecommendationLetter($conn){
    $sql = "
            SELECT a.* , b.*
            FROM ojt_student_recommendation AS a 
            JOIN ojt_users as b
            ON a.stud_id = b.student_id
           ";
    $result = $conn->query($sql);
    $data = array();

    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}