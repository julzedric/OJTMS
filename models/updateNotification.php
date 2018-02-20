<?php
/**
 * Created by PhpStorm.
 * User: Julius
 * Date: 20/02/2018
 * Time: 10:44 PM
 */
require_once('../connection.php');

if($_GET) {
    $id = $_GET['id'];
    $query = "
            UPDATE ojt_student_requirements
            SET flag = 1
            WHERE id = '".$id."'";

    $conn->query($query);
    $conn->close();

}