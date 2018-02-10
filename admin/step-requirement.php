<?php
    $title = 'Steps Requirement';
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
            <button class="btn btn-primary" onclick="view_form();">Add new Requirement</button>
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
                            <input type="text" id="name" name="name" class="form-control">
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
                            <label>Type</label>
                        </div>
                        <div class="col-md-6">  
                            <select class="form-control" id="type" name="type" onchange="show_step($(this).val())">
                                <option value="0">Downloadable</option>
                                <option value="1">Steps Requirement</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="steps" style="display: none;">
                        <div class="col-md-2">
                            <label>Steps</label>
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
                            <th style='width: 15%'>Type</th>
                            <th style='text-align: center;'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM ojt_requirements_list";
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
                                            <td style='text-align: center;'>
                                                <a href='../assets/uploads/requirements/".$row['file']."' target='_new'><button type='button' class='btn btn-info btn-sm' title='View'><i class='fa fa-eye'></i></button></a>
                                                <a href='edit_requirement.php?id=".$row['id']."'><button type='button' class='btn btn-primary btn-sm' title='Edit'><i class='fa fa-pencil'></i></button></a>
                                                <a href='models/remove_requirement.php?id=".$row['id']."'><button type='button' class='btn btn-danger btn-sm' title='Remove'><i class='fa fa-trash'></i></button>
                                                <a href=''><button type='button' class='btn btn-success btn-sm' title='Download'><i class='fa fa-download'></i></button></a>
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
    function view_form() {
        $(".collapse").slideDown();
    }

    function clearfield() {
        $("#name").val("");
        $("#description").val("");
        $("#file").val("");
        $(".downloadable").val("");
        $(".collapse").slideUp();
    }
    function delete_(id){
        $.ajax({
            url: "models/remove_requirement.php",
            type: 'POST',
            data: {
                    a_delete: true,
                    id : id
            },
            dataType: 'json',
            success: function(data)
            {
                if(data == 'Success') {
                    alert('Success!');
                } else if(data == 'Error'){
                    alert('Please try again.');
                }
            },
            error: function(data)
            {
                alert('Please try again. lol');
            }

        });
    }

    function show_step(value){
        if (value == 1) {
            $("#steps").show();
        } else {
            $("#steps").hide();
            $("#step").val('');
        }
    }
</script>
<?php include('../includes/footer.php')?>