<?php
    $title = 'Requirements';
    require_once('../connection.php');
    include('../includes/header.php');
    if (!isset($_SESSION['username']) || $_SESSION['is_admin'] != '1'){
        header("location: ../index.php");
    }
?>
<div class="wrapper">

    <?php include('../includes/admin_subheader.php') ?>
    <?php include('../includes/admin_sidebar.php') ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Requirements
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Requirements</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="box-body">
        <div class="margin-bottom-20">
            <button class="btn btn-primary" onclick="view_form();">Add New Requirement</button>
            <button class="btn btn-primary" onclick="view_form2();">Add Hours Required</button>
        </div>

        <div class="box box-primary collapse" style="display: hidden;"> 
            <div class="box-header with-border">
                <h3 class="box-title">Add Requirement Form</h3>
            </div>
            <div class="box-body padding-20">
                <form action="models/create_requirement.php" class="form-horizontal row-border" role="form" method="POST" id="ojtmsForm" enctype="multipart/form-data">
                    <input type="hidden" name="act" id="act">
                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Name:</label>
                        </div>
                        <div class="col-md-6">
                             <select class="form-control" id="name" name="name">
                                <option value="">--Select--</option>
                                <option value="Acceptance Letter">Acceptance Letter</option>
                                <option value="Application Letter">Application Letter</option>
                                <option value="DTR">DTR</option>
                                <option value="Final Evaluation">Final Evaluation</option>
                                <option value="Monthly Report">Monthly Report</option>
                                <option value="OJT Certificate">OJT Certificate</option>
                                <option value="Recommendation Request">Recommendation Request</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Description:</label>
                        </div>
                        <div class="col-md-6">
                            <textarea id="description" name="description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>File:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="file" id="file" name="file" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Type:</label>
                        </div>
                        <div class="col-md-6">  
                            <select class="form-control" id="type" name="type" onchange="show_step($(this).val())">
                                <option value="">--Select--</option>
                                <option value="0">Downloadable</option>
                                <option value="1">Steps Requirement</option>
                            </select>
                        </div>
                    </div>
                    <div id="steps" style="display: none;"> 
                        <div class="form-group">
                            <div class="col-md-2">
                                <label>Steps:</label>
                            </div>
                            <div class="col-md-6">  
                                <select class="form-control" id="step" name="step">
                                    <option value="">--Select--</option>
                                    <option value="1">Step 1</option>
                                    <option value="2">Step 2</option>
                                    <option value="3">Step 3</option>
                                    <option value="4">Step 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="submission_mode">
                            <div class="col-md-2">
                                <label>Submission Mode:</label>
                            </div>
                            <div class="col-md-6">
                                <input type="radio" name="mode" id="personal" value="0"> Personal&emsp;
                                <input type="radio" name="mode" id="online" value="1"> Online
                            </div>
                        </div>
                    </div>
                    <div class="form-group margin-bottom-0">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div id="message"></div> 
                            <div id="actionButtons" class="pull-right">
                                <button type="reset" id="btn_cancel" onclick="clearfield()" class="btn btn-squared btn-default btn-o">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-squared btn-primary" id="btnSubmit">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="box box-primary collapse2" style="display: none;"> 
            <div class="box-header with-border">
                <h3 class="box-title">Add Hours Required</h3>
            </div>
            <div class="box-body padding-20">
                <form action="models/create_total_hours.php" class="form-horizontal row-border" role="form" method="POST" id="ojtmsForm" enctype="multipart/form-data">
                    <input type="hidden" name="act" id="act">
                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>School Year:</label>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-5">
                                <select class="form-control" id="school_year_1" name="school_year_1">
                                    <?php
                                        $currently_selected = date('Y');
                                        $earliest_year = 1950;
                                        $latest_year = date('Y') + 2;

                                        foreach( range( $latest_year, $earliest_year ) as $i ) {
                                            print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                        }   
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-2" style="text-align: center;">
                                <label>To</label>
                            </div>
                            <div class="col-md-5">
                                <select class="form-control" id="school_year_2" name="school_year_2">
                                    <?php
                                        $currently_selected = date('Y');
                                        $earliest_year = 1950;
                                        $latest_year = date('Y') + 2;

                                        foreach( range( $latest_year, $earliest_year ) as $i ) {
                                            print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                        }   
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Semester:</label>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" id="semester" name="semester">
                                <option value="">--Select--</option>
                                <option value="1">First</option>
                                <option value="2">Second</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Course:</label>
                        </div>
                        <div class="col-md-6">  
                            <select class="form-control" id="course" name="course">
                                <option value="">--Select--</option>
                                <option value="BSIM">BSIM</option>
                                <option value="BSAIT">BSAIT</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Total Hours:</label>
                        </div>
                        <div class="col-md-6">  
                            <input type="text" id="total_hours" name="total_hours" class="form-control">
                        </div>
                    </div>
                    <div class="form-group margin-bottom-0">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div id="message"></div> 
                            <div id="actionButtons" class="pull-right">
                                <button type="reset" id="btn_cancel" onclick="clearfield2()" class="btn btn-squared btn-default btn-o">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-squared btn-primary" id="btnSubmit">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Requirement List</h3>
            </div>

            <div class="box-body padding-20">
                <table id="requirements-request" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>File Name</th>
                            <th style='width: 10%'>Type</th>
                            <th style='width: 10%'>Step</th>
                            <th style='width: 10%'>Mode</th>
                            <th style='width: 20%; text-align: center;'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM ojt_requirements_list ORDER BY id DESC";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc())
                                {
                                    echo "
                                        <tr>
                                            <td>".$row['name']."</td>
                                            <td>".$row['description']."</td>
                                            <td>".$row['file']."</td>
                                            <td>";
                                                if($row['type'] == 0)
                                                {
                                                    echo "Downloadble";
                                                }else{
                                                    echo "Steps Requirement";
                                                }
                                    echo    "</td>
                                            <td>";
                                                if($row['type'] == 1){
                                                    if($row['step'] == 1){
                                                        echo "Step 1";
                                                    } elseif($row['step'] == 2){
                                                        echo "Step 2";
                                                    } elseif($row['step'] == 3){
                                                        echo "Step 3";
                                                    }  elseif($row['step'] == 4 ){
                                                        echo "Step 4 ";
                                                    }
                                                }
                                    echo    "</td>
                                            <td>";
                                                if($row['is_online'] == 0)
                                                {
                                                    echo "Personal";
                                                }else{
                                                    echo "Online";
                                                }
                                    echo    "</td>
                                            <td style='width:20%; text-align: center;'>";
                                            $file = "../assets/uploads/requirements/".$row['file'];
                                            if($row['file'] == '')
                                            {
                                                echo "<button type='button' class='btn btn-info btn-sm disabled' title='View'>
                                                        <i class='fa fa-eye'></i>
                                                    </button>
                                                    <a href='edit_requirement.php?id=".$row['id']."'>
                                                        <button type='button' class='btn btn-primary btn-sm' title='Edit'>
                                                            <i class='fa fa-pencil'></i>
                                                        </button>
                                                    </a>
                                                    <a href='models/remove_requirement.php?id=".$row['id']."'>
                                                        <button type='button' class='btn btn-danger btn-sm' title='Remove'>
                                                        <i class='fa fa-trash'></i>
                                                        </button>
                                                    </a>
                                                    <button type='button' class='btn btn-success btn-sm disabled' title='Download'>
                                                        <i class='fa fa-download'></i>
                                                    </button>";
                                            } else {
                                                echo "<a href='".$file."' target='_new'>
                                                        <button type='button' class='btn btn-info btn-sm' title='View'>
                                                            <i class='fa fa-eye'></i>
                                                        </button>
                                                    </a>
                                                    <a href='edit_requirement.php?id=".$row['id']."'>
                                                        <button type='button' class='btn btn-primary btn-sm' title='Edit'>
                                                            <i class='fa fa-pencil'></i>
                                                        </button>
                                                    </a>
                                                    <a href='models/remove_requirement.php?id=".$row['id']."'>
                                                        <button type='button' class='btn btn-danger btn-sm' title='Remove'>
                                                        <i class='fa fa-trash'></i>
                                                        </button>
                                                    </a>
                                                    <a href='".$file."'>
                                                        <button type='button' class='btn btn-success btn-sm' title='Download'>
                                                        <i class='fa fa-download'></i>
                                                        </button>
                                                    </a>";
                                            }
                                    echo    "</td>
                                        </tr>";
                                }

                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Total Hours List</h3>
            </div>

            <div class="box-body padding-20">
                <table id="requirements-request" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>School Year</th>
                            <th>Semester</th>
                            <th>Course</th>
                            <th>Total Hours</th>
                            <th style='width: 20%; text-align: center;'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM ojt_total_hours ORDER BY id DESC";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc())
                                {
                                    echo "
                                        <tr>
                                            <td>".$row['school_year']."</td>
                                            <td>".$row['semester']."</td>
                                            <td>".$row['course']."</td>
                                            <td>".$row['total_hours']."</td>
                                            <td style='width:20%; text-align: center;'>
                                                    <a href='edit_total_hours.php?id=".$row['id']."'>
                                                        <button type='button' class='btn btn-primary btn-sm' title='Edit'>
                                                            <i class='fa fa-pencil'></i>
                                                        </button>
                                                    </a>
                                                    <a href='models/remove_total_hours.php?id=".$row['id']."'>
                                                        <button type='button' class='btn btn-danger btn-sm' title='Remove'>
                                                        <i class='fa fa-trash'></i>
                                                        </button>
                                                    </a>
                                            </td>
                                        </tr>";
                                }

                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.content -->
  </div>

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
    function view_form() {
        $(".collapse").slideDown();
    }

    function view_form2() {
        $(".collapse2").slideDown();
    }

    function clearfield() {
        $("#name").val("");
        $("#description").val("");
        $("#file").val("");
        $(".downloadable").val("");
        $(".collapse").slideUp();
    }

    function clearfield2() {
        $("#school_year").val("");
        $("#semester").val("");
        $("#course").val("");
        $(".total_hours").val("");
        $(".collapse2").slideUp();
    }

    function show_step(value){
        if (value == 1) {
            $("#steps").slideDown();
        } else {
            $("#steps").slideUp();
            $("#step").val('');
        }
    }

    function stud_req(id)
    {
        alert(id);
    }
</script>
<?php include('../includes/footer.php')?>