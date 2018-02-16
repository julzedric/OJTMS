<?php

    $title = 'Edit Announcement';
    require_once('../connection.php');
    include('../includes/header.php');
    if (!isset($_SESSION['username']) || $_SESSION['is_admin'] != '1'){
        header("location: ../index.php");
    }

    if($_GET['id']) {
      $id = $_GET['id'];

      $sql = "SELECT * FROM  ojt_total_hours WHERE id = '".$id."'";
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
                <h3 class="box-title">Edit Hours Required</h3>
            </div>
            <div class="box-body padding-20">
                <form action="models/update_total_hours.php" class="form-horizontal row-border" role="form" method="POST" id="ojtmsForm" enctype="multipart/form-data">
                    <input type="hidden" name="act" id="act">
                    <input type="hidden" name="id" id="id" value="<?php echo $data['id']?>">

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>School Year:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="school_year" name="school_year" class="form-control" value="<?php echo $data['school_year']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Semester:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="semester" name="semester" class="form-control" value="<?php echo $data['semester']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Course:</label>
                        </div>
                        <div class="col-md-6">  
                            <select class="form-control" id="course" name="course">
                                <?php 
                                    if($data['course'] == 'BSIM')
                                    {
                                        echo '<option value="">--Select--</option>
                                            <option value="BSIM" selected="true">BSIM</option>
                                            <option value="BSAIT">BSAIT</option>';
                                    } else {
                                        echo '<option value="">--Select--</option>
                                            <option value="BSIM">BSIM</option>
                                            <option value="BSAIT" selected="true">BSAIT</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Total Hours:</label>
                        </div>
                        <div class="col-md-6">  
                            <input type="text" id="total_hours" name="total_hours" class="form-control" value="<?php echo $data['total_hours']?>">
                        </div>
                    </div>
                    <div class="form-group margin-bottom-0">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div id="message"></div> 
                            <div id="actionButtons" class="pull-right">
                                <button type="reset" id="btn_cancel" onclick="clearfield2()" class="btn btn-squared btn-default btn-o">
                                    Cancel
                                </button>
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