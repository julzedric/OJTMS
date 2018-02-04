<?php
/**
 * Created by PhpStorm.
 * User: Jamarin-PC
 * Date: 3 Feb 2018
 * Time: 10:15 PM
 */

require_once('../connection.php');

$query = mysqli_query($conn, "
           SELECT  `username`,`email`,`student_id`
           FROM ojt_users         
    ");
$results = array();
while ($row = mysqli_fetch_assoc($query)){
    $results[] = $row;
}
foreach ($results as $result){
    echo json_encode($result);
}
