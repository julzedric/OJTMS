<?php
    $title = 'Manage Students';
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
        Students
        <small>Vitas 7th Element</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li>Course Group</li>
        <li class="active">Manage Students</li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Studnet Number</th>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Email</th>
          <th>Birth Date</th>
          <th>Sex</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>2013-000E1-TG-0</td>
          <td>Jamarin</td>
          <td>Walid</td>
          <td>A</td>
          <td>walidilaw@gmai.com</td>
          <td>July 20, 1997</td>
          <td>Male</td>
          <td>
          <button class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></button>
          </td>
        </tr>
        </tfoot>
      </table>
      <button class="btn btn-primary">Add new Student</button>
    </div>
    <!-- /.content -->
  </div>
<?php include('../includes/footer.php')?>