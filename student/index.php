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
                      <form action="models/submit_requirements.php" method="POST" enctype="multipart/form-data">
                        <?php
                            $sql = "SELECT * FROM ojt_requirements_list WHERE `type` = 1 AND `step` = 1";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc())
                                {
                                  echo'
                                    <input type="hidden" name="requirement_id'.$row['id'].'" value="'.$row['id'].'">
                                    <input type="hidden" name="step" value="1">
                                    <ul>
                                      <li>'
                                        .$row['name'];
                                      if($row['is_online'] == 1){
                                        echo '<input type="file" name="name'.$row['id'].'" class="pull-right">';
                                      }
                                  echo '</li>
                                    </ul>';
                                }
                                echo '<br>
                                          <button type="reset" class="btn btn-danger btn-xs pull-right">Cancel</button>
                                          <button type="submit" class="btn btn-primary btn-xs pull-right">Submit</button>';
                              }
                            else{
                                echo "No records found.";
                              }
                        ?>
                      </form>
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
                      <form action="models/submit_requirements.php" method="POST" enctype="multipart/form-data">
                          <?php
                                $sql = "SELECT * FROM ojt_requirements_list WHERE `type` = 1 AND `step` = 2";
                                $result = $conn->query($sql);

                                if($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc())
                                    {
                                      echo'
                                        <input type="hidden" name="requirement_id'.$row['id'].'" value="'.$row['id'].'">
                                        <input type="hidden" name="step" value="2">
                                        <ul>
                                          <li>'
                                            .$row['name'];
                                          if($row['is_online'] == 1){
                                            echo '<input type="file" name="name'.$row['id'].'" class="pull-right">';
                                          }
                                      echo '</li>
                                        </ul>';
                                    }
                                    echo '<br>
                                          <button type="reset" class="btn btn-danger btn-xs pull-right">Cancel</button>
                                          <button type="submit" class="btn btn-primary btn-xs pull-right">Submit</button>';
                                  }
                                else{
                                    echo "No records found.";
                                  }
                           ?>
                      </form>
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
                      <form action="models/submit_requirements.php" method="POST" enctype="multipart/form-data">
                        <?php
                              $sql = "SELECT * FROM ojt_requirements_list WHERE `type` = 1 AND `step` = 3";
                              $result = $conn->query($sql);

                              if($result->num_rows > 0) {
                                  while($row = $result->fetch_assoc())
                                  {
                                    echo'
                                      <input type="hidden" name="requirement_id'.$row['id'].'" value="'.$row['id'].'">
                                      <input type="hidden" name="step" value="3">
                                      <ul>
                                        <li>'
                                          .$row['name'];
                                        if($row['is_online'] == 1){
                                          echo '<input type="file" name="name" class="pull-right">';
                                        }
                                    echo '</li>
                                      </ul>';
                                  }
                                  echo '<br>
                                          <button type="reset" class="btn btn-danger btn-xs pull-right">Cancel</button>
                                          <button type="submit" class="btn btn-primary btn-xs pull-right">Submit</button>';
                                }
                              else{
                                  echo "No records found.";
                                }
                         ?>
                      </form>
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
                      <form action="models/submit_requirements.php" method="POST" enctype="multipart/form-data">
                        <?php
                            $sql = "SELECT * FROM ojt_requirements_list WHERE `type` = 1 AND `step` = 4";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc())
                                {
                                  echo'
                                    <input type="hidden" name="requirement_id'.$row['id'].'" value="'.$row['id'].'">
                                    <input type="hidden" name="step" value="4">
                                    <ul>
                                      <li>'
                                        .$row['name'];
                                      if($row['is_online'] == 1){
                                        echo '<input type="file" name="name" class="pull-right">';
                                      }
                                  echo '</li>
                                    </ul>';
                                }
                                echo '<br>
                                          <button type="reset" class="btn btn-danger btn-xs pull-right">Cancel</button>
                                          <button type="submit" class="btn btn-primary btn-xs pull-right">Submit</button>';
                              }
                            else{
                                echo "No records found.";
                              }
                        ?>
                      </form>    
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Submitted Requirements Status</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Requirement Name</th>
                      <th>Document Name</th>
                      <th>Document Status</th>
                      <th>Action</th>            
                    </tr>
                    </thead>
                    <tbody>
                    <!-- List -->
                    <?php
                    $sql = "SELECT a.name as document_name, b.name as requirement_name,a.status 
                            FROM 
                              ojt_student_requirements as a 
                            INNER JOIN 
                              ojt_requirements_list as b
                            ON 
                              a.requirement_id = b.id  
                            WHERE
                              stud_id = '".$_SESSION['stud_id']."' ";
                    $result = $conn->query($sql);

                    if($result->num_rows > 0) {
                    
                        while($row = $result->fetch_assoc())
                        { 
                          echo'<tr>
                                     <td>'.$row['requirement_name'].'</td>
                                     <td>'.$row['document_name'].'</td>
                                     <td>';
                                      if($row['status'] == 0){
                                        echo '<span class="label label-primary" style="display: block;">None</span>';
                                      }else if($row['status'] == 1){
                                        echo '<span class="label label-warning" style="display: block;">Pending</span>';
                                      }else if($row['status'] == 2){
                                        echo '<span class="label label-success" style="display: block;">Approved</span>';
                                      }else{
                                        echo '<span class="label label-danger" style="display: block;">Rejected</span>';
                                      }
                            echo    '</td> 
                                     <td>';
                                     if($row['status'] != 2){
                                      echo '<button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal" data-target="#modal-default">Submit</button>';
                                     }
                            echo    '</td>
                                 </tr>
                                      ';
                        }
                    }
                    else{
                        echo '<tr>
                                   <td> No Records Found. </td>
                                   <td></td>
                              </tr>';
                    }
                    ?>
                  </tbody>
                </table>

                <!--modal-->
                <div class="modal fade in modal-xs" id="modal-default" style="padding-right: 17px;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Change Document</h4>
                      </div>
                      <div class="modal-body" style="padding-bottom:150px;">
                        <div class="col-lg-12">
                          <div class="col-lg-4">
                            <label>Requirement Name:</label>
                          </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" value="Application Letter" disabled>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div style="padding-bottom: 10px;"></div>
                          <div class="col-lg-4">
                            <label>Document:</label>
                          </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" value="Wow">
                            <br>
                            <input type="file" class="form-control" name="name">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!--end modal-->

              </div>
            </div>
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
        $('#example2').DataTable({
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