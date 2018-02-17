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
                <!--start loop -->
                <?php
                    $step_completed = 0;
                    for($ctr=1; $ctr <= 4; $ctr++) { 
                      
                    $sql1 = "SELECT count(*) step_tally FROM ojt_requirements_list where step = '".$ctr."' ";
                        $result1 = $conn->query($sql1);

                        $step_tally = $result1->fetch_assoc()['step_tally'];
                    $sql2 = "SELECT count(*) completed_tally FROM ojt_student_requirements a inner join
                             ojt_requirements_list b on a.requirement_id = b.id where a.stud_id='".$_SESSION['stud_id']."' 
                             and b.step = '".$ctr."' ";
                        $result2 = $conn->query($sql2);    
                        $completed_tally = $result2->fetch_assoc()['completed_tally'];
                        if ($step_tally == $completed_tally)
                        {
                            $step_completed = $step_completed + 1;
                        }

                              $step = $step_completed +1;
                              if($step == $ctr){
                                $collapse = "in";
                                $color ="box-primary";
                                $disabled = "";
                              }else if($step_completed >= $ctr){
                                $collapse = "";
                                $color = "box-success";
                                $disabled = "disabled";
                              }
                              else{
                                $collapse = "";
                                $color = "box-danger";
                                $disabled = "disabled";
                              }
                        ?>
                        
                          <div class="panel box <?php echo $color; ?>" id="step<?php echo $ctr; ?>">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $ctr; ?>">
                                  Step <?php echo $ctr; ?>
                                </a>
                              </h4>
                            </div>
                            
                            <div id="collapse<?php echo $ctr; ?>" class="panel-collapse collapse <?php echo $collapse; ?>">
                              <div class="box-body">
                                <!-- List -->
                                <form action="models/submit_requirements.php" method="POST" enctype="multipart/form-data">
                                  <?php
                                          $sql = "SELECT a.*,b.requirement_id,b.stud_id FROM ojt_requirements_list as a 
                                                               left join `ojt_student_requirements`as b 
                                                               on a.id = b.requirement_id
                                                               where a.step = '".$ctr."'";
                                          $result = $conn->query($sql);
                                          if($result->num_rows > 0) {
                                              while($row = $result->fetch_assoc())
                                              {
                                                $rl_id=$row['id'];
                                                echo'
                                                  <input type="hidden" name="requirement_id'.$rl_id.'" value="'.$rl_id.'">
                                                  <input type="hidden" name="step" value="'.$ctr.'">
                                                  <ul>
                                                    <li>'
                                                      .$row['name'];
                                                    if($row['is_online'] == 1){
                                                      if(is_null($row['stud_id']) || $row['stud_id'] != $_SESSION['stud_id']){
                                                        echo '<input type="file" name="name'.$rl_id.'" class="pull-right" '.$disabled.'>';
                                                      }
                                                    }
                                                echo '</li>
                                                  </ul>';
                                              }
                                              echo '<br>
                                                    <button type="reset" class="btn btn-danger btn-xs pull-right"'.$disabled.'>Cancel</button>
                                                    <button type="submit" class="btn btn-primary btn-xs pull-right"'.$disabled.'>Submit</button>';
                                            }
                                          else{
                                              echo "No records found.";
                                            }
                                     ?>
                                </form>
                              </div>
                            </div>
                          </div>
                <?php         
                        } 
                ?>  
                <!--close loop-->

                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
               
                
                
                
                
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
<?php include('../includes/footer.php');?>