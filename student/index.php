<?php
    $title = 'OJTMS';
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
        <small>Homepage <?php echo 'session name '.$_SESSION['username']; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Homepage</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-8">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of OJT Requirements</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Step 1
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">
                      <!-- List -->
                      <?php
                            $sql = "SELECT * FROM ojt_requirements";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc())
                                {
                                  echo'
                                    <ul>
                                      <li>'.$row['name'].'</li>
                                    </ul>
                                  ';
                                }
                              }
                            else{
                                echo "No records found.";
                              }
                       ?>
                    </div>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        Step 2
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body">
                      <!-- List -->
                      <?php
                            $sql = "SELECT * FROM ojt_requirements";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc())
                                {
                                  echo'
                                    <ul>
                                      <li>'.$row['name'].'</li>
                                    </ul>
                                  ';
                                }
                              }
                            else{
                                echo "No records found.";
                              }
                       ?>
                    </div>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        Step 3
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body">
                      <!-- List -->
                      <?php
                            $sql = "SELECT * FROM ojt_requirements";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc())
                                {
                                  echo'
                                    <ul>
                                      <li>'.$row['name'].'</li>
                                    </ul>
                                  ';
                                }
                              }
                            else{
                                echo "No records found.";
                              }
                       ?>
                    </div>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                        Step 4
                      </a>
                    </h4>
                  </div>
                  <div id="collapseFour" class="panel-collapse collapse">
                    <div class="box-body">
                      <!-- List -->
                      <?php
                            $sql = "SELECT * FROM ojt_requirements";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc())
                                {
                                  echo'
                                    <ul>
                                      <li>'.$row['name'].'</li>
                                    </ul>
                                  ';
                                }
                              }
                            else{
                                echo "No records found.";
                              }
                       ?>
                    </div>
                  </div>
                </div>
              </div>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Document Name</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>             
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Resume</td>
                  <td>January 19, 2018</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td> </td>
                </tr>
                <tr>
                  <td>Application Letter</td>
                  <td>January 19, 2018</td>
                  <td><span class="label label-danger">Pending</span></td>
                  <td>
                    <button type="button" class="btn btn-block btn-primary btn-xs">Submit</button>
                  </td>
                </tr>
                <tr>
                  <td>Registration Form</td>
                  <td>January 19, 2018</td>
                  <td><span class="label label-danger">Pending</span></td>
                  <td><button type="button" class="btn btn-block btn-primary btn-xs">Submit</button></td>
                </tr>
                <tr>
                  <td>Notarized Waiver</td>
                  <td>January 19, 2018</td>
                  <td><span class="label label-danger">Pending</span></td>
                  <td><button type="button" class="btn btn-block btn-primary btn-xs">Submit</button></td>
                </tr>
                <tr>
                  <td>Recommendation Letter</td>
                  <td>January 19, 2018</td>
                  <td><span class="label label-danger">Pending</span></td>
                  <td><button type="button" class="btn btn-block btn-primary btn-xs">Submit</button></td>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
          <!-- /.info-box -->

          <!--Announcement-->
          <?php
                require_once('../connection.php');

                $query = mysqli_query($conn, "
                           SELECT  * from ojt_announcements       
                    ");
                $results = array();
                while ($row = mysqli_fetch_assoc($query)){
                    $results[] = $row;
                }
                ?>

            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-bullhorn margin-r-5"></i> Announcement</h3>
              </div>
            <!-- /.box-header -->
              <div class="box-body">

                <?php 
                  foreach ($results as $result){
                    //echo json_encode($result);
                echo '<strong><i class="fa fa-book margin-r-5"></i>'
                        .$result['title'].
                      '</strong>';

                echo'<p class="text-muted">'
                      .$result['announcements'].
                    '</p>';
                echo '<hr>';
                }
              ?>

                
              </div>
            <!-- /.box-body -->
            </div>
          <!--End Announcement-->

        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('../includes/footer.php')?>