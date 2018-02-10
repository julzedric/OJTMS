<?php
    $title = 'OJT Master List';
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
        OJT Master List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">OJT Master List</li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="box-body">
        <div class="box box-primary"> 
            <div class="box-header with-border" onclick="$('.filter').toggle();">
                <h3 class="box-title">Filter</h3>
            </div>

            <div class="box-body padding-20 filter" style="display:none">
                <form action="" class="form-horizontal row-border" role="form" method="POST" id="ojtmsForm" enctype="multipart/form-data">

                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Course:</label>
                        </div>
                        <div class="col-md-6">
                            <select class="s_ form-control" id="f_course" name="f_course" style="width: 100%;">
                                <option value="">--Select--</option>
                                <option value="BSIT">BSIT - Batchelor of Science in Inforation Technology</option>
                            </select>
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
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">OJT Master List</h3>
            </div>

            <div class="box-body padding-20">
                <table id="masterlist" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Email Adress</th>
                            <th style='text-align: center;'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT user_id, concat(firstname, ' ',IFNULL(middlename, ' '),' ',lastname ) as name, student_id, course, email from ojt_users";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc())
                                {
                                    echo "
                                        <tr>
                                            <td>".$row['student_id']."</td>
                                            <td>".$row['name']."</td>
                                            <td>".$row['course']."</td>
                                            <td>".$row['email']."</td>
                                            <td>
                                                <a href='#student_info' data-toggle='modal'><button type='button' class='btn btn-info btn-sm' title='View Profile'><i class='fa fa-eye'></i></button></a>
                                                <a href='#'><button type='button' class='btn btn-success btn-sm' title='Send Message'><i class='fa fa-envelope'></i></button></a></td>
                                        </tr>";
                                }

                            }
                        ?>
                        <!-- <tr>
                            <td>2013-000E1-00</td>
                            <td>Walid Jamarin</td>
                            <td>Bachelor of Science in Information Technology</td>
                            <td>walidilaw@gmail.com</td>
                            <td style='text-align: center;'>
                                <a href='#student_info' data-toggle="modal"><button type='button' class='btn btn-info btn-sm' title='View Profile'><i class='fa fa-eye'></i></button></a>
                                <a href='#'><button type='button' class='btn btn-success btn-sm' title='Send Message'><i class='fa fa-envelope'></i></button></a>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.content -->
  </div>

<!-- Modal 1 -->
<div class="portfolio-modal modal fade" id="student_info" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        
        <div class="modal-content">
            <form action="models/add_user.php" role="form" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4>Student Profile</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <!-- <div class="container"> -->
                
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="studentid" class="control-label">Student ID</label>
                                <input type="text" class="form-control" name="student_id" id="studentid" required="">
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="studentid" class="control-label">Course</label>
                                <input type="text" class="form-control" name="course" id="course" required="">
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="studentid" class="control-label">Semester</label>
                                <input type="text" class="form-control" name="semester" id="semester" required="">
                            </div>
                            <!-- <div class="form-group col-lg-2">
                            </div> -->
                            <div class="form-group col-lg-3">
                                <label for="studentid" class="control-label">Last Name</label>
                                <input type="text" class="form-control" name="lastname" id="lastname" required="">
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="studentid" class="control-label">First Name</label>
                                <input type="text" class="form-control" name="firstname" id="firstname" required="">
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="studentid" class="control-label">Middle Name</label>
                                <input type="text" class="form-control" name="middlename" id="middlename" required="">
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="studentid" class="control-label">Suffix</label>
                                <input type="text" class="form-control" name="suffix" id="suffix" required="">
                            </div>
                            <div class="form-group col-lg-5">
                                <label for="email" class="control-label">EMAIL</label>
                                <input type="email" class="form-control" name="email" id="email" required="">
                            </div>
                            <div class="form-group col-lg-5">
                                <label for="birthdate" class="control-label">BIRTH DATE</label>
                                <input type="date" class="form-control" name="birthdate" id="birthdate" required="">
                            </div>
                            <div class="form-group col-lg-2"> 
                                <label for="gender" class="control-label">GENDER</label>
                                <select class="form-control" name="gender" id="gender" >
                                    <option value="MALE">MALE</option>
                                    <option value="FEMALE">FEMALE</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="street" class="control-label">STREET</label>
                                <input type="text" class="form-control" placeholder="Block No. / House No. / Street" name="street" id="street">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="barangay" class="control-label">BARANGAY</label>
                                <input type="text" class="form-control" name="barangay" id="barangay">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="city" class="control-label">CITY</label>
                                <input type="text" class="form-control" name="city" id="city">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="province" class="control-label">PROVINCE</label>
                                <input type="text" class="form-control" name="province" id="province">
                            </div>
                        </div>
                  
                    <!-- </div> -->
                </div>
                <div class="modal-footer">
                      <div class="col-lg-12">
                        <div class="pull-right">
                          <button type="submit" class="btn btn-primary">Register</button>
                          <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                </div>
            </form>
        </div>
        
    </div>
</div>
<?php include('../includes/footer.php')?>