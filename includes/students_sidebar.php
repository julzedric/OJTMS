<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="<?php if ($title == 'OJTMS') {echo 'active'; }else{ echo ''; } ?>">
                <a href="index.php">
                    <i class="fa fa-home"></i> <span>Home</span>
                </a>
            </li>
            <li class="<?php if ($title == 'My Documents') {echo 'active'; }else{ echo ''; } ?>">
                <a href="my-documents.php">
                    <i class="fa fa-book"></i> <span>My Documents</span>
                </a>
            </li>
            <li class="<?php if ($title == 'Downloadable Forms') {echo 'active'; }else{ echo ''; } ?>">
                <a href="downloadable-forms.php">
                    <i class="fa fa-download"></i> <span>Downloadable Forms</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
                </a>
            </li>
            <li class="<?php if ($title == 'Profile') {echo 'active'; }else{ echo ''; } ?>">
                <a href="profile.php">
                    <i class="fa fa-user"></i> <span>Profile</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>