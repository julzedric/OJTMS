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
                            <input type="file" id="file" name="file" class="form-control" value="<?php echo $data['file']?>">
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="col-md-2">
                            <label>Downloadable?</label>
                        </div>
                        <div class="col-md-6"> 
                            <?php
                              if ($data['is_downloadable'] == 0) {
                                echo '<input type="radio" id="yes" name="downloadable" value="0" checked="true"> Yes&nbsp;
                                      <input type="radio" id="no" name="downloadable" value="1"> No';
                              } elseif($data['is_downloadable'] == 1) {
                                echo '<input type="radio" id="yes" name="downloadable" value="0"> Yes&nbsp;
                                      <input type="radio" id="no" name="downloadable" value="1" checked="true"> No';
                              }
                            ?>
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
<?php include('../includes/footer.php')?>
