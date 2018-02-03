<?php
    $title = 'Step Requirements';
    require_once('../connection.php');
    include('../includes/header.php');
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
     <table id="requirements-request" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Date</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>Recommendation Letter</td>
          <td>
          <button class="btn btn-primary btn-xs">Preview</button>
          <button class="btn btn-success btn-xs">Download</button>
          </td>
        </tr>
        </tfoot>
      </table>
      <button class="btn btn-primary">Add new Requirement</button>
    </div>
    <!-- /.content -->
  </div>
<?php include('../includes/footer.php')?>