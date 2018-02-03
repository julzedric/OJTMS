<?php
    $title = 'My Documents';
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
        <small>Documents</small>
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
              <h3 class="box-title">My Documents</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Document Name</th>
                  <th>Action</th>            
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Resume</td>
                  <td><button type="button" class="btn btn-block btn-primary btn-xs"><i class="fa fa-download"></i> Download</button></td>
                </tr>
                <tr>
                  <td>Application Letter</td>
                  <td><button type="button" class="btn btn-block btn-primary btn-xs"><i class="fa fa-download"></i> Download</button></td>
                </tr>
                <tr>
                  <td>Registration Form</td>
                  <td><button type="button" class="btn btn-block btn-primary btn-xs"><i class="fa fa-download"></i> Download</button></td>
                </tr>
                <tr>
                  <td>Notarized Waiver</td>
                  <td><button type="button" class="btn btn-block btn-primary btn-xs"><i class="fa fa-download"></i> Download</button></td>
                </tr>
                <tr>
                  <td>Recommendation Letter</td>
                  <td><button type="button" class="btn btn-block btn-primary btn-xs"><i class="fa fa-download"></i> Download</button></td>
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
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-bullhorn margin-r-5"></i> Announcement</h3>
              </div>
            <!-- /.box-header -->
              <div class="box-body">

                <?php
                            $sql = "SELECT * FROM ojt_announcements";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc())
                                {
                                    echo '
                                        <strong><i class="fa fa-book margin-r-5"></i>'.$row['title'].'</strong>

                                        <p class="text-muted">
                                          '.$row['announcements'].'
                                        </p>

                                        <hr>

                                        ';
                                }

                            }
                        ?>
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