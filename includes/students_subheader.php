<header class="main-header">

    <?php
    include('../models/functions.php');
    $student = getStudentsByID($conn,$_SESSION['stud_id']);
    ?>
    <!-- Logo -->

    <a href="index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="../img/ics_desktop.png" class="img-circle" alt="ICS" width="30px"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            <img src="../img/ics_desktop.png" class="img-circle" alt="ICS" width="30px" style="margin: 0px 5px 5px 0px;">
            OJTMS</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                
                
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php $profPicsmall = $student['profile_picture'] != '' ? "../assets/uploads/profile_picture/".$student['profile_picture']: '../dist/img/user2-160x160.jpg'?>

                        <img src="<?php echo $profPicsmall ;?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo ucfirst($_SESSION['username']); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?php $profPic = $student['profile_picture'] != '' ? "../assets/uploads/profile_picture/".$student['profile_picture']: '../dist/img/user2-160x160.jpg'?>
                            <img src="<?php echo $profPic; ?>" class="img-circle" alt="User Image">

                            <p>

                                <?php echo ucfirst($student['firstname']).' ' .ucfirst($student['lastname']); ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="../student/profile.php" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <form method="POST" action="../models/logout.php">
                                    <button class="btn btn-default btn-flat">Sign out</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                
            </ul>
        </div>

    </nav>
</header>