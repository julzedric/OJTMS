<?php
require('../textlocal.class.php');

$recipient = $_POST['recipient'];
$message = $_POST['sms_message'];
$textlocal = new Textlocal('juliuscedricjomena@gmail.com', 'e44f775a14275a14b7ff92d8566832953814380b7b5fcb7d34a640a2e801c76f');
//$textlocal = new Textlocal('cronnelbrian@gmail.com', 'c32fe9bfa0ae22d193485390091ca3f41c5f043435a31c8eade649065acf30b7');

$numbers = array($recipient);
$sender = 'OJTMS';
//$message = $message;

try {
    $result = $textlocal->sendSms($numbers, $message, $sender);
    echo "<script type='text/javascript'> 
                    var conf= confirm(\"SMS Successfully Sent!\");
                    if(conf == true){
                      window.location = \"http://ojtms.x10host.com/admin/sms.php\";
                    }
                    </script>";
    exit;
} catch (Exception $e) {
    echo "<script type='text/javascript'> 
                    var conf= confirm(\"Opps Something went wrong. Please Try again.\");
                    if(conf == true){
                        window.history.back();
                    }
                    </script>";
    exit;
//    die('Error: ' . $e->getMessage());
}
?>