<?php
require_once('../connection.php');

if($_GET) {
    $id = $_GET['id'];

    $sql = "DELETE FROM ojt_hours_rendered WHERE id = '".$id."'";


    if($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('Successfully removed.');</script>";
        header("Location: ../admin/hours_rendered.php");
    } else {
        echo "<script type='text/javascript'>alert('Error deleting record.');</script>";
        header("Location: ../admin/hours_rendered.php");
    }

    $conn->close();
}
?>