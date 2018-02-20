<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
        <span class="logo-mini">OJT</span>
        <span class="logo-lg">OJTMS</span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning"><?php
                                    if (getNotifCount($conn) < 0){
                                        echo getNotifCount($conn);
                                    }
                            ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have <?php echo getNotifCount($conn); ?> notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <?php
                                foreach (getNotifications($conn) as $notif){
                                ?>
                                <li <?php
                                if ($notif['flag'] == 0 ) {
                                    echo 'style="background-color:#f3f3f3;"';
                                }
                                ?>>
                                    <a data-uid="<?php echo $notif['id']; ?>" class="notification" href="../admin/document-request.php">
                                         <?php echo $notif['firstname'] . ' ' . $notif['lastname'] . ' submitted ' . $notif['document_type']   ?>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
<!--                        <li class="footer"><a href="#">View all</a></li>-->
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../img/ics_desktop.png" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo ucfirst($_SESSION['username']); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="../img/ics_desktop.png" class="img-circle" alt="User Image">

                            <p>
                                OJTMS Administrator
                                <!--<small>Member since Nov. 2012</small>-->
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
<!--                                <a href="#" class="btn btn-default btn-flat">Profile</a>-->
                            </div>
                            <div class="pull-right">
                                <form method="POST" action="../models/logout.php">
                                    <button class="btn btn-default btn-flat">Sign out</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>
</header>