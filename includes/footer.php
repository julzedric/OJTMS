
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="http://www.philsca.edu.ph/ac_ics.html" target="_blank">Institutes of Computer Studies</a>.</strong> All rights
    reserved.
</footer>

</div>

<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../bower_components/Chart.js/Chart.js"></script>
<script src="../bower_components/sweetalert/sweet-alert.min.js"></script>
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="../bower_components/toastr/toastr.min.js"></script>
<script src="../dist/js/pages/dashboard2.js"></script>
<script src="../dist/js/demo.js"></script>

<script>
    $('.notification').click(function () {
        var id = $(this).data('uid');
        console.log(id);
        $.ajax({
            url: '../models/updateNotification.php?id='+id,
            type: 'POST',
            success: function () {

            }
        })
    })
    $('#type').change(function(){
        if ($(this).val() == '0'){
            $('#fileUpload').slideDown();
        }else{
            $('#fileUpload').slideUp();
        }
    })
    $('#name').change(function () {
      if ($(this).val() == 'Others'){
          $('#others').show();
      }else{
          $('#others').hide();
      }
    });
    function selectStudent(val) {
        $("#recipient").val(val);
        $("#suggesstion-box").hide();
    }
    $(function () {

        var id = '<?php echo $_SESSION['stud_id']; ?>';

        console.log("id",id);

        $.ajax({
            url: 'models/getAllPassedRequirements.php?id='+id,
            type: 'GET',
            success: function (data) {

                    $(".requirement_id_hidden").each(function(){
                        var req_id = $(this).val();
                        console.log("req",req_id);
                        $.each(JSON.parse(data),function(key,value){
                            if(req_id === value.requirement_id){
                                $("#input_file"+value.requirement_id).attr('disabled','');
                                console.log("val",req_id,value.requirement_id)
                            }
                        });
                    });
            }
        });

        $("#recipient").keyup(function(){
            $.ajax({
                type: "POST",
                url: "models/searchStudent.php",
                data:'recipient='+$(this).val(),
                // beforeSend: function(){
                //     $("#recipient").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                // },
                success: function(data){
                    $("#suggesstion-box").show();
                    $("#suggesstion-box").html(data);
                    $("#recipient").css("background","#FFF");
                }
            });
        });

        load_dataTable();

        //Date picker
        $('.datepicker').datepicker({
          autoclose: true,
          orientation: "bottom"
        });

        var value = $("#type").val();
        show_step(value);

    })


  $(".update_profile").hide();

  $("#widget-user-image").hover(function(){
    $(".update_profile").show();
  });

  $(".update_profile").mouseout(function(){
    $(".update_profile").hide();
  });

  $(".update_profile").on("click",function(){
    $("#EditProfilePicture").show();
  });

  $("#pic_close").on("click",function(){
    $("#EditProfilePicture").hide();
  });

</script>
</body>
</html>
