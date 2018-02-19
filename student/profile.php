<?php
    $title = 'Profile';
    require_once('../connection.php');
    include('../includes/header.php');
    if (!isset($_SESSION['username']) || $_SESSION['is_admin'] != '0'){
        header("location: ../index.php");
    }
?>
<style>
.update_profile{
    background-color: rgba(0, 0, 0, 0.5);
    width:111px; 
    margin-left:-53px !important; 
    margin-top:2px; 
    height:111px;
    padding-top: 50px !important;
}
</style>

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
                    if($result['course'] == "BSIM"){
                      echo "BSIM";
                    }else{
                      echo "BSAIT";
                    }
                  ?>
                </h5>
              </div>
              <div class="widget-user-image" id="widget-user-image">
                <?php 
                  if($result['profile_picture'] != ""){
                    $profile_pic = $result['profile_picture'];
                  }else{
                    $profile_pic = "default_img.png";
                  }
                ?>
                <img style="width:115px; margin-left:-10px; height: 115px;" class="img-circle" src="<?php echo "../assets/uploads/profile_picture/".$profile_pic; ?>" alt="User Avatar">  
              </div>
              <div class="widget-user-image update_profile text-center img-circle"  >
                <span style="color:white;"> <i class="fa fa-camera"></i> Update Profile</span>
              </div>
              <div class="box-footer">
                <div class="row">
                  
                      <?php
                        $sql1 = "SELECT sum(hours_rendered) hours FROM ojt_hours_rendered A INNER JOIN 
                                ojt_users B ON A.stud_id = B.student_id WHERE B.STUDENT_ID ='".$_SESSION['stud_id']."' and status = 1 ";
                        $result1 = $conn->query($sql1);
                        
                        
                          $hours = $result1->fetch_assoc()['hours'];
                        

                         ?>
                     
                
                  <div class="col-sm-6 ">
                    <div class="description-block">
                      <?php                       
                        $sql = "SELECT a.total_hours FROM ojt_total_hours A 
                                INNER JOIN ojt_users B ON A.course = B.course WHERE B.STUDENT_ID ='".$_SESSION['stud_id']."' ";
                        $result = $conn->query($sql);
                        $total = $result->fetch_assoc()['total_hours'];
                        $diff_hours = $total - $hours;
                      ?>
                      <h5 class="description-header"><?php echo $diff_hours; ?></h5>
                      <span class="description-text">Total Hours Needed</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  
                  <div class="col-sm-6">
                    <div class="description-block">
                      <h5 class="description-header">
                        <?php 
                          if($result->num_rows > 0) {
                          echo $total; 
                        }
                        else
                        {
                          echo 'Not yet set';
                        }
                        ?>
                      </h5>
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
                <span class="pull-right">
                  <a href="#EditProfile"  data-toggle="modal" title="Edit Profile">
                      <i class="fa fa-pencil"></i>
                  </a>
                </span>
              </div>
              <!-- /.box-header -->
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
        <?php
            $step_completed = 0;
            for ($ctr=1; $ctr <= 4; $ctr++) { 
            $sql1 = "SELECT count(*) step_tally FROM ojt_requirements_list where step = '".$ctr."' ";
                $result1 = $conn->query($sql1);

                $step_tally = $result1->fetch_assoc()['step_tally'];
            $sql2 = "SELECT count(*) completed_tally FROM ojt_student_requirements a inner join
                     ojt_requirements_list b on a.requirement_id = b.id where a.stud_id='".$_SESSION['stud_id']."' 
                     and b.step = '".$ctr."' ";
                $result2 = $conn->query($sql2);    
                $completed_tally = $result2->fetch_assoc()['completed_tally'];
                if ($step_tally == 0 && $completed_tally == 0)
                {
                    $step_completed = 0;
                }
                else
                {
                    if ($step_tally == $completed_tally)
                    {
                        if($ctr == 1)
                        {
                            $sql3= "SELECT * FROM ojt_student_recommendation AS a
                                    INNER JOIN ojt_users AS b ON a.stud_id = b.student_id
                                    WHERE stud_id = '".$_SESSION['stud_id']."' ";

                                $result3 = $conn->query($sql3);
                                if($result3->num_rows == 0)
                                {
                                    $step_completed = 0;
                                }
                                else if($result3->fetch_assoc()['status'] == 0)
                                {
                                    $step_completed = 0;
                                }
                                else
                                {
                                    $btn_disable ="disabled";
                                    $step_completed = 1;
                                }
                        }
                        else
                        {
                            $step_completed = $step_completed + 1;
                        }
                    }
                }
            }    

            $step_percentage = ($step_completed / 4) * 100;
        ?>
        <div class="info-box-content">
            <span class="info-box-text">Step Requirement Summary</span>
            <span class="info-box-number">(<?php echo $step_completed; ?> out of 4) Steps completed.</span>

            <div class="progress">
                <div class="progress-bar" style="width: <?php echo $step_percentage; ?>%"></div>
            </div>
            <span class="progress-description">
                    <?php echo $step_percentage; ?>%
                  </span>
        </div>
        <!-- /.info-box-content -->
    </div>

        
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
                <?php 
                        if($hours > 0) {
                          echo $hours; 
                        }
                        else
                        {
                          echo '0';
                        }
                        ?>
              </h3>

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

<!--GET PROFILE-->
<?php 
    

      $sql = "SELECT * FROM  ojt_users WHERE student_id = '".$_SESSION['stud_id']."'";
      $result = $conn->query($sql);

      $data = $result->fetch_assoc();

      $conn->close();
   
?>

    <div class="modal fade in" id="EditProfile" style="padding-right: 17px;">
          <div class="modal-dialog">
            <div class="modal-content" style=" margin-top:90px;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit Profile</h4>
              </div>
              <div class="modal-body">
                <form action="models/update_profile.php" method="POST" enctype="multipart/form-data">
                  <div class="box-body">
                      <div style="margin-bottom: 15px; height:34px;">
                        <label for="name" class="col-sm-3 control-label">Name</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['firstname']." ".$data['lastname']; ?>" disabled>
                        </div>
                      </div>
                      <div style="margin-bottom: 15px; height:34px;">
                        <label for="student_id" class="col-sm-3 control-label">Student ID</label>
                          <div class="col-lg-9">
                          <input type="text" class="form-control" id="student_id" name="student_id" value="<?php echo $data['student_id']; ?>" disabled>
                          </div>
                      </div>
                      <div style="margin-bottom: 15px; height:34px;">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                          <div class="col-lg-9">
                          <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>" required>
                          </div>
                      </div>
                      <div style="margin-bottom: 15px; height:34px;">
                          <label for="password" class="col-sm-3 control-label">Password</label>
                          <div class="col-lg-9">
                              <input type="password" pattern=".{8,}"   required title="8 minimum characters"  class="form-control" id="password" name="password" value="<?php echo $data['password']; ?>">
                          </div>
                      </div>
                      <div style="margin-bottom: 15px; height:34px;">
                        <label for="contact_number" class="col-sm-3 control-label">Contact Number</label>
                          <div class="col-lg-9">
                          <input type="text" class="form-control" id="contact_number" name="contact_number" value="<?php echo $data['contact_number']; ?>" required>
                          </div>
                      </div>
                      <div style="margin-bottom: 15px; height:34px;">
                        <label for="dtr" class="col-sm-3 control-label">Gender</label>
                          <div class="col-lg-9">
                            <?php
                              if($data['gender'] == "FEMALE"){
                              echo  '<input type="radio" name="optradio" disabled>Male
                                     <input type="radio" name="optradio" checked disabled>Female';
                              }else{
                              echo  '<input type="radio" name="optradio" checked disabled>Male
                                     <input type="radio" name="optradio" disabled>Female';  
                              }
                             ?>
                            
                          </div>
                      </div>
                      <div style="margin-bottom: 15px; height:34px;">
                        <label for="birthdate" class="col-sm-3 control-label">Birthdate</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" id="birthdate" name="birthdate" value="<?php echo $data['birthdate']; ?>" disabled>
                          </div>
                      </div>
                      <div style="margin-bottom: 15px; height:34px;">
                        <label for="street" class="col-sm-3 control-label">Street</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" id="street" name="street" value="<?php echo $data['street']; ?>" >
                          </div>
                      </div>
                      <div style="margin-bottom: 15px; height:34px;">
                        <label for="barangay" class="col-sm-3 control-label">Barangay</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" id="barangay" name="barangay" value="<?php echo $data['barangay']; ?>" >
                          </div>
                      </div>
                      <div style="margin-bottom: 15px; height:34px;">
                        <label for="city" class="col-sm-3 control-label">City</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" id="city" name="city" value="<?php echo $data['city']; ?>" >
                          </div>
                      </div>
                      <div style="margin-bottom: 15px; height:34px;">
                        <label for="province" class="col-sm-3 control-label">Province</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" id="province" name="province" value="<?php echo $data['province']; ?>" >
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

    <div class="modal fade in" id="EditProfilePicture" style="padding-right: 17px;">
          <div class="modal-dialog">
            <div class="modal-content" style=" margin-top:90px;">
              <div class="modal-header">
                <button type="button" class="close" id="pic_close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit Profile</h4>
              </div>
              <div class="modal-body">
                <form action="models/update_profile.php" method="POST" enctype="multipart/form-data">
                  <div class="box-body">
                      <div style="margin-bottom: 15px; height:34px;">
                        <label for="profile_pic" class="col-sm-3 control-label">Profile Pictures</label>
                          <div class="col-lg-9">
                            <input type="file" id="profile_pic" name="profile_pic"  required>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" id="pic_close" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>
  </div>

  </div>



<?php include('../includes/footer.php'); ?>
