<?php
    $title = 'Downloadable Forms';
    require_once('../connection.php');
    include('../includes/header.php');
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
        <small>Forms</small>
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
              <h3 class="box-title">Downloadable Forms</h3>
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
                  <td>Intial Requirments</td>
                  <td><button type="button" class="btn btn-block btn-success btn-xs"><i class="fa fa-search"></i> Preview</button></td>
                </tr>
                <tr>
                  <td>Student Trainee Evaluation</td>
                  <td><button type="button" class="btn btn-block btn-success btn-xs"><i class="fa fa-search"></i> Preview</button></td>
                </tr>
                <tr>
                  <td>Waiver</td>
                  <td><button type="button" class="btn btn-block btn-success btn-xs"><i class="fa fa-search"></i> Preview</button></td>
                </tr>
                <tr>
                  <td>Medical Certificate</td>
                  <td><button type="button" class="btn btn-block btn-success btn-xs"><i class="fa fa-search"></i> Preview</button></td>
                </tr>
                <tr>
                  <td>Recommendation Letter</td>
                  <td><button type="button" class="btn btn-block btn-success btn-xs"><i class="fa fa-search"></i> Preview</button></td>
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
                <strong><i class="fa fa-book margin-r-5"></i> Initial Checking of Requriements</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                <p>
                  <span class="label label-danger">UI Design</span>
                  <span class="label label-success">Coding</span>
                  <span class="label label-info">Javascript</span>
                  <span class="label label-warning">PHP</span>
                  <span class="label label-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
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