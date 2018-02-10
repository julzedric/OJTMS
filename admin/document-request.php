<?php
    $title = 'Document Request';
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
        Course Group
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Course Group</li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="box-body">
      <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Application Letter</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Monthly Report</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">DTR</a></li>
                <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Final Evaluation</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <table id="step1" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Walid A. Jamarin</td>
                            <td>
                                <button class="btn btn-primary btn-xs" title="Preview"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-success btn-xs" title="Approve"><i class="fa fa-thumbs-o-up"></i></button>
                                <button class="btn btn-danger btn-xs" title="Disapprove"><i class="fa fa-thumbs-o-down"></i></button>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <table id="step2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Walid A. Jamarin</td>
                            <td>
                                <button class="btn btn-primary btn-xs" title="Preview"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-success btn-xs" title="Approve"><i class="fa fa-thumbs-o-up"></i></button>
                                <button class="btn btn-danger btn-xs" title="Disapprove"><i class="fa fa-thumbs-o-down"></i></button>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    <table id="step3" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Walid A. Jamarin</td>
                            <td>
                                <button class="btn btn-primary btn-xs" title="Preview"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-success btn-xs" title="Approve"><i class="fa fa-thumbs-o-up"></i></button>
                                <button class="btn btn-danger btn-xs" title="Disapprove"><i class="fa fa-thumbs-o-down"></i></button>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_4">
                    <table id="step4" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Walid A. Jamarin</td>
                            <td>
                                <button class="btn btn-primary btn-xs" title="Preview"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-success btn-xs" title="Approve"><i class="fa fa-thumbs-o-up"></i></button>
                                <button class="btn btn-danger btn-xs" title="Disapprove"><i class="fa fa-thumbs-o-down"></i></button>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
    </div>
    <!-- /.content -->
  </div>
<?php include('../includes/footer.php')?>