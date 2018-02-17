<?php

require_once('../connection.php');
require_once ('../forgot_password.php');
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 16/02/2018
 * Time: 7:40 PM
 */
$email = $_POST['fgt_email_address'];
$id = $_POST['fgt_student_id'];

$query = mysqli_query($conn, "
           SELECT  `username`,`email`,`student_id`
           FROM ojt_users  
           WHERE email = '".$email."'
           AND student_id = '".$id."'      
    ");
while ($row = mysqli_fetch_assoc($query)){
    $results = $row;
}
if (mysqli_num_rows($query) > 0){
    $randomChar = md5(uniqid(rand(), true));
    $newPassword = substr($randomChar, 0, 8);
    resetPassword($email, $newPassword);

    $query = "
            UPDATE ojt_users
            SET password = '".sha1($newPassword)."'
            WHERE email = '".$email."'";

    if($conn->query($query) === TRUE) {
        echo "<script type='text/javascript'> 
                    var conf= confirm(\"Success! Please check your email to continue.\");
                    if(conf == true){
                        window.location.href = 'http://localhost/ojtms/index.php';
                    }
                  </script>";
    }
    $conn->close();
}else{
    echo "<script type='text/javascript'> 
                    var conf= confirm(\"Email address/Student ID is incorrect please try again.\");
                    if(conf == true){
                        window.location.href = 'http://localhost/ojtms/index.php';
                    }
                  </script>";
}
