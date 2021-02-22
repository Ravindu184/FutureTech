<?php
      session_start();
      require_once('../phpModel/counter.php');
      require_once('../phpModel/connection.php');

      $name ="";
      $num_students = $number_of_students;
      $num_videos = $number_of_videos;
      $num_notes = $number_of_notes;
      $num_papers = $number_of_papers;

      if (isset($_SESSION['user_id'])) {
          $name = $_SESSION['name'];
      }

      $students = "";
      $no_of_notApproved=0;
      $query = "SELECT *FROM student WHERE is_approved=0 AND is_deleted=0";
      $result = mysqli_query($con,$query);

      $no_of_notApproved = mysqli_num_rows($result);
      if (mysqli_num_rows($result) > 0) {
          
          $students = mysqli_fetch_assoc($result);
      }

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edumark Admin</title>
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
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count-symbol bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Not Approved</h6>
                <div class="dropdown-divider"></div>
               
                <div class="dropdown-divider"></div>
                <?php for($i=0;$i<$no_of_notApproved;$i++): ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="mdi mdi-link-variant"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1"><?php echo $students['first_name']; ?></h6>
                    <p class="text-gray ellipsis mb-0"> <?php echo $students['email']; ?> </p>
                  </div>
                </a>
                <?php endfor; ?>
              </div>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
            <!-- <li class="nav-item nav-settings d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-format-line-spacing"></i>
              </a>
            </li> -->
          </ul>
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
                  <span class="text-secondary text-small">Administrator</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
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
                  <li class="nav-item"> <a class="nav-link" href="allstudentapprovel.php">All Student Approvels</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="uploadvideo.php">
                <span class="menu-title">Upload Video</span>
                <i class="mdi mdi-camcorder-box menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="uploadnote.php">
                <span class="menu-title">Upload Notes</span>
                <i class="mdi mdi-book-multiple menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="uploadpaper.php">
                <span class="menu-title">Upload Papers</span>
                <i class="mdi mdi-border-color menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="uploadonlinelessons.php">
                <span class="menu-title">Publish Online Lessons</span>
                <i class="mdi mdi-cloud-upload menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="studentLevels.php">
                <span class="menu-title">Control Student Levels</span>
                <i class="mdi mdi-account menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="uploadbanner.php">
                <span class="menu-title">Upload Banners</span>
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
                  <p>Hello!!.. <?php echo "<b>".$name."</b>"; ?> Welcome to Admin Panel</p>
                  <!-- <a href="" target="_blank" class="btn download-button purchase-button ml-auto">Close</a> -->
                  <i class="mdi mdi-close ml-auto" id="bannerClose" ></i>
                </span>
              </div>
            </div>
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Students <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"><?php echo $num_students; ?></h2>
                    <h6 class="card-text">All the Rigistered Students</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Video Lessons<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"><?php echo $number_of_videos; ?></h2>
                    <h6 class="card-text">Uploaded video Lessons</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Notes <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"><?php echo $num_notes; ?></h2>
                    <h6 class="card-text">Uploaded notes</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Papars<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"><?php echo $num_papers; ?></h2>
                    <h6 class="card-text">Uploaded Papars</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Online Sessions <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">10</h2>
                    <h6 class="card-text">Conducted Online Sessions</h6>
                  </div>
                </div>
              </div>
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