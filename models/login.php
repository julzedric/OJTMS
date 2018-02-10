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
    $row = mysqli_fetch_assoc($query);
    if($rows = mysqli_num_rows($query)){
        if($rows == 1){
            if ($row['is_admin'] == 1){
                header("location: ../admin/index.php");
            }else{
                if($row['is_validated'] == 0){
                    echo "<script type='text/javascript'> 
                    var conf= confirm(\"Please confirm your email to continue.\");
                    if(conf == true){
                        window.location.href = 'http://localhost/ojtms/index.php';
                    }
                  </script>";
                    exit;
                }else{
                    header("location: ../student/index.php");
                }
            }
            $_SESSION['username'] = $username;
            $_SESSION['is_admin'] = $row['is_admin'];
            $_SESSION['stud_id'] = $row['student_id'];
        }
    mysqli_close($conn);
    }else{
        echo "<script type='text/javascript'> 
                    var conf= confirm(\"Username or Password is incorrect please try again.\");
                    if(conf == true){
                        window.location.href = 'http://localhost/ojtms/index.php';
                    }
                  </script>";
    }