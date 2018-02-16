<div class="col-xs-4">
    <div class="info-box bg-aqua">
        <span class="info-box-icon"><i class="fa fa-files-o"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Step Requirement Summary</span>
            <span class="info-box-number">(1 out of 5 Steps) completed.</span>

            <div class="progress">
                <div class="progress-bar" style="width:20%"></div>
            </div>
            <span class="progress-description">
                    20%
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
                    echo '
                                        <strong><i class="fa fa-book margin-r-5"></i>'.$row['title'].'</strong>

                                        <p class="text-muted">
                                          '.$row['announcements'].'
                                        </p>

                                        <hr>

                                        ';
                }

            }
            ?>
            <!-- /.box-body -->
        </div>
        <!--End Announcement-->

    </div>
</div>