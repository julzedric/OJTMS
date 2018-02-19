<?php

    $title = 'Announcement List';
    require_once('../connection.php');
    include('../includes/header.php');
    if (!isset($_SESSION['username']) || $_SESSION['is_admin'] != '1'){
        header("location: ../index.php");
    }

    if($_GET['id']) {
      $id = $_GET['id'];

      $sql = "SELECT * FROM  ojt_announcements WHERE id = '".$id."'";
      $result = $conn->query($sql);

      $data = $result->fetch_assoc();

      $conn->close();
    }
?>

<div class="wrapper">

    <?php include('../includes/admin_subheader.php') ?>
    <?php include('../includes/admin_sidebar.php') ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Announcements
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Step Requirements</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="box-body">
        <!-- <div class="margin-bottom-20">
            <button class="btn btn-primary" onclick="$('.collapse').toggle();">Add new Announcement</button>
        </div> -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Announcement</h3>
            </div>

            <div class="box-body padding-20">
                <form action="models/update_announcement.php" class="form-horizontal row-border" role="form" method="POST" id="ojtmsForm" enctype="multipart/form-data">
                    <input type="hidden" name="act" id="act" value="edit">
                    <input type="hidden" name="id" id="id" value="<?php echo $data['id']?>">

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Date From:</label>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right datepicker" name="date_from" id="date_from" value="<?php echo $data['start_date']?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Date To:</label>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right datepicker" name="date_to" id="date_to" value="<?php echo $data['end_date']?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Title:</label>
                        </div>
                        <div class="col-md-6">
                            <textarea name="title" id="title" class="form-control" rows="3"><?php echo $data['title']?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Announcement:</label>
                        </div>
                        <div class="col-md-6">
                            <textarea name="announcement" id="announcement" class="form-control" rows="7"><?php echo $data['announcements']?></textarea>
                        </div>
                    </div>
                    <div class="form-group margin-bottom-0">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div id="message"></div> 
                            <div id="actionButtons" class="pull-right">
                                <a href="announcement-list.php" id="btn_cancel" class="btn btn-squared btn-default btn-o">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-squared btn-primary" id="btnSubmit">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.content -->
  </div>

<?php include('../includes/footer.php')?>