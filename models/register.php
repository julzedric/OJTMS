<?php
require_once('../connection.php');

if($_POST) {
    $error = [];
    $student_id = $_POST['student_id'];
    $course = $_POST['course'];
    $username = $_POST['username'];
    $password = $_POST['reg-pword'];
    $lastname = $_POST['regcon-pword'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $suffix = $_POST['suffix'];
    $email = $_POST['email'];
    $birthdate = date('Y-m-d');
    $gender = $_POST['gender'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $created_at = date('Y-m-d');

    $query = mysqli_query($conn, "
           SELECT  `username`,`email`,`student_id`
           FROM ojt_users         
    ");
    $results = array();
    while ($row = mysqli_fetch_assoc($query)){
        $results[] = $row;
    }
    foreach ($results as $result){
        if ($result['username'] == $username){
            echo json_encode('username Already taken');
            exit;
        }
    }
    $sql = "INSERT INTO ojt_users (student_id,course,semester,username,password,lastname,firstname,middlename,suffix,email,birthdate,gender,street,barangay,city,province,created_at)
		values ('".$student_id."','".$course."','".$semester."','".$username."','".$password."','".$lastname."','".$firstname."','".$middlename."','".$suffix."','".$email."','".$birthdate."','".$gender."','".$street."','".$barangay."','".$city."','".$province."','".$created_at."')";

    if($conn->query($sql) == TRUE) {
        echo "<script type='text/javascript'>alert('New Record successfully created.');</script>";
        header("Location: ../index.php");
    } else {
        echo "<script type='text/javascript'>alert('Error. Please try again.');</script>";
        header("Location: ../index.php");
    }

    $conn->close();
}
