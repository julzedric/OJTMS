<?php
$title = 'Recommendation Letter';
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
        <div class="loader" style="display: none"></div>

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Recommendation Letter
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li><a href="#">Recommendation Letter</a></li>
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
                                <th>Company Name</th>
                                <th>Supervisor</th>
                                <th>Supervisor Contact Number</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $results = getRecommendationLetter($conn);
                            foreach($results as $result) {
                                if ($result['course'] == 'BSAIT' && $result['status'] == 0) {
                                    ?>
                                    <tr>
                                        <td><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></td>
                                        <td><?php echo $result['company_name']; ?></td>
                                        <td><?php echo $result['supervisor_name']; ?></td>
                                        <td><?php echo $result['supervisor_contact']; ?></td>
                                        <td>
                                            <button class="btn btn-success btn-xs" title="Notify" onclick="notifyStudent(<?php echo $result['id'];?>)">
                                                <i class="fa fa-thumbs-o-up"></i> Notify Student</button>
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
                                <th>Company Name</th>
                                <th>Supervisor</th>
                                <th>Supervisor Contact Number</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            </tbody>
                            <?php $results = getRecommendationLetter($conn);
                            foreach($results as $result) {
                                if ($result['course'] == 'BSIM' && $result['status'] == 0) {
                                    ?>
                                    <tr>
                                        <td><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></td>
                                        <td><?php echo $result['company_name']; ?></td>
                                        <td><?php echo $result['supervisor_name']; ?></td>
                                        <td><?php echo $result['supervisor_contact']; ?></td>
                                        <td>
                                            <button class="btn btn-success btn-xs" title="Notify" onclick="notifyStudent(<?php echo $result['id'];?>)">
                                                <i class="fa fa-thumbs-o-up"></i> Notify Student</button>
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
        function notifyStudent(id){
            if(confirm("Notify Student?")){
                $.ajax({
                    type : "POST",
                    url : "../models/notifyStudent.php?id="+id,
                    data : {id : id},
                    beforeSend: function() {
                        $('.loader').show();
                    },
                    success: function(){
                        location.reload();
                    }
                });
            }
            return false;
        }
        function load_dataTable()
        {
            $('.table').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            });
        }
    </script>
    <?php include('../includes/footer.php')?>
</div>