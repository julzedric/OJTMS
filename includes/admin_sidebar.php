<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../img/ics_desktop.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>OJTMS Administrator</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if ($title == 'OJT Master List') {echo 'active'; }else{ echo ''; } ?>">
                <a href="index.php">
                    <i class="fa fa-users"></i> <span>OJT Master List</span>
                </a>
            </li>
            <li class="<?php if ($title == 'Document Request') {echo 'active'; }else{ echo ''; } ?>">
                <a href="document-request.php">
                    <i class="fa fa-folder-o"></i> <span>Document Request</span>
                </a>
            </li>
            <li class="<?php if ($title == 'Requirements') {echo 'active'; }else{ echo ''; } ?>">
                <a href="requirements.php">
                    <i class="fa fa-folder-open-o"></i> <span>Requirements</span>
                </a>
            </li>
            <li class="<?php if ($title == 'Announcement List') {echo 'active'; }else{ echo ''; } ?>">
                <a href="announcement-list.php">
                    <i class="fa fa-table"></i> <span>Announcement List</span>
                </a>
            </li>
            <li class="<?php if ($title == 'Hours rendered') {echo 'active'; }else{ echo ''; } ?>">
                <a href="hours_rendered.php">
                    <i class= "fa fa-clock-o"></i> <span>Hours Rendered</span>
                </a>
            </li>
            <li class="<?php if ($title == 'SMS') {echo 'active'; }else{ echo ''; } ?>">
                <a href="sms.php">
                    <i class="fa fa-envelope-o"></i> <span>SMS</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>