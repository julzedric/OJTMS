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
                  <th>Requirement Name</th>
                  <th>Document Name</th>
                  <th class="text-center">Action</th>            
                </tr>
                </thead>
                <tbody>
                <!-- List -->
                <?php
                $sql = "SELECT a.*, b.id as b_id, b.name as requirement_name FROM ojt_student_requirements as a
                        INNER JOIN ojt_requirements_list as b
                        ON 
                        a.requirement_id = b.id
                         WHERE stud_id = '".$_SESSION['stud_id']."' ";
                $result = $conn->query($sql);

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc())
                    {
                        echo'<tr>
                                <td>'.$row['requirement_name'].'</td>
                                 <td>'.$row['name'].'</td>';
                        $file = "../assets/uploads/student_requirements/".$row['name'];
                        if($row['status'] != 2){
                          echo "<td class='text-center'>
                                  <a href='".$file."' target='_new'>
                                    <button type='button' class='btn btn-info btn-sm' title='View'>
                                      <i class='fa fa-eye'></i> Preview
                                    </button>
                                  </a>
                                  <a href='".$file."'>
                                      <button type='button' class='btn btn-success btn-sm' title='Download'>
                                        <i class='fa fa-download'></i> Download
                                      </button>
                                  </a>
                                  <a href='models/remove_requirement.php?id=".$row['id']."'>
                                    <button type='button' class='btn btn-danger btn-sm' title='Remove'>
                                      <i class='fa fa-trash'></i> Delete
                                    </button>
                                  </a>
                                </td>";
                        }else{
                          echo "<td class='text-center'>
                                  <a href='".$file."' target='_new'>
                                    <button type='button' class='btn btn-info btn-sm' title='View'>
                                      <i class='fa fa-eye'></i> Preview
                                    </button>
                                  </a>
                                  <a href='".$file."'>
                                      <button type='button' class='btn btn-success btn-sm' title='Download'>
                                        <i class='fa fa-download'></i> Download
                                      </button>
                                  </a>
                                </td>";
                        }
                    }
                }
                else{
                    echo '<tr>
                               <td> No Records Found. </td>
                               <td></td>
                          </tr>';
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