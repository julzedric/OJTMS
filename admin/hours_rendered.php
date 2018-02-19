<?php
$title = 'Hours Rendered';
require_once('../connection.php');
include('../includes/header.php');
include('../models/functions.php');
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
                Hours Rendered
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li><a href="#">Hours Rendered</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <div class="box-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">BSAIT</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">BSIM</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <table id="step1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Document Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $results = getHoursRendered($conn);
                            foreach($results as $result) {
                               $file = "../assets/uploads/dtr/" . $result['dtr'];
                               if ($result['course'] == 'BSAIT' && $result['status'] == 0) {
                                   ?>
                                   <tr>
                                       <td><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></td>
                                       <td><?php echo $result['dtr']; ?></td>
                                       <td>
                                           <a href="<?php echo $file; ?>" target='_new'>
                                               <button class="btn btn-primary btn-xs" title="Preview"><i
                                                       class="fa fa-eye"></i></button>
                                           </a>
                                           <a href="../models/approveDTR.php?id=<?php echo $result['id']; ?>">
                                               <button class="btn btn-success btn-xs" title="Approve"><i
                                                       class="fa fa-thumbs-o-up"></i></button>
                                           </a>
                                           <button class="btn btn-danger btn-xs" title="Reject"
                                                   onclick="rejectDTR(<?php echo $result['id']; ?>)"><i
                                                   class="fa fa-thumbs-o-down"></i></button>
                                       </td>
                                   </tr>
                                   <?php
                               }
                           }?>
                            </tbody>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <table id="step2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Document Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            </tbody>
                            <?php $results = getHoursRendered($conn);
                            foreach($results as $result) {
                                $file = "../assets/uploads/dtr/" . $result['dtr'];
                                if ($result['course'] == 'BSIM' && $result['status'] == 0) {
                                    ?>
                                    <tr>
                                        <td><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></td>
                                        <td><?php echo $result['dtr']; ?></td>
                                        <td>
                                            <a href="<?php echo $file; ?>" target='_new'>
                                                <button class="btn btn-primary btn-xs" title="Preview"><i
                                                        class="fa fa-eye"></i></button>
                                            </a>
                                            <a href="../models/approveDTR.php?id=<?php echo $result['id']; ?>">
                                                <button class="btn btn-success btn-xs" title="Approve"><i
                                                        class="fa fa-thumbs-o-up"></i></button>
                                            </a>
                                            <button class="btn btn-danger btn-xs" title="Reject"
                                                    onclick="rejectDTR(<?php echo $result['id']; ?>)"><i
                                                    class="fa fa-thumbs-o-down"></i></button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }?>
                            <tbody>

                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div>
        </div>

        <!-- /.content -->
    </div>
    <script>
        function rejectDTR(id){
            if(confirm("Are you sure you want to delete this Record?")){
                $.ajax({
                    type : "DELETE",
                    url : "../models/rejectDTR.php?id="+id,
                    data : {id : id},
                    success: function(){
                        location.reload();
                    }
                });
            }
            return false;
        }
    </script>
    <?php include('../includes/footer.php')?>
</div>