   <?php include_once("Connection.php");?>
<!doctype html>
<html lang="en">

<!-- Mirrored from demos.creative-tim.com/bs3/material-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 15:15:18 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    
    <?php include_once("LoadFile1.php");?>
 

</head>

<!-- PHP Admin Login Code -->

    <?php 
        if (isset($_REQUEST['btnLogin'])) {
            $str="select * from tbladmin where Email='".$_REQUEST['txtEmail']."' and Password='".$_REQUEST['txtPassword']."'";
            $run=mysqli_query($con,$str) or die(mysqli_error($con));
            if(mysqli_num_rows($run)>0)
            {
                $fetch=mysqli_fetch_array($run);
                if($fetch['IsActive']==1)
                {
                    $_SESSION['AdminID']=$_REQUEST['AdminID'];

                    header("Location:Dashboard.php");
                    //echo "hi";
                    //alert("hiii");
                }
                else
                {
    ?>

                     <script type="text/javascript" id="error">alert('You are Not Active By NestSeekers');</script>
    <?php
                }
            }
            else
            {
    ?>
                 <script type="text/javascript" id="error">alert('Invalid Email / Password');</script>
    <?php
            }
        }
    ?>

<!-- PHP Admin Login Code -->


<body class="off-canvas-sidebar">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
    <!-- <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="../dashboard.html">Material Dashboard Pro</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="../dashboard.html">
                        <i class="material-icons">dashboard</i>
                        Dashboard
                    </a>
                </li>
                <li class= "">
                    <a href="register.html">
                        <i class="material-icons">person_add</i>
                        Register
                    </a>
                </li>
                <li class= " active ">
                    <a href="login.html">
                        <i class="material-icons">fingerprint</i>
                        Login
                    </a>
                </li>
                <li class= "">
                    <a href="lock.html">
                        <i class="material-icons">lock_open</i>
                        Lock
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav> -->


    <div class="wrapper wrapper-full-page">
            <div class="full-page login-page" filter-color="black" data-image="assets/img/login.jpg">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="post" >
                            <div class="card card-login card-hidden">
                                <div class="card-header text-center" data-background-color="rose">
                                    <h4 class="card-title">Login</h4>
                                    <!-- <div class="social-line">
                                        <a href="#btn" class="btn btn-just-icon btn-simple">
                                            <i class="fa fa-facebook-square"></i>
                                        </a>
                                        <a href="#pablo" class="btn btn-just-icon btn-simple">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#eugen" class="btn btn-just-icon btn-simple">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </div> -->
                                </div>
                               <!--  <p class="category text-center">
                                    Or Be Classical
                                </p> -->
                                <div class="card-content">
                                    <!-- <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">face</i>
                                        </span>

                                        <div class="form-group label-floating">
                                            <label class="control-label">First Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div> -->
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>

                                        <div class="form-group label-floating">
                                            <label class="control-label">Email address</label>
                                            <input type="email" class="form-control" name="txtEmail" id="inputEmail">
                                        </div>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Password</label>
                                            <input type="password" class="form-control" name="txtPassword" id="inputPassword">
                                        </div>
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-rose btn-simple btn-wd btn-lg"  name="btnLogin">Let's go</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once("Footer.php"); ?>

    </div>

    </div>
</body>

    <!-- <?php include_once("FixedPlugIN.php"); ?> -->

</body>

   <?php include_once("LoadJS.php");?>
<!-- Mirrored from demos.creative-tim.com/bs3/material-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 15:15:18 GMT -->
</html>
