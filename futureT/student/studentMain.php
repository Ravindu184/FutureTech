<?php
      session_start();
      require_once('../phpModel/counter.php');
      require_once('../phpModel/connection.php');

      $name ="";
      $msg=0;
      $id =0;
      $email ="";
      $grade ="";
      $contact="";
      $province ="";
      $district ="";
      $user_name ="";
      $image= "";

      if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
      }

      if (isset($_SESSION['user_id'])) {
          $name = $_SESSION['first_name']." ".$_SESSION['last_name'];
          $id = $_SESSION['user_id'];

          $query = "SELECT *FROM student WHERE id=$id";
          $result = mysqli_query($con,$query);

          if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              $email = $row['email'];
              $grade = $row['account_type'];
              $contact = $row['contact'];
              $province = $row['province'];
              $district = $row['district'];
              $user_name = $row['user_name'];
              $id = $row['id'];
          }

          $query2 = "SELECT * FROM user_profile WHERE student_id=$id";
          $result2 = mysqli_query($con,$query2);

          if (mysqli_num_rows($result2) > 0) {
              $row2 = mysqli_fetch_assoc($result2);

              $image = $row2['profile_pic'];           
          }
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
                  <p>Hello!!.. <?php echo "<b>".$name."</b>"; ?> අපි ඔබව සාදරයෙන් පිළිගන්නේමූ.</p>
                  <!-- <a href="" target="_blank" class="btn download-button purchase-button ml-auto">Close</a> -->
                  <i class="mdi mdi-close ml-auto" id="bannerClose" ></i>
                </span>
              </div>
            </div>
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> My Account </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
                
                  <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- <font color="green"><b>My Account Details</b></font><br><br> -->
                                <img src=<?php echo "uploads/pro_pic/".$image; ?> width="40%" height="40%">
                                <form class="forms-sample" method="post" action="" enctype="multipart/form-data">
                                    
                                    <br><br>
                                    <input type="hidden" name="user_id" value="">
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name </label>
                                        <div class="col-sm-9">
                                            <label for="exampleInputUsername2" class="col-sm-6 col-form-label"><?php echo $name; ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                          <div class="col-sm-9">
                                              <label for="exampleInputUsername2" class="col-sm-6 col-form-label"><?php echo $email; ?></label>
                                          </div>
                                    </div>
                                    <div class="form-group row">
                                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Grade</label>
                                          <div class="col-sm-9">
                                                <label for="exampleInputUsername2" class="col-sm-6 col-form-label"><?php echo "Grade ".$grade; ?></label>
                                          </div>
                                    </div>
                                    <div class="form-group row">
                                          <label for="exampleInputMobile" class="col-sm-3 col-form-label">Contact</label>
                                          <div class="col-sm-9">
                                                <label for="exampleInputUsername2" class="col-sm-6 col-form-label"><?php echo $contact; ?></label>
                                          </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Location</label>
                                        <div class="col-sm-9">
                                            <label for="exampleInputUsername2" class="col-sm-9 col-form-label"><?php echo $district." District in ".$province." Province "; ?></label>
                                        </div>
                                    </div>
                                    
                              </form>
                            </div>
                        </div>
                  </div>
                  <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form class="forms-sample" method="post" action="../phpModel/uploadProPic.php" enctype="multipart/form-data">
                                    
                                    <font color="green"><b>ඔබට ගිණුමෙහි ඇති Profile Picture වෙනස් කීරීමට අවශ්‍ය නම්</b></font><br><br><br>
                                    <input type="hidden" name="user_id" value=<?php echo $id; ?>>
                                    <div class="form-group row">
                                          <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Upload Profile Pic</label>
                                          <div class="col-sm-9">
                                              <input type="file" name="profile_pic" class="form-control" id="exampleInputConfirmPassword2"  value=""><br>
                                              <button type="submit" class="btn btn-gradient-primary mr-2" name="propic_upload">Upload</button>
                                          </div>
                                    </div>
                                    <br>
                                    <font color="green"><b>ඔබට ගිණුමෙහි ඇති මුරපදය වෙනස් කීරීමට අවශ්‍ය නම්</b></font><br><br><br>
                                     <?php  if($msg ==505):?>
                                        <div class="alert alert-success" role="alert">
                                              Profile Picture Uploaded Successfully!.
                                        </div>
                                    <?php endif; ?> 
                                    
                                    <?php  if($msg ==507):?>
                                        <div class="alert alert-danger" role="alert">
                                              Unable to Upload Profile Picture.
                                        </div>
                                    <?php endif; ?>    
                                    <?php  if($msg ==509):?>
                                        <div class="alert alert-danger" role="alert">
                                              Password doesn't match.
                                        </div>    
                                    <?php endif; ?> <br>
                                    <input type="hidden" name="user_id" value=<?php echo $id; ?>>
                                    <div class="form-group row">
                                          <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">User Name</label>
                                          <div class="col-sm-9">
                                              <input type="text" name="user_name" class="form-control" id="exampleInputConfirmPassword2" required value=<?php echo $user_name; ?>>
                                          </div>
                                    </div>
                                    <div class="form-group row">
                                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                                          <div class="col-sm-9">
                                              <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Password" min="4">
                                          </div>
                                    </div>
                                    <div class="form-group row">
                                          <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Confirm Password</label>
                                          <div class="col-sm-9">
                                              <input type="password" name="con_password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password" min="4">
                                          </div>
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" onclick="myFunction()"> Show Password </label>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-gradient-primary mr-2" name="change_p">Change</button>
                                    <button type="reset" class="btn btn-light">Cancel</button>
                              </form>
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
    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("exampleInputPassword2");
            var y = document.getElementById("exampleInputConfirmPassword2");
            if (x.type === "password") {
                  x.type = "text";
            } else {
                  x.type = "password";
            }

            if (y.type === "password") {
                  y.type = "text";
            } else {
                  y.type = "password";
            }
        }
    </script>
  </body>
</html>