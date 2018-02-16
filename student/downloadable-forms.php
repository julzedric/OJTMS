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
                  <th class="text-center">Action</th>            
                </tr>
                </thead>
                <tbody>
                <?php
                  $sql = "SELECT * FROM ojt_requirements_list WHERE type = 0";
                  $result = $conn->query($sql);

                  if($result->num_rows > 0) {
                      while($row = $result->fetch_assoc())
                      {
                       echo  '<tr>
                                <td>'.$row['name'].'</td> ';
                       $file = "../assets/uploads/requirements/".$row['file'];
                        if($row['file'] == '')
                            {
                       echo    
                              '<td class="text-center">
                                  <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Preview</button>
                                  <button type="button" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Download</button>
                                </td>';
                            }
                        else{
                        echo "<td class='text-center'>
                                <a href='".$file."' target='_new'>
                                  <button type='button' class='btn btn-info btn-sm' title='View'>
                                      <i class='fa fa-eye'></i>
                                  </button>
                                </a>
                                <a href='".$file."'>
                                    <button type='button' class='btn btn-success btn-sm' title='Download'>
                                      <i class='fa fa-download'></i> 
                                    </button>
                                </a>
                              </td>";  
                        }
                        echo '</tr>';    
                      }
                    }
                ?>
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