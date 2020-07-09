<?php include_once("admin/Connection.php");?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->
<head>
    <?php include_once("LoadFile1.php");?>
</head>

<!-- PHP Login Code -->

    <?php

        if(isset($_REQUEST['btnLogin']))
        {
            $select_Query="select * from tblUser where Email='".$_REQUEST['txtEmail']."' and Password='".base64_encode($_REQUEST['txtPassword'])."'";
            $Execute_Select_Query=mysqli_query($con,$select_Query) or die(mysqli_error($con));
            if(mysqli_num_rows($Execute_Select_Query)>0)
            {
                $fetch_data=mysqli_fetch_array($Execute_Select_Query);
                $_SESSION['UserID']=$fetch_data['UserID'];
                $_SESSION['UserFirstName']=$fetch_data['FirstName'];
                $_SESSION['UserLastName']=$fetch_data['LastName'];
                $_SESSION['UserEmail']=$fetch_data['Email'];
                $_SESSION['UserContactNo']=$fetch_data['ContactNo'];
                $_SESSION['UserType']=$fetch_data['UserType'];
                $_SESSION['UserIsVerified']=$fetch_data['IsVerified'];
                $_SESSION['UserIsActive']=$fetch_data['IsActive'];
                 $_SESSION['IsVerifiedEmail']=$fetch_data['IsVerifiedEmail'];

                header("location:index.php");
            }
            else
            {
    ?>
                <script type="text/javascript" id="error">alert('Invalid Email / Password');</script>
    <?php
            }
        }

    ?>
<!-- PHP Login Code -->

<body>
     <?php include_once("PageLoader.php");?>
      
<!-- Contact section start -->
<div class="contact-section overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <!-- details -->
                    <div class="details">
                        <!-- Logo -->
                        <!-- <a href="index.html">
                            <img src="img/black-logo.png" class="cm-logo" alt="black-logo">
                        </a> --> <a href="index.php"><img src="img/logos/bl.png" alt="logo"></a>
                        <!-- Name -->
                        <h3>Sign into your account</h3>
                        <!-- Form start -->
                        <form method="post">
                            <div class="form-group">
                                <input type="email" name="txtEmail" class="input-text" placeholder="Email Address" style="border-left-width: 3px;border-left-color: #ff214f;">
                            </div>
                            <div class="form-group">
                                <input type="password" name="txtPassword" class="input-text" placeholder="Password" style="border-left-width: 3px;border-left-color: #ff214f;">
                            </div>
                            <div class="checkbox">
                               <!--  <div class="ez-checkbox pull-left">
                                    <label>
                                        <input type="checkbox" class="ez-hide">
                                        Remember me
                                    </label>
                                </div> -->
                                <a href="ForgotPassword.php" class="link-not-important pull-right">Forgot Password</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" name="btnLogin" class="btn-md button-theme btn-block">login</button>
                            </div>
                        </form>
                        <!-- Social List -->
                        <!-- <ul class="social-list clearfix">
                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                        </ul> -->
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>Don't have an account? <a href="SignUp.php">Register here</a></span>
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<!-- Contact section end -->

<!-- Full Page Search -->
<?php //include_once("FullPageSearch.php");?>

<?php include_once("LoadJS.php");?>


</body>

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->
</html>