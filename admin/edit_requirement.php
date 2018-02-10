<?php
    $title = 'Steps Requirement';
    require_once('../connection.php');
    include('../includes/header.php');
    if (!isset($_SESSION['username']) || $_SESSION['is_admin'] != '1'){
        header("location: ../index.php");
    }

    if($_GET['id']) {
      $id = $_GET['id'];

      $sql = "SELECT * FROM  ojt_requirements_list WHERE id = '".$id."'";
      $result = $conn->query($sql);

      $data = $result->fetch_assoc();

      $conn->close();
    }
?>
<div class="wrapper">

    <?php include('../includes/admin_subheader.php') ?>
    <?php include('../includes/admin_sidebar.php') ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Step Requirements
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Step Requirements</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="box-body">
        <div class="box box-primary">
            <div class="box-header with-border" >
                <h3 class="box-title">Edit Requirement</h3>
            </div>

            <div class="box-body padding-20">
                <form action="models/update_requirement.php" class="form-horizontal row-border" role="form" method="POST" id="ojtmsForm" enctype="multipart/form-data">
                    <input type="hidden" name="act" id="act" value="Edit">
                    <input type="hidden" name="id" id="id" value="<?php echo $data['id']?>">

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Name:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="name" name="name" class="form-control" value="<?php echo $data['name']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Description:</label>
                        </div>
                        <div class="col-md-6">
                            <textarea id="description" name="description" class="form-control"><?php echo $data['description']?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>File:</label>
                        </div>
                        <div class="col-md-6">
                            <?php 
                                $ext = pathinfo(strtolower($data['file']),PATHINFO_EXTENSION);

                                if($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg'){
                                    echo "<img src='../assets/uploads/requirements/".$data['file']."?>' class='margin-bottom-5' style='width: 120px; height: 100px;' alt='File'>";
                                    echo "<input type='hidden' id='old_file' name='old_file' value='".$data['file']."'>";
                                } elseif ($ext == 'pdf') {
                                    echo "<input type='text' id='old_file' name='old_file' value='".$data['file']."' class='form-control margin-bottom-5' disabled>";
                                }

                            ?>
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
    </div>
    <!-- /.content -->
  </div>

<script>
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
