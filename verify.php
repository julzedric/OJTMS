<?php
/**
 * Created by PhpStorm.
 * User: Julius
 * Date: 09/02/2018
 * Time: 12:33 AM
 */
require_once 'connection.php';

$tokenFromEmail = $_GET['token'];
$query = mysqli_query($conn, "
           SELECT  `username`,`email`,`token`
           FROM ojt_users     
           WHERE token = '".$tokenFromEmail."'    
    ");
while ($row = mysqli_fetch_assoc($query)){
    $results[] = $row;
}
if (isset($results)){
    foreach ($results as $student){
        if ($student['token'] == $tokenFromEmail ){
            $email = $student['email'];
            $query = mysqli_query($conn, "
                UPDATE ojt_users
                SET  is_validated = '1', token = ''
                WHERE email = '".$email."' 
        ");
            $conn->close();
            echo "<script type='text/javascript'> 
                    var conf= confirm(\"Success ! You may now Login to your Account..\");
                    if(conf == true){
                        window.location.href = 'http://ojtms.x10host.com/ojtms/index.php';
                    }
                    </script>";
            exit;
        }
    }
}else{
    echo "<script type='text/javascript'> 
                    var conf= confirm(\"Error ! Email/Token Mismatch!\");
                    if(conf == true){
                        window.location.href = 'http://ojtms.x10host.com/index.php';
                    }
                    </script>";
    exit;
}

