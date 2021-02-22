<?php
        require_once('../phpModel/connection.php');

        $msg=0;
        if(isset($_GET['msg']))
        {
            $msg=$_GET['msg'];        
        } 


        $select_items="";

        $query = "SELECT *FROM student_level WHERE is_deleted=0 AND title !='Admin'";
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
                    <img src="images/unnamed.png" alt="" height="80%">
                    <div class="signup-img-content">
                        <h2>Register now </h2>
                        <p>while seats are available !</p>
                    </div>
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form" action="../phpModel/registration.php">
                        <div class="form-row">
                            <div class="form-group">
                                <?php
                                        if ($msg == 408) {
                                             echo "<h5 style='color:red;'>"."Password doesn't Match!"."</h5>";
                                         }
                                        else if($msg == 412) 
                                            echo "<h5 style='color:green;'>"."Account Creation Succssfully!"."</h5>";
                                        else if($msg == 416) 
                                            echo "<h5 style='color:red;'>"."Unable Create Account"."</h5>";
                                        else
                                            echo "";
                                 ?>
                                <div class="form-input">
                                    <label for="first_name" class="required">First name</label>
                                    <input type="text" class="form-control" name="first_name" required></input>
                                </div>
                                <div class="form-input">
                                    <label for="last_name" class="required">Last name</label>
                                    <input type="text" class="form-control" name="last_name" required></input>
                                </div>
                                <div class="form-input">
                                    <label for="company" class="required">Contact </label>
                                    <input type="text" class="form-control" name="contact" required></input>
                                </div>
                                <div class="form-input">
                                    <label for="email" class="required">Email</label>
                                    <input type="email" class="form-control" name="email" required></input>
                                </div>
                                <div class="form-input">
                                    <label for="phone_number" class="required">Whatsapp number</label>
                                    <input type="text" class="form-control" name="whatsapp_no" required></input>
                                </div>
                                 <div class="form-input">
                                    <label class="required">District</label>
                                    <select class="form-control" name="district">
                                        <option>Select Your District</option>
                                        <option value="Ampara">Ampara</option>
                                        <option value="Anuradhapura">Anuradhapura</option>
                                        <option value="Badulla">Badulla</option>
                                        <option value="Batticaloa">Batticaloa</option>
                                        <option value="Colombo">Colombo</option>
                                        <option value="Galle">Galle</option>
                                        <option value="Gampaha">Gampaha</option>
                                        <option value="Hambantota">Hambantota</option>
                                        <option value="Jaffna">Jaffna</option>
                                        <option value="Kalutara">Kalutara</option>
                                        <option value="Kandy">Kandy</option>
                                        <option value="Kegalle">Kegalle</option>
                                        <option value="Kilinochchi">Kilinochchi</option>
                                        <option value="Kurunegala">Kurunegala</option>
                                        <option value="Mannar">Mannar</option>
                                        <option value="Matale">Matale</option>
                                        <option value="Matara">Matara</option>
                                        <option value="Monaragala">Monaragala</option>
                                        <option value="Mullaitivu">Mullaitivu</option>
                                        <option value="Nuwara Eliya">Nuwara Eliya</option>
                                        <option value="Polonnaruwa">Polonnaruwa</option>
                                        <option value="Puttalam">Puttalam</option>
                                        <option value="Ratnapura">Ratnapura</option>
                                        <option value="Trincomalee">Trincomalee</option>
                                        <option value="Vavuniya">Vavuniya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <div class="form-radio">
                                	<div class="label-flex">
                                        <label for="payment" class="required">Province</label>
                                        <!-- <a href="#" class="form-link">Payment Detail</a> -->
                                    </div>
                                    <select class="form-control" name="province">
                                    	<option>Select Your Province</option>
                                    	<option value="Central">Central Province</option>
                                    	<option value="Eastern">Eastern Province</option>
                                    	<option value="North Western">North Western Province</option>
                                    	<option value="North Central">North Central Province</option>
                                    	<option value="Northern">Northern Province</option>
                                    	<option value="Southern">Southern Province</option>
                                    	<option value="Sabaragamuwa">Sabaragamuwa Province</option>
                                    	<option value="Uva">Uva Province</option>
                                    	<option value="Western">Western Province</option>
                                    </select>
                                    <br>
                                    <div class="label-flex">
                                        <label for="payment" class="required">Account Type</label>
                                        <!-- <a href="#" class="form-link">Payment Detail</a> -->
                                    </div>
                                    <select class="form-control" name="account_type">
                                    	<option value="">Account Type</option>
                                        <?php echo $select_items; ?>
                                    </select>
                                </div>
                                <div class="form-input">
                                    <label for="chequeno" class="required">Home City</label>
                                    <input type="text" name="home_city" class="form-control" required><br>
                                    <label class="required">User name</label>
                                    <input type="text" name="user_name" class="form-control"  required><br>
                                    <label class="required">Password</label>
                                    <input type="password" name="password" class="form-control"  required><br>
                                    <label class="required">Confirm Password</label>
                                    <input type="password" name="con_password" class="form-control"  required>
                                </div>
                                
                            </div>
                        </div>
                       <!--  <div class="donate-us">
                            <label>How Much Important</label>
                            <div class="price_slider ui-slider ui-slider-horizontal">
                                <div id="slider-margin"></div>
                                <span class="donate-value" id="value-lower"></span>
                            </div>
                        </div> -->
                        <div class="form-submit">
                            <input type="submit" value="Submit" class="submit" id="submit" name="submit" />
                            <input type="reset" value="Reset" class="submit" id="reset" name="reset" />
                        </div>
                        <span>If you have Account </span><a href="signin.php">Sign In here</a>
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
