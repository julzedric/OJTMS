<?php
/**
 * Created by PhpStorm.
 * User: Jamarin-PC
 * Date: 3 Feb 2018
 * Time: 4:48 PM
 */

require_once '../connection.php';

$error = '';


    $username = $_POST['uname'];
    $password = sha1($_POST['password']);

    $query = mysqli_query($conn, "
           SELECT * 
           FROM ojt_users
           WHERE username = '".$username."'
           AND password = '".$password."'           
    ");

    if($rows = mysqli_num_rows($query)){
        if($rows == 1){
            if ($rows['is_admin'] == 0){
                header("location: ../admin/index.php");
            }else{
                header("location: ../student/index.php");
            }
        }

    mysqli_close($conn);

    }else{

        echo "<script type='text/javascript'>alert('Invalid Username/Password.');</script>";
        header("location: ../index.php");

    }