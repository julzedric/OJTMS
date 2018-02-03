<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
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
                <a href="ojt-master-list.php">
                    <i class="fa fa-users"></i> <span>OJT Master List</span>
                </a>
            </li>
            <li class="<?php if ($title == 'Document Request') {echo 'active'; }else{ echo ''; } ?>">
                <a href="document-request.php">
                    <i class="fa fa-home"></i> <span>Document Request</span>
                </a>
            </li>
            <li class="<?php if ($title == 'Steps Requirement') {echo 'active'; }else{ echo ''; } ?>">
                <a href="step-requirement.php">
                    <i class="fa fa-folder-open-o"></i> <span>Steps Requirement</span>
                </a>
            </li>
            <li class="<?php if ($title == 'Announcement List') {echo 'active'; }else{ echo ''; } ?>">
                <a href="announcement-list.php">
                    <i class="fa fa-table"></i> <span>Announcement List</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>