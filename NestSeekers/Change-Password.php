<?php include_once("admin/Connection.php");

    $pwd="";
    $select_query="select Password from tbluser where UserID='".$_SESSION['UserID']."'";
    $Execute_Q=mysqli_query($con,$select_query) or die(mysqli_error($con));
    $fetch=mysqli_fetch_array($Execute_Q);
    $pwd = base64_decode($fetch['Password']);    

    if (isset($_REQUEST['btnchpwd'])) 
    {
        if($_REQUEST['txtcurrpwd'] == $pwd)
        {
            if($_REQUEST['txtnewpwd'] == $_REQUEST['txtconfpwd'])
            {
                $Update="update tbluser set Password='".base64_encode($_REQUEST['txtnewpwd'])."' where UserID=".$_SESSION['UserID'];
                //$Exe_Insert=mysqli_query($con,$Update)or die(mysqli_error($con));
                echo 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii';
                ?>            
                    <script type="text/javascript">alert("Password Updated successfully.!")</script>
                <?php
            }    
            else
            {   
                ?>            
                <script type="text/javascript">alert("Sorry new password does not matched.!")</script>
                <?php
            }
        }   
        else
        {   
            ?>            
            <script type="text/javascript">alert("Sorry current password does not matched.!")</script>
            <?php
        }
    }
?>

<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/my-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->
<head>
    <?php include_once("LoadFile1.php");?>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
    <?php include_once("PageLoader.php");?>
<!-- Main header start -->
<header class="main-header header-2 fixed-header">
    <?php include_once("Db_Header.php");?>
</header>
<!-- Main header end -->

<!-- Dashbord start -->
<div class="dashboard">
    <div class="container-fluid">
        <div class="row">

                <?php include_once("Db_Menu.php");?>

            <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">

                            <div class="row">
                                <div class="col-sm-12 col-md-6"><h4>Hey,<span style="color: #ff214f;"> <?php echo $_SESSION['UserFirstName'];?></span> here you can change your password</h4></div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="breadcrumb-nav">
                                        <ul>
                                           <li>
                                                <a href="index.php">Index</a>
                                            </li>
                                            <li>
                                                <a href="Dashboard.php?UserID=<?php echo $_SESSION['UserID'];?>">Dashboard</a>
                                            </li>
                                            <li class="active">Change Password</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <?php 
                            if($_SESSION['IsVerifiedEmail']==0)
                                {
                            ?>
                                 <div class="alert alert-warning" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Warning!</strong> Verify Your Email.<a href="VerifyEmail.php?UserID=<?php echo $_SESSION['UserID'];?>" style="text-transform: lowercase;"> <u><i>Click Here ...</i></u></a>
                                </div>
                            <?php

                                }

                                elseif($_SESSION['UserType']=='A' && $_SESSION['UserIsVerified']==0)
                                {
                            ?>

                      <!--   <div class="row">
                            <div class="col-md-12"> -->
                                <div class="dashboard-list">
                                    <h3 class="heading">Change Password</h3>
                                    <div class="dashboard-message contact-2">
                                        <form action="#" method="GET" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group name">
                                                        <label>Current Password</label>
                                                        <input type="password" name="txtcurrpwd" class="form-control" placeholder="Current Password" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group email">
                                                        <label>New Password</label>
                                                        <input type="password" name="txtnewpwd" class="form-control" placeholder="New Password" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group subject">
                                                        <label>Confirm New Password</label>
                                                        <input type="password" name="txtconfpwd" class="form-control" placeholder="Confirm New Password" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="send-btn">
                                                        <button type="submit" class="btn btn-md button-theme" name="btnchpwd">Change Password</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                           <!--  </div> -->
                           <?php
                                }
                           ?>
                        <?php include_once("Db_BottomFooter.php");?>
                            
                       <!--  </div> -->
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashbord end -->

<!-- Full Page Search -->
<!-- <div id="full-page-search">
    <button type="button" class="close">×</button>
    <form action="http://storage.googleapis.com/themevessel-products/neer/index.html#">
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-sm button-theme">Search</button>
    </form>
</div> -->

<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script  src="js/bootstrap-submenu.js"></script>
<script  src="js/rangeslider.js"></script>
<script  src="js/jquery.mb.YTPlayer.js"></script>
<script  src="js/bootstrap-select.min.js"></script>
<script  src="js/jquery.easing.1.3.js"></script>
<script  src="js/jquery.scrollUp.js"></script>
<script  src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script  src="js/leaflet.js"></script>
<script  src="js/leaflet-providers.js"></script>
<script  src="js/leaflet.markercluster.js"></script>
<script  src="js/dropzone.js"></script>
<script  src="js/slick.min.js"></script>
<script  src="js/jquery.filterizr.js"></script>
<script  src="js/jquery.magnific-popup.min.js"></script>
<script  src="js/jquery.countdown.js"></script>
<script  src="js/maps.js"></script>
<script  src="js/app.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script  src="js/ie10-viewport-bug-workaround.js"></script>
<!-- Custom javascript -->
<script  src="js/ie10-viewport-bug-workaround.js"></script>
</body>

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/my-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->
</html>