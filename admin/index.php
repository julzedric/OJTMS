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
            <div class="box-header with-border">
                <h3 class="box-title">Filter</h3>
            </div>

            <div class="box-body padding-20 filter">
                <!-- <form action="" class="form-horizontal row-border" role="form" method="POST" id="ojtmsForm" enctype="multipart/form-data"> -->
                    <div class="col-md-12">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <div class="col-md-2">
                                    <label>By Course:</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="s_ form-control" id="f_course" name="f_course" onchange="filter_($(this).val())" style="width: 100%;">
                                        <option value="All">All Courses</option>
                                        <option value="BSIM">BSIM</option>
                                        <option value="BSAIT ">BSAIT</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group margin-bottom-0">
                        <div class="col-sm-offset-3 col-sm-4">
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
                    </div> -->
                <!-- </form> -->
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

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.content -->
  </div>

<!-- Modal 1 -->
<div class="modal fade" id="student_info" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        
        <div class="modal-content">
            <form action="models/add_user.php" role="form" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Student Profile</h4>
                </div>

                <div class="modal-body">
                    <!-- <div class="container"> -->
                
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <div class="col-lg-2">
                                    <label for="profile_pic" class="control-label">Profile Picture</label>
                                </div>
                                <div class="col-lg-5">
                                    <img src="" id="profile_pic" style='width: 120px; height: 120px;'>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="student_id" class="control-label">Student ID</label>
                                <input type="text" class="form-control" name="student_id" id="student_id" disabled="">
                            </div>
                            <div class="col-lg-12">
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="lastname" class="control-label">Last Name</label>
                                <input type="text" class="form-control" name="lastname" id="lastname" disabled="">
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="firstname" class="control-label">First Name</label>
                                <input type="text" class="form-control" name="firstname" id="firstname" disabled="">
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="middlename" class="control-label">Middle Name</label>
                                <input type="text" class="form-control" name="middlename" id="middlename" disabled="">
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="suffix" class="control-label">Suffix</label>
                                <input type="text" class="form-control" name="suffix" id="suffix" disabled="">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="course" class="control-label">Course</label>
                                <input type="text" class="form-control" name="course" id="course" disabled="">
                            </div>
                            <div class="form-group col-lg-5">
                                <label for="birthdate" class="control-label">BIRTH DATE</label>
                                <input type="date" class="form-control" name="birthdate" id="birthdate" disabled="">
                            </div>
                            <div class="form-group col-lg-3"> 
                                <label for="gender" class="control-label">GENDER</label>
                                <select class="form-control" name="gender" id="gender"  disabled="">
                                    <option value="MALE">MALE</option>
                                    <option value="FEMALE">FEMALE</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-5">
                                <label for="contact_number" class="control-label">Contact No.</label>
                                <input type="contact_number" class="form-control" name="contact_number" id="contact_number" disabled="">
                            </div>
                            <div class="form-group col-lg-5">
                                <label for="email" class="control-label">EMAIL</label>
                                <input type="email" class="form-control" name="email" id="email" disabled="">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="street" class="control-label">STREET</label>
                                <input type="text" class="form-control" placeholder="Block No. / House No. / Street" name="street" id="street" disabled="">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="barangay" class="control-label">BARANGAY</label>
                                <input type="text" class="form-control" name="barangay" id="barangay" disabled="">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="city" class="control-label">CITY</label>
                                <input type="text" class="form-control" name="city" id="city" disabled="">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="province" class="control-label">PROVINCE</label>
                                <input type="text" class="form-control" name="province" id="province" disabled="">
                            </div>
                        </div>
                  
                    <!-- </div> -->
                </div>
                <div class="modal-footer">
                      <div class="col-lg-12">
                        <div class="pull-right">
                          <!-- <button type="submit" class="btn btn-primary">Register</button> -->
                          <button class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                </div>
            </form>
        </div>
        
    </div>
</div>

<!-- Modal 2 -->
<div class="modal fade" id="student_progress" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        
        <div class="modal-content">
            <form action="models/add_user.php" role="form" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Student Requirements Status</h4>
                </div>

                <div class="modal-body">

                </div>
                <div class="modal-footer">
                      <div class="col-lg-12">
                        <div class="pull-right">
                          <!-- <button type="submit" class="btn btn-primary">Register</button> -->
                          <button class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                </div>
            </form>
        </div>
        
    </div>
</div>

<script>
    function load_dataTable() {
        $('#masterlist').dataTable().fnClearTable();
        $('#masterlist').dataTable().fnDraw();
        $('#masterlist').dataTable().fnDestroy();
        $('#masterlist').dataTable({
          "sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
            "order": [[ 1, "desc" ]],
            "sPaginationType": "full_numbers",
            "oLanguage": {
                "sLengthMenu": "Show _MENU_ entries",
                "sSearch": "Search: "
            },
            "processing": true,
            "serverSide": false,
            "sAjaxSource": "models/load_student.php"+"?loadstudent=true",
            "aoColumns" : [ { sWidth: "20%" }, { sWidth: "30%" }, { sWidth: "20%" }, { sWidth: "10%" }, { sWidth: "20%" }],
            "deferLoading": 10,
            "fnInitComplete": function() { 
                $('[data-toggle="tooltip"]').tooltip();
              }
        });
    }

    function view_(id)
    {

        $.ajax({
            type: "POST",
            url: "models/load_student.php",
            dataType: "json",
            data: {
                a_get: true,
                id : id
            },
            success: function(data)
            {
               $('#student_info').modal('show');
               $("#student_id").val(data[0][1]);
               $("#lastname").val(data[0][2]);
               $("#firstname").val(data[0][3]);
               $("#middlename").val(data[0][4]);
               $("#suffix").val(data[0][5]);
               $("#course").val(data[0][6]);
               $("#birthdate").val(data[0][7]);
               $("#gender").val(data[0][8]);
               $("#contact_number").val(data[0][9]);
               $("#email").val(data[0][10]);
               $("#street").val(data[0][11]);
               $("#barangay").val(data[0][12]);
               $("#city").val(data[0][13]);
               $("#province").val(data[0][14]);

               var prof_pic = "../assets/uploads/profile_picture/"+data[0][15];                    

                if(data[0][15] == null || data[0][15] == ""){
                    $('#profile_pic').attr("src","../assets/images/noprofilepic.png");
                    
                }else{
                    $('#profile_pic').attr("src",prof_pic);             
                }


            },
            error: function(data)
            {
                alert("Error");
            }

        });
    }

    function delete_(id,name)
    {
        swal({
                title: "Confirmation",
                text: "Are you sure want to remove this student ?",
                type: "error",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if(isConfirm) {
                    $.ajax({
                        type : "POST",
                        url : "models/remove_student.php",
                        dataType : 'json',
                        data : {id : id},
                        success : function(data){                           
                            if(data == 'Success'){
                                swal("Removed!", "Successfully Removed.", "success");
                                load_dataTable();
                            }
                            else if (data == 'Error'){
                                alerts('Please check your submitted form.');
                            }
                        },
                        error : function(data){
                            alerts('Please try again.');
                        }
                    });
                } else {
                    swal("Cancelled", "Cancelled.", "error");
                }
            });
            swal.preventDefault
    }

    function filter_(course){

        if(course == 'All')
        {
            load_dataTable();
        } else {
            $('#masterlist').dataTable().fnClearTable();
            $('#masterlist').dataTable().fnDraw();
            $('#masterlist').dataTable().fnDestroy();
            $('#masterlist').dataTable({
              "sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
                "order": [[ 1, "desc" ]],
                "sPaginationType": "full_numbers",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page",
                    "sSearch": "Search: "
                },
                "processing": true,
                "serverSide": false,
                "sAjaxSource": "models/load_student.php"+"?get_student=true&"+"course="+course,
                "aoColumns" : [ { sWidth: "20%" }, { sWidth: "30%" }, { sWidth: "20%" }, { sWidth: "10%" }, { sWidth: "20%" }],
                "deferLoading": 10,
                "fnInitComplete": function() { 
                    $('[data-toggle="tooltip"]').tooltip();
                  }
            });
        }
    }   
</script>
<?php include('../includes/footer.php') ?>