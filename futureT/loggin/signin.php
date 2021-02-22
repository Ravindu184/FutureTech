<?php
        require_once('../phpModel/connection.php');

        $select_items="";

        $query = "SELECT *FROM student_level WHERE is_deleted=0 AND title != 'Admin'";
        $result = mysqli_query($con,$query);

        if (mysqli_num_rows($result) > 0) {
             
                while ($row = mysqli_fetch_assoc($result)) {
                    
                    $select_items.="<option value=".$row['title'].">"."Grade ".$row['title']."</option>";

                }
         } 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FutureTech Acadamy</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <div class="container">
            <div class="signup-content">    
                <div class="signup-img">
                    <img src="images/unnamed.png" alt="" height="40%">
                    <div class="signup-img-content">
                        <h2>Welcome</h2>
                        <p>So whats going on !</p>
                    </div>
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form" action="../phpModel/logginProcess.php">
                        <div class="form-row">
                            <div class="form-group">
                                    <h3>Sign In With My Account</h3><br>
                                    <label>User name</label>
                                    <input type="text" name="user_name" class="form-control" placeholder="User name" required><br>
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required><br>
                                    <label>Account Type</label>
                                    <select class="form-control" name="account_type" required>
                                        <option>Account Type</option>
                                        <?php echo $select_items; ?>
                                        <option value="Admin">Admin</option>
                                    </select>
                                    <br>
                            </div>
                            
                        </div>
                       
                        <div class="form-submit">
                            <input type="submit" value="Sign In" class="submit" id="submit" name="login" />
                            <input type="reset" value="Reset" class="submit" id="reset" name="reset" />
                        </div>
                        <br>
                        <span>If you Don't have Account </span><a href="signup.php">Sign Up here</a>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/wnumb/wNumb.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>