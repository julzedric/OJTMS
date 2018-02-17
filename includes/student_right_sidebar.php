<div class="col-xs-4">
    <div class="info-box bg-aqua">
        <span class="info-box-icon"><i class="fa fa-files-o"></i></span>
        <?php
            $step_completed = 0;
            for($ctr=1; $ctr <= 4; $ctr++) 
            { 
                $sql1 = "SELECT count(*) step_tally FROM ojt_requirements_list where step ='".$ctr."' ";
                $result1 = $conn->query($sql1);

                $step_tally = $result1->fetch_assoc()['step_tally'];
               
                $sql2 = "SELECT count(*) completed_tally FROM ojt_student_requirements a inner join
                        ojt_requirements_list b on a.requirement_id = b.id where a.stud_id='".$_SESSION['stud_id']."' 
                        and b.step = '".$ctr."' and is_completed = 1 ";
                $result2 = $conn->query($sql2);    

                $completed_tally = $result2->fetch_assoc()['completed_tally'];
                
                if ($step_tally == 0 && $completed_tally == 0)
                {
                    $step_completed = $step_completed + 0;
                }
                else
                {
                    if ($step_tally == $completed_tally)
                    {
                        $step_completed = $step_completed + 1;
                    }
                }
               
               
            }    

            $step_percentage = ($step_completed / 4) * 100;
            
           
           
        ?>

        <div class="info-box-content">
            <span class="info-box-text">Step Requirement Summary</span>
            <span class="info-box-number">(<?php echo $step_completed; ?> out of 4) Steps completed.</span>

            <div class="progress">
                <div class="progress-bar" style="width: <?php echo $step_percentage; ?>%"></div>
            </div>
            <span class="progress-description">
                    <?php echo $step_percentage; ?>%
                  </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->

    <!--Announcement-->
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bullhorn margin-r-5"></i> Announcement</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="height:320px; overflow:auto;">

            <?php
            $sql = "SELECT * FROM ojt_announcements";
            $result = $conn->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc())
                {   
                    $today = date('Y-m-d');
                    if($row['end_date'] >= $today){
                         echo '
                                        <strong><i class="fa fa-book margin-r-5"></i>'.$row['title'].'</strong>

                                        <p class="text-muted">
                                          '.$row['announcements'].'
                                        </p>

                                        <hr>

                                        ';
                    }
                }

            }
            ?>
            <!-- /.box-body -->
        </div>
        <!--End Announcement-->

    </div>
</div>