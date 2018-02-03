<?php
    $title = 'Course Group';
    require_once('../connection.php');
    include('../includes/header.php');
?>
<div class="wrapper">

    <?php include('../includes/admin_sidebar.php') ?>
    <?php include('../includes/admin_subheader.php') ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Course Group
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Course Group</li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>School Year (SY)</th>
          <th>Semester</th>
          <th>Group Name</th>
          <th>Remarks</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>SY: 2016 - 2017</td>
          <td>1st Semester</td>
          <td>Vtas 7th Element</td>
          <td>BSIT Group 1</td>
          <td>
          <button class="btn btn-primary btn-xs"><a href="manage-student.html" style="color:#fff;">Manage</button>
          <button class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></button>
          </td>
        </tr>
        </tfoot>
      </table>
      <button class="btn btn-primary">Add new Group</button>
    </div>
    <!-- /.content -->
  </div>
<?php include('../includes/footer.php')?>