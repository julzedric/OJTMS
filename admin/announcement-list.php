<?php
    $title = 'Announcement List';
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
        Announcements
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Announcement List</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="box-body">
        <div class="margin-bottom-20">
            <button class="btn btn-primary" onclick="view_form();">Add New Announcement</button>
        </div>

        <div class="box box-primary collapse" style="display: hidden;"> 
             <div class="box-header with-border">
                <h3 class="box-title">Add Announcement Form</h3>
            </div>

            <div class="box-body padding-20">
                <form action="models/create_announcement.php" class="form-horizontal row-border" role="form" method="POST" id="ojtmsForm" enctype="multipart/form-data">
                    <input type="hidden" name="act" id="act">
                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Date From:</label>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right datepicker" name="date_from" id="date_from">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Date To:</label>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right datepicker" name="date_to" id="date_to">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Title:</label>
                        </div>
                        <div class="col-md-6">
                            <textarea name="title" id="title" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Announcement:</label>
                        </div>
                        <div class="col-md-6">
                            <textarea name="announcement" id="announcement" class="form-control" rows="7"></textarea>
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

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Announcement List</h3>
            </div>

            <div class="box-body padding-20">
                <table id="announcement-list" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Title</th>
                          <th>Announcement</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM ojt_announcements";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc())
                                {
                                    echo "
                                        <tr>
                                            <td>".$row['start_date']."</td>
                                            <td>".$row['end_date']."</td>
                                            <td>".$row['title']."</td>
                                            <td>".$row['announcements']."</td>
                                            <td style='text-align: center;'>
                                            <a href='edit_announcement.php?id=".$row['id']."'><button type='button' class='btn btn-primary btn-sm' title='Edit'><i class='fa fa-pencil'></i></button></a>
                                            <a href='models/remove_announcement.php?id=".$row['id']."'><button type='button' class='btn btn-danger btn-sm' title='Remove'><i class='fa fa-trash'></i></button></a>
                                            </td>
                                        </tr>";
                                }

                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
      <!-- <button class="btn btn-primary">Add new Announcement</button> -->
    </div>
    <!-- /.content -->
  </div>

<script>
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
    function view_form() {
        $(".collapse").slideDown();
    }

    function clearfield() {
        $("#title").val("");
        $("#announcement").val("");
        $(".collapse").slideUp();
    }
    function delete_(id){
        var conf= confirm("Are you sure?");
        if(conf == true){
            window.location.href = 'http://ojtms.x10host.com/admin/models/remove-requirement.php?id='+id;
        }
    } 
</script>
<?php include('../includes/footer.php')?>