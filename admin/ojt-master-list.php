<?php
    $title = 'OJT Master List';
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
        OJT Master List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">OJT Master List</li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Photo</th>
          <th>Student ID</th>
          <th>Name</th>
          <th>Course and Section</th>
          <th>Email Adress</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>Photo here</td>
          <td>2013-000E1-00</td>
          <td>Walid Jamarin</td>
          <td>Bachelor of Science in Information Technology</td>
          <td>walidilaw@gmail.com</td>
        </tr>
        </tfoot>
      </table>

      <button class="btn btn-primary">Add new Student</button>
    </div>
    <!-- /.content -->
  </div>
<?php include('../includes/footer.php')?>