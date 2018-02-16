<?php
$title = 'SMS';
require_once('../connection.php');
include('../includes/header.php');
if (!isset($_SESSION['username']) || $_SESSION['is_admin'] != '1'){
    header("location: ../index.php");
}
?>
<div class="wrapper">
    <?php include('../includes/admin_subheader.php') ?>
    <?php include('../includes/admin_sidebar.php') ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Send SMS
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li><a href="#">SMS</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <div class="box-body">
           <div class="box box-primary">
                <div class="box-body">
                    <form action="../models/smsSending.php" method="POST">
                        <label for="recipient">Recipient</label>
                        <input type="text" id="recipient" name="recipient" class="form-control" placeholder="Enter Student Lastname">
                        <div id="suggesstion-box"></div>
                        <label for="sms_message">Message</label>
                        <textarea name="sms_message" id="sms_message" class="form-control" cols="30" rows="10"></textarea>
                        <br/>
                        <button type="submit" class="btn btn-success btn-lg">Send</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.content -->
    </div>
    <?php include('../includes/footer.php')?>
</div>
