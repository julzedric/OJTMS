<?php
require_once('../connection.php');
require_once ('../mailer.php');

if($_POST) {
    $error = [];
    $student_id = $_POST['student_id'];
    $course = $_POST['course'];
    $section = $_POST['section'];
    $contact_number = $_POST['contact_number'];
    $username = $_POST['username'];
    $password = $_POST['reg-pword'];
    $confirm_password = $_POST['regcon-pword'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
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
    $captcha = $_POST['g-recaptcha-response'];
    preg_match('/\d+/', $contact_number, $matches);
    if ($contact_number[0] != '9'){
        echo "<script type='text/javascript'> 
                    var conf = confirm(\"Contact Number Invalid Format.\");
                   if(conf == true){
                        window.history.back();
                    }
                    </script>";
        exit;
    }
    $query = mysqli_query($conn, "
           SELECT  `username`,`email`,`student_id`
           FROM ojt_users         
    ");
    $results = array();
    while ($row = mysqli_fetch_assoc($query)){
        $results[] = $row;
    }
    foreach ($results as $result){
        /*******************VALIDATION****************************/

        if ($result['username'] == $username){
            echo "<script type='text/javascript'> 
                    var conf = confirm(\"Username Already taken.\");
                   if(conf == true){
                        window.history.back();
                    }
                    </script>";
            exit;
        }
        if ($result['email'] == $email){
            echo "<script type='text/javascript'> 
                    var conf= confirm(\"Email Already taken.\");
                    if(conf == true){
                        window.history.back();
                    }
                    </script>";
            exit;
        }
        if ($result['username'] == $username){
            echo "<script type='text/javascript'> 
                    var conf= confirm(\"Username Already taken.\");
                    if(conf == true){
                        window.history.back();
                    }
                    </script>";
            exit;
        }
        if ($password != $confirm_password){
            echo "<script type='text/javascript'> 
                    var conf= confirm(\"Password do not match.\");
                    if(conf == true){
                        window.history.back();
                    }
                    </script>";
            exit;
        }
        if ($captcha == ''){
            echo "<script type='text/javascript'> 
                    var conf= confirm(\"Captcha is required.\");
                    if(conf == true){
                        window.history.back();
                    }
                    </script>";
            exit;
        }
    }
    $enc_password = sha1($password);
    $token = md5(uniqid(rand(), true));
    /*******************VALIDATION ENDS****************************/
    $link = 'http://ojtms.x10host.com/verify.php?'.'token='.$token;
    sendEmail($email, $username, $link);
    $sql = "INSERT INTO ojt_users(
                student_id, course, section, contact_number, username, password, token,
                lastname, firstname, middlename, suffix, email, 
                birthdate, gender, street, barangay, city, province, 
                created_at )
                VALUES (
                '".$student_id."', '".$course."', '".$section."', '".'63'.$contact_number."', '".$username."', '".$enc_password."','".$token."',
                '".$lastname."', '".$firstname."', '".$middlename."', '".$suffix."', '".$email."', 
                '".$birthdate."', '".$gender."', '".$street."',
                '".$barangay."', '".$city."', '".$province."', '".$created_at."' 
            )";

    if($conn->query($sql) == TRUE) {
        echo "<script type='text/javascript'> 
                    var conf= confirm(\"Success ! Please verify your email to continue.\");
                    if(conf == true){
                         window.history.back();
                    }
                    </script>";
    } else {
        echo "<script type='text/javascript'> 
                    var conf= confirm(\"Error. Please try again..\");
                    if(conf == true){
                        window.history.back();
                    }
                    </script>";
        exit;
    }

    $conn->close();
}
