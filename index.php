<?php
 require_once('connection.php');
 if (isset($_SESSION['username']) && $_SESSION['is_admin'] == 0){
     header("location: student/index.php");
 }elseif (isset($_SESSION['username']) && $_SESSION['is_admin'] == 1){
     header("location: admin/index.php");
 }
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OJTMS</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.ico">
      <script src='https://www.google.com/recaptcha/api.js'></script>

  </head>

  <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
          <img src="img/ics_desktop.png" width="50px">
          <strong> OJTMS </strong>
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#page-top">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#mission">Mission</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#vision">Vision</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" href="#register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" href="#login">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead" >
      <div class="container">
        <div class="intro-text">
          <div class="row">
          </div>
        </div>
      </div>
    </header>

    <!-- Services -->
    <section id="mission">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Mission</h2>
            
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4 m-b-2">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-line-chart fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading"></h4>
            <p class="text-muted">To educate and train computer professionals knowledgeable and competent in meeting the growing demand for software developers and IT persons in the airline industry.</p>
          </div>
          <div class="col-md-4 m-b-2">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-group fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading"></h4>
            <p class="text-muted">To motivate its faculty and students to help advance the frontiers of computer research and development applicable for the innovation of aerospace tecnhnology.</p>
          </div>
          <div class="col-md-4 m-b-2">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-suitcase fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading"></h4>
            <p class="text-muted">To provide world class IT professionals that will contribute in the development of IT education, business, and primarily the airline processes of the Philippine and the world.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-bank fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading"></h4>
            <p class="text-muted">To nurture the academic community in a cilture that develops the totality of a person.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-plane fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading"></h4>
            <p class="text-muted">To cultivate and mold leaders in technical, professional and resarch domains for the development of aeronautical sciences that will help the country to adapt fast-changing technologies in aviation.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-graduation-cap fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading"></h4>
            <p class="text-muted">To produce graduates that will take the lead in the innovation of new technologies and their applications through cutting-edge reasearch and state-of-the-art learning.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Portfolio Grid -->
    <section class="bg-vision" id="vision">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase text-white">Vision</h2>
            <p class="text-muted">The Institute of Computer Studies is PhilSCA’s forefront in Information Technology education, and in the application of information and knowledge to business and professional services, in the field of airline operation and aviation industry. It is an institution committed to its vision of continually sharing knowledge and expertise through teaching, engaging in Computer Science researchand Information Technology, to pursue excellence in academics as well as extra-curricular activities, equipping its students with globally competitive skills, to become tomorrow’s leader in industry, academe and government.</p>
          </div>
        </div>
      </div>
    </section>



    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <img src="img/ab_logo.png" width="100px">
            <h3 class="section-heading text-uppercase">PHILIPPINE STATE COLLEGE OF AERONAUTICS</h3>
          </div> 
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; PHILSCA</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Portfolio Modals -->

    <!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        
        <div class="modal-content">
          <form action="models/register.php" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
              <h4>Registration</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
              <div class="container">
                <div id="register-alert"></div>
                  <p>Required Fields <span style="color:red">(*)</span></p>
                <div class="row">
                
                <div class="form-group col-lg-5">
                  <label for="studentid" class="control-label">STUDENT ID <span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="student_id" id="studentid" placeholder="00000-0000" maxlength="10" required="">
                    <?php if(isset($_POST['student_id'])) {
                        echo htmlentities ($_POST['student_id']); }?>
                </div>
                <div class="form-group col-lg-3">
                  <label for="course" class="control-label" >COURSE <span style="color:red">*</span></label>
                    <select class="form-control" name="course" id="Course" >
                      <option value="BSIM">BSIM</option>
                      <option value="BSAIT">BSAIT</option>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label for="contact number">CONTACT NUMBER <span style="color:red">*</span></label>
                    <input class="form-control" type="text" name="contact_number" required>
                    <?php if(isset($_POST['contact_number'])) {
                        echo htmlentities ($_POST['contact_number']); }?>
                </div>
                <div class="form-group col-lg-4">
                  <label for="username" class="control-label" oi>USERNAME <span style="color:red">*</span></label>
                  <input type="text" pattern=".{5,}"   required title="5 minimum characters"  class="form-control" name="username" id="username" required="">
                    <?php if(isset($_POST['username'])) {
                        echo htmlentities ($_POST['username']); }?>
                </div>
                <div class="form-group col-lg-4">
                  <label for="reg-pword" class="control-label" oi>PASSWORD <span style="color:red">*</span></label>
                  <input type="password" pattern=".{8,}"   required title="8 minimum characters" class="form-control" name="reg-pword" id="reg-pword" required="">
                </div>
                <div class="form-group col-lg-4">
                  <label for="regcon-pword" class="control-label" oi>CONFIRM PASSWORD <span style="color:red">*</span></label>
                  <input type="password" class="form-control" name="regcon-pword" id="regcon-pword" required="">
                </div>
                <div class="form-group col-lg-3">
                  <label for="lastname" class="control-label" oi>LAST NAME <span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="lastname" id="lastname" required="">
                </div>
                <div class="form-group col-lg-3">
                  <label for="firstname" class="control-label" >FIRST NAME <span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="firstname" id="firstname" required="">
                    <?php if(isset($_POST['firstname'])) {
                        echo htmlentities ($_POST['firstname']); }?>
                </div>
                <div class="form-group col-lg-3">
                  <label for="middlename" class="control-label" >MIDDLE NAME</label>
                  <input type="text" class="form-control" name="middlename" id="middlename">
                    <?php if(isset($_POST['middlename'])) {
                        echo htmlentities ($_POST['middlename']); }?>
                </div>
                <div class="form-group col-lg-3">
                  <label for="suffix" class="control-label" >SUFFIX</label>
                  <input type="text" class="form-control" name="suffix" id="suffix">
                </div>
                <div class="form-group col-lg-5">
                  <label for="email" class="control-label">EMAIL <span style="color:red">*</span></label>
                  <input type="email" class="form-control" name="email" id="email" required="">
                    <?php if(isset($_POST['email'])) {
                        echo htmlentities ($_POST['email']); }?>
                </div>
                <div class="form-group col-lg-5">
                  <label for="birthdate" class="control-label">BIRTH DATE <span style="color:red">*</span></label>
                  <input type="date" class="form-control" name="birthdate" id="birthdate" required="">
                    <?php if(isset($_POST['birthdate'])) {
                        echo htmlentities ($_POST['birthdate']); }?>
                </div>
                <div class="form-group col-lg-2"> 
                  <label for="gender" class="control-label">GENDER <span style="color:red">*</span></label>
                    <select class="form-control" name="gender" id="gender" >
                      <option value="MALE">MALE</option>
                      <option value="FEMALE">FEMALE</option>
                    </select>
                    <?php if(isset($_POST['gender'])) {
                        echo htmlentities ($_POST['gender']); }?>
                </div>
                <div class="form-group col-lg-12">
                  <label for="street" class="control-label">STREET</label>
                  <input type="text" class="form-control" placeholder="Block No. / House No. / Street" name="street" id="street">
                    <?php if(isset($_POST['street'])) {
                        echo htmlentities ($_POST['street']); }?>
                </div>
                <div class="form-group col-lg-4">
                  <label for="barangay" class="control-label">BARANGAY</label>
                  <input type="text" class="form-control" name="barangay" id="barangay">
                    <?php if(isset($_POST['barangay'])) {
                        echo htmlentities ($_POST['barangay']); }?>
                </div>
                <div class="form-group col-lg-4">
                  <label for="city" class="control-label">CITY</label>
                  <input type="text" class="form-control" name="city" id="city">
                    <?php if(isset($_POST['city'])) {
                        echo htmlentities ($_POST['city']); }?>
                </div>
                <div class="form-group col-lg-4">
                  <label for="province" class="control-label">PROVINCE</label>
                  <input type="text" class="form-control" name="province" id="province">
                    <?php if(isset($_POST['province'])) {
                        echo htmlentities ($_POST['province']); }?>
                </div>

                <div class="form-group col-lg-4">
                <div class="g-recaptcha" data-sitekey="6LeeUEMUAAAAAI7pdoG1QbBi1fbbgJMAk6fZj2PP"></div>
                </div>
              </div>   
              
              
              </div>      
            </div>
            <div class="modal-footer">
                  <div class="col-lg-12">
                    <div class="pull-right">
                      <button type="submit" class="btn btn-primary" id="btn_register">Register</button>
                      <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
            </div>
          </form>
        </div>
        
      </div>
    </div>

    <div class="portfolio-modal modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4>Login</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div class="container">
            
            <form method="POST" action="models/login.php">
              <div class="row">
                <div class="form-group col-lg-12">
                  <label for="uname" class="control-label" oi>USERNAME</label>
                  <input type="text" class="form-control" name="uname" id="uname" required="">
                </div>
                <div class="form-group col-lg-12">
                  <label for="pword" class="control-label" oi>PASSWORD</label>
                  <input type="password" class="form-control" name="password" id="password" required="">
                  <br>
                  <a href="#">Forgot Password?</a>
                </div>               
              </div>
                <div class="modal-footer">
                    <div class="col-lg-12">
                        <div class="pull-right">
                            <button class="btn btn-primary">Login</button>
                            <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
            
            </div>      
          </div>
        </div>
      </div>
    </div>

    
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js">$('.carousel').carousel();</script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
  </body>

</html>
