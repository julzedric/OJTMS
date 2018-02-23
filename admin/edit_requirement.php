<?php
    $title = 'Requirements';
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Requirements</a></li>
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
                            <select class="form-control" id="name" name="name">
                                <?php
                                    if($data['name'] == 'Application Letter'){
                                        echo '<option value="">--Select--</option>
                                            <option value="Application Letter" selected="">Application Letter</option>
                                            <option value="DTR">DTR</option>
                                            <option value="Final Evaluation">Final Evaluation</option>
                                            <option value="Monthly Report">Monthly Report</option>
                                            <option value="Others">Others</option>';
                                    } else if($data['name'] == 'DTR'){
                                         echo '<option value="">--Select--</option>
                                            <option value="Application Letter">Application Letter</option>
                                            <option value="DTR" selected="">DTR</option>
                                            <option value="Final Evaluation">Final Evaluation</option>
                                            <option value="Monthly Report">Monthly Report</option>
                                            <option value="Others">Others</option>';
                                    } else if($data['name'] == 'Final Evaluation') {
                                        echo '<option value="">--Select--</option>
                                            <option value="Application Letter">Application Letter</option>
                                            <option value="DTR">DTR</option>
                                            <option value="Final Evaluation" selected="">Final Evaluation</option>
                                            <option value="Monthly Report">Monthly Report</option>
                                            <option value="Others">Others</option>';
                                    } else if($data['name'] == 'Monthly Report') {
                                        echo '<option value="">--Select--</option>
                                            <option value="Application Letter">Application Letter</option>
                                            <option value="DTR">DTR</option>
                                            <option value="Final Evaluation">Final Evaluation</option>
                                            <option value="Monthly Report" selected="">Monthly Report</option>
                                            <option value="Others">Others</option>';
                                    }else {
                                        echo '<option value="">--Select--</option>
                                            <option value="Application Letter">Application Letter</option>
                                            <option value="DTR">DTR</option>
                                            <option value="Final Evaluation">Final Evaluation</option>
                                            <option value="Monthly Report" selected="">Monthly Report</option>
                                            <option value="Others" selected="">Others</option><br/>
                                            <input type="text" class="form-control" name ="others" id="others" placeholder="Other Requirement" value="'.$data['name'].'">
                                            ';
                                    }
                                ?>
                            </select>
                            <br/>
                            <input type="text" class="form-control" name ="others" id="others" placeholder="Other Requirement" style="display: none">
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
                                    echo "<img src='../assets/uploads/requirements/".$data['file']."?>' class='margin-bottom-5' style='width: 140px; height: 120px;' alt='File'>";
                                    echo "<input type='hidden' id='old_file' name='old_file' value='".$data['file']."'>";
                                } elseif ($ext == 'pdf' || $ext == 'docx' || $ext == 'xlsx') {
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
                                <?php
                                    if($data['type'] == 0){
                                        echo "<option value='0' selected='true'>Downloadable</option>
                                            <option value='1'>Steps Requirement</option>";
                                    } else {
                                        echo "<option value='0'>Downloadable</option>
                                            <option value='1' selected='true'>Steps Requirement</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div id="steps" style="display: none;"> 
                        <div class="form-group">
                            <div class="col-md-2">
                                <label>Steps</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" id="step" name="step">
                                    <?php
                                        if($data['step'] == 1){
                                            echo "<option value=''>--Select--</option>
                                                <option value='1' selected='true'>Step 1</option>
                                                <option value='2'>Step 2</option>
                                                <option value='3'>Step 3</option>
                                                <option value='4'>Step 4</option>";
                                        } elseif($data['step'] == 2) {
                                            echo "<option value=''>--Select--</option>
                                                <option value='1'>Step 1</option>
                                                <option value='2' selected='true'>Step 2</option>
                                                <option value='3'>Step 3</option>
                                                <option value='4'>Step 4</option>";
                                        } elseif($data['step'] == 3){
                                            echo "<option value=''>--Select--</option>
                                                <option value='1'>Step 1</option>
                                                <option value='2'>Step 2</option>
                                                <option value='3' selected='true'>Step 3</option>
                                                <option value='4'>Step 4</option>";
                                        } elseif($data['step'] == 4){
                                            echo "<option value=''>--Select--</option>
                                                <option value='1'>Step 1</option>
                                                <option value='2'>Step 2</option>
                                                <option value='3'>Step 3</option>
                                                <option value='4' selected='true'>Step 4</option>";
                                        } else {
                                            echo "<option value=''>--Select--</option>
                                                <option value='1'>Step 1</option>
                                                <option value='2'>Step 2</option>
                                                <option value='3'>Step 3</option>
                                                <option value='4'>Step 4</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <label>Submission Mode:</label>
                            </div>
                            <div class="col-md-6">
                                <?php
                                    if($data['is_online'] == 0 && $data['is_online'] != '') {
                                        echo "<input type='radio' name='mode' id='personal' value='0' checked='true'> Personal&emsp;
                                        <input type='radio' name='mode' id='online' value='1'> Online";
                                    } else if($data['is_online'] == 1) {
                                        echo "<input type='radio' name='mode' id='personal' value='0'> Personal&emsp;
                                        <input type='radio' name='mode' id='online' value='1' checked='true'> Online";
                                    } else {
                                        echo "<input type='radio' name='mode' id='personal' value='0'> Personal&emsp;
                                        <input type='radio' name='mode' id='online' value='1'   > Online";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group margin-bottom-0">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div id="message"></div>
                            <div id="actionButtons" class="pull-right">
                                <a href="requirements.php" id="btn_cancel" class="btn btn-squared btn-default btn-o">
                                    Cancel
                                </a>
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
            $("#steps").slideDown();
        } else {
            $("#steps").slideUp();
            $("#step").val('');
            $("input:radio[name=mode]").prop('checked', false);
        }
    }
</script>
<?php include('../includes/footer.php')?>
