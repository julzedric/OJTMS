<?php
/**
 * Created by PhpStorm.
 * User: Jamarin-PC
 * Date: 3 Feb 2018
 * Time: 6:23 PM
 */

session_start();
if(session_destroy()) // Destroying All Sessions
{
    header("location: ../index.php ");

}
?>