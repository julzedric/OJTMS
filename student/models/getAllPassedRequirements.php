<?php
    require_once ('../../connection.php');
/**
 * Created by PhpStorm.
 * User: Jhulie
 * Date: 20/02/2018
 * Time: 2:32 PM
 */
    $id = $_GET['id'];
    $sql = " SELECT * FROM ojt_student_requirements WHERE stud_id = '".$id."' ";
    $result = $conn->query($sql);
    $data = array();

    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $items = array();
        foreach ($data as $item){
            $items[] =  $item;
        }

        echo json_encode($items);
}