<?php 


$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "ojtms";

//create connection

$conn = mysqli_connect($localhost,$username,$password,$dbname);

session_start();

//check connection

if($conn->connect_error)
{
	die("Connection Failed: " . $conn->connect_error);
}

