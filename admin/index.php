<?php
    $title = 'Admin';
    require_once('../connection.php');
    include('../includes/header.php');
    if (!isset($_SESSION['username']) || $_SESSION['username'] != 'admin'){
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
        Administrator
        <small>Homepage <?php echo 'session name '.$_SESSION['username']; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="box-body">
    <h3>Requirments Request</h3>
     <table id="requirements-request" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Date Submitted</th>
          <th>Requirements</th>
          <th>Submitted By</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>Jan 20, 2018</td>
          <td>Application Letter</td>
          <td>Asisa Jam</td>
          <td>
          <button class="btn btn-primary btn-xs">Preview</button>
          <button class="btn btn-success btn-xs">Approve</button>
          <button class="btn btn-danger btn-xs">Disapprove</button>
          </td>
        </tr>
        <tr>
          <td>Jan 19, 2018</td>
          <td>Application Letter</td>
          <td>Jhulie Ann</td>
          <td>
          <button class="btn btn-primary btn-xs">Preview</button>
          <button class="btn btn-success btn-xs">Approve</button>
          <button class="btn btn-danger btn-xs">Disapprove</button>
          </td>
        </tr>
        </tfoot>
      </table>
      <hr>
      <h3>Registration Request</h3>
      <table id="registration-request" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Date</th>
          <th>Name</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>Jan 20, 2018</td>
          <td>Walid Jam</td>
          <td>
          <button class="btn btn-success btn-xs">Approve</button>
          </td>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.content -->
  </div>
<?php include('../includes/footer.php')?>