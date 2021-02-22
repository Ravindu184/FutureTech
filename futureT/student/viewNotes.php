<?php
      session_start();
      
      require_once('../phpModel/connection.php');
      $num_of_rows =0;
      $notes = "";

      if (isset($_SESSION['user_id'])) {
          $name = $_SESSION['first_name']." ".$_SESSION['last_name'];
          $type = $_SESSION['user_type'];

          $query = "SELECT *FROM note WHERE student_level =$type";
          $result = mysqli_query($con,$query);

          $num_of_rows = mysqli_num_rows($result);

          if ($num_of_rows > 0) {
              while($row = mysqli_fetch_assoc($result))
              {
                  $notes.="<div class='col-md-3 mt-4'>";
                    $notes.="<div class='card'>";
                      $notes.="<div class='card-header bg-gradient-primary' style='color:white;'>"."<b>".$row['title']."</b>"."</div>";
                      $notes.="<div class='card-body'>";
                          $notes.="<center>"."<img src=../img/pdf.png width=100px height=100px>"."</center>";
                          $notes.="<p class='mt-2'>".$row['description']."</p>";
                          $notes.="<center>"."<a href='views.php?v_code={$row['id']}'>"."<button class='btn bg-gradient-primary' style='color:white;'>Download</button>"."</a>"."</center>";
                      $notes.="</div>";
                      $notes.="<div class='card-footer'>";
                          $notes.="<h5>"."දේශක ".$row['owner']."</h5>";
                      $notes.="</div>";
                    $notes.="</div>";
                  $notes.="</div>";

              }  
          }
      }

      

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edumark Student</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <!-- <link rel="shortcut icon" href="assets/images/favicon.ico" /> -->
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          
          
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">

              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <span class="mdi mdi-account-circle" style="font-size: 30px;color: purple;"></span>
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo $name; ?></span>
                  <span class="text-secondary text-small">Student</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="dashboad.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="studentMain.php">
                <span class="menu-title">My Account</span>
                <i class="mdi mdi-account-circle menu-icon"></i>
              </a>
            </li>
           <!--  <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Account Setting</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-settings menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="myaccount.php">My Account Details</a></li>
                  <li class="nav-item"> <a class="nav-link" href="studentaccount.php">Student Account Details</a></li>
                  <li class="nav-item"> <a class="nav-link" href="studentapprovel.php">Student Approvels</a></li>
                </ul>
              </div>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="viewVideos.php">
                <span class="menu-title">View Videos</span>
                <i class="mdi mdi-camcorder-box menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewNotes.php">
                <span class="menu-title">View  Notes</span>
                <i class="mdi mdi-book-multiple menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewPapers.php">
                <span class="menu-title">View Papers</span>
                <i class="mdi mdi-border-color menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewOnlineLessons.php">
                <span class="menu-title">View Online Lessons</span>
                <i class="mdi mdi-cloud-upload menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="../phpModel/logout.php">
                <span class="menu-title">SignOut</span>
                <i class="mdi mdi-lock-open-outline menu-icon"></i>
              </a>
            </li>
            
            
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row" id="proBanner">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                  <p>Hello!!.. <?php echo "<b>".$name."</b>"; ?> අප ඔබව සාදරයෙන් පිළිගන්නේමු.</p>
                  <!-- <a href="" target="_blank" class="btn download-button purchase-button ml-auto">Close</a> -->
                  <i class="mdi mdi-close ml-auto" id="bannerClose" ></i>
                </span>
              </div>
            </div>
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-book-multiple"></i>
                </span> View Notes </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
             
                    <?php echo $notes; ?>
            </div>
            
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>