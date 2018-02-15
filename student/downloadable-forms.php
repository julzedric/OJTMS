<?php
    $title = 'Downloadable Forms';
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
          <?php
          include "../includes/student_right_sidebar.php";
          ?>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
    function load_dataTable() 
    {
        $('.table').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        });
    }
  </script>
<?php include('../includes/footer.php')?>