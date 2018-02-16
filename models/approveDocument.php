<?php
/**
 * Created by PhpStorm.
 * User: Jamarin-PC
 * Date: 16 Feb 2018
 * Time: 7:50 PM
 */
require_once('../connection.php');

if($_GET) {
    $id = $_GET['id'];
    print_r($id);
    exit;

}