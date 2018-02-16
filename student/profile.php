<?php
    $title = 'Profile';
    require_once('../connection.php');
    include('../includes/header.php');
    if (!isset($_SESSION['username']) || $_SESSION['is_admin'] != '0'){
        header("location: ../index.php");
    }
?>

<div class="wrapper">

    <?php include('../includes/students_subheader.php');?>
  <!-- Left side column. contains the logo and sidebar -->
    <?php include('../includes/students_sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        OJTMS Student
        <small>Profile</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
           <div class="box box-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <?php
                require_once('../connection.php');

                $query = mysqli_query($conn, "
                           SELECT  * from ojt_users where `username` = '".$_SESSION['username']."'        
                    ");
                $results = array();
                while ($row = mysqli_fetch_assoc($query)){
                    $results[] = $row;
                }
                foreach ($results as $result){
                    //echo json_encode($result);
                }
              ?>
              <div class="widget-user-header bg-aqua-active">
                <h3 class="widget-user-username"><?php echo $result['firstname'] ." ".$result['middlename']." ".$result['lastname']; ?></h3>
                <h5 class="widget-user-desc">
                  <?php 
                    if($result['course'] == 1){
                      echo "BSIM";
                    }else{
                      echo "BSAIT";
                    }
                  ?>
                </h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
              </div>
              <div class="box-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">80</h5>
                      <span class="description-text">Total Hours Rendered</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">160</h5>
                      <span class="description-text">Total Hours Needed</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">240</h5>
                      <span class="description-text">Total Hours Required</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
           </div>
        </div>
        <div class="col-xs-8">
          <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">About Me</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i> Personal Information</strong>

                  <div class="col-xs-12">
                    <dl class="dl-horizontal">
                      <div class="col-xs-6">
                        <dt>Name</dt>
                        <dd><?php echo $result['firstname']." ".$result['lastname']; ?></dd>
                        <dt>Student ID</dt>
                        <dd><?php echo $result['student_id']; ?></dd>
                        <dt>Email</dt>
                        <dd><?php echo $result['email']; ?></dd>
                        <dt>Contact Number</dt>
                        <dd><?php echo $result['contact_number']; ?></dd>
                      </div>
                      <div class="col-xs-6">
                        <dt>Gender</dt>
                        <dd><?php echo $result['gender']; ?></dd>
                        <dt>Birthdate</dt>
                        <dd><?php echo $result['birthdate']; ?></dd>
                        <dt>Address</dt>
                        <dd><?php echo $result['street']." ".$result['barangay']." ".$result['city']." ".$result['province']; ?></dd>
                        
                      </div>                
                    </dl>
                  </div>

                  <hr>

                  <!-- <strong><i class="fa fa-book margin-r-5"></i> Personal Information</strong>

                  <div class="col-xs-12">
                    <dl class="dl-horizontal">
                      <div class="col-xs-6">
                        <dt>Name</dt>
                        <dd>Alexander Pierce</dd>
                        <dt>Student ID</dt>
                        <dd>11314-4527</dd>
                        <dt>Email</dt>
                        <dd>gueylaurdtibe@gmail.com</dd>
                        <dt>Contact Number</dt>
                        <dd>Felis euismod semper eget lacinia</dd>
                      </div>
                      <div class="col-xs-6">
                        <dt>Gender</dt>
                        <dd>Male</dd>
                        <dt>Birthdate</dt>
                        <dd>January 01, 1997</dd>
                        <dt>Address</dt>
                        <dd>#123 Kawawati Street Taguig City</dd>
                        
                      </div>                
                    </dl>
                  </div> -->

              </div>
              <!-- /.box-body -->
           </div>

        </div>
        <div class="col-xs-4">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Requirements Summary</span>
              <span class="info-box-number">(1 out of 5) completed.</span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
                  <span class="progress-description">
                    20%
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>

        
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>80</h3>

              <p>Hours Rendered</p>
            </div>
            <div class="icon">
              <i class="fa fa-clock-o"></i>
            </div>
            <a data-toggle="modal" href="#DTR" class="small-box-footer"><i class="fa fa-pencil"></i>
              Update DTR 
            </a>
          </div>
        
        </div>
      </div>
    </section>
    
    <div class="modal fade in" id="DTR" style="padding-right: 17px;">
          <div class="modal-dialog">
            <div class="modal-content" style=" margin-top:90px;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Daily Time Record</h4>
              </div>
              <div class="modal-body">
                <form action="models/submit_dtr.php" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    <p style="color: red;"><strong>
                      NOTE: The system will automatically compute for your total hours.
                       Please input the total hours for the week ONLY!
                    </strong></p>
                    <div style="margin-bottom: 15px; height:34px;">
                      <label for="hours_rendered" class="col-sm-3 control-label">Hours Rendered</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" id="hours_rendered" name="hours_rendered" required>
                      </div>
                    </div>
                    <div style="margin-bottom: 15px; height:34px;">
                      <label for="dtr" class="col-sm-3 control-label">Proof/Attachment</label>
                        <div class="col-lg-9">
                        <input type="file" id="dtr" name="attachment" required>
                        </div>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>

  </div>
    <?php include('../includes/footer.php')?>