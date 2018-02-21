
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
    $('#filter_document').on('submit', function (e) {
        var date_from = $('#date_from').val();
        var date_to = $('#date_to').val();
        $.ajax({
            url: '../models/filterDocument.php',
            data: {
              from: date_from,
              to: date_to
            },
            type: 'GET',
            success: function (data) {
               var table_id = '';
               var type = '';
               var table = $('.tab-content .tab-pane:visible').attr('id');
               if(table == 'tab_1'){
                    table_id = 'step1';
                    type ='Application Letter'
               }else if (table == 'tab_2'){
                   table_id = 'step2';
                   type ='Monthly Report'
               }else if(table == 'tab_3'){
                   table_id = 'step3';
                   type ='DTR'
               }else if(table == 'tab_4'){
                   table_id = 'step4';
                   type ='Final Evaluation'
               }else if(table == 'tab_5'){
                   table_id = 'step5';
               }
               var eto = $('table'+'#'+table_id).find('tbody');
               eto.empty();
               $.each(JSON.parse(data), function (index, value) {
                   var file = "../assets/uploads/student_requirements/"+ value.name;
                   var set1 = '<a href="'+file+'" target=\'_new\'>\n' +
                       '               <button class="btn btn-primary btn-xs" title="Preview"><i class="fa fa-eye"></i></button>\n' +
                       '               </a>\n' +
                       '               <a href="../models/approveDocument.php?id='+value.id+'"\n'+
                       '               <button class="btn btn-success btn-xs" title="Approve"><i class="fa fa-thumbs-o-up"></i></button>\n' +
                       '               </a>\n' +
                       '               <a href="../models/declineDocument.php?id='+value.id+'"\n' +
                       '                   <button class="btn btn-danger btn-xs" title="Decline"><i class="fa fa-thumbs-o-down"></i></button>\n' +
                       '               </a>';
                    var set2 = '<span class="label label-success" style="display: block;">Approved</span>';
                    var set3 = '<span class="label label-danger" style="display: block;">Rejected</span>';
                    var set = '';
                    if(value.status == 1){
                        set = set1;
                    }else if(value.status == 2){
                        set = set2;
                    }else if(value.status == 3){
                        set = set3;
                    }
                   if(value.document_type == type){
                       eto.append(
                           '<tr role="row" class="odd">\n' +
                           '                            <td class="sorting_1">'+value.firstname+' '+value.lastname+'</td>\n' +
                           '                            <td>'+value.name+'</td>\n' +
                           '                            <td>\n'+set+
                           '                            </td>\n' +
                           '                        </tr>'
                       )
                   }
               })
            }
        });

        e.preventDefault();
    });
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

                                if(value.status != 3){
                                    $("#input_file"+value.requirement_id).attr('disabled','');
                                    console.log("val",req_id,value.requirement_id)
                                }else{
                                    $("#input_file"+value.requirement_id).prop("disabled", false);
                                    console.log("ganda",req_id,value.requirement_id)
                                }


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
