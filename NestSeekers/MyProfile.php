<?php    include_once("admin/Connection.php"); ?>

<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->
<head>
    <?php include_once("LoadFile1.php");?>
</head>

<!-- PHP Code -->

    <?php
        $select_query="select * from tbluser where UserID='".$_SESSION['UserID']."'";
        $Execute_Q=mysqli_query($con,$select_query) or die(mysqli_error($con));
        $fetch=mysqli_fetch_array($Execute_Q);


        if(isset($_REQUEST['btnUpdate']))
        {
            echo "string";
        }
    ?>

<!-- PHP Code -->
<body>
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
            <!-- Menu Dashboard -->
                <?php include_once("Db_Menu.php");?>

            <!-- Menu Dashboard -->
             <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><h4>My Profile</h4></div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="breadcrumb-nav">
                                        <ul>
                                            <li>
                                                <a href="index.html">Index</a>
                                            </li>
                                            <li>
                                                <a href="dashboard.html">Dashboard</a>
                                            </li>
                                            <li class="active">My Profile</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-list">
                            <h3 class="heading">Profile Details</h3>
                            <div class="dashboard-message contact-2 bdr clearfix">
                                
                                <form action="#" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <!-- Edit profile photo -->
                                        <div class="edit-profile-photo">
                                            <img src="img/avatar/avatar-6.jpg" alt="profile-photo" class="img-fluid">
                                            <div class="change-photo-btn">
                                                <div class="photoUpload">
                                                    <span><i class="fa fa-upload"></i></span>
                                                    <input type="file" class="upload">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-9">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group name">
                                                        <label>First Name</label>
                                                        <input type="text" name="txtFirstName" class="form-control" placeholder="First Name" value="<?php if(isset($fetch['FirstName'])) echo $fetch['FirstName'];?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group name">
                                                        <label>Middle Name</label>
                                                        <input type="text" name="txtMiddleName" class="form-control" placeholder="Middle Name" value="<?php if(isset($fetch['MiddleName'])) echo $fetch['MiddleName'];?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group email">
                                                        <label>Last Name</label>
                                                        <input type="text" name="txtLastName" class="form-control" placeholder="Last Name" value="<?php if(isset($fetch['LastName'])) echo $fetch['LastName'];?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group gender">
                                                        <label>Gender</label>
                                                        <select class="selectpicker search-fields" name="cmbGender" >
                                                            <option>Choose Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group subject">
                                                        <label>Phone</label>
                                                        <input type="text" name="phone" class="form-control" placeholder="Phone">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group number">
                                                        <label>Email</label>
                                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12">
                                                    <div class="send-btn">
                                                        <button type="submit" name="btnUpdate" class="btn btn-md button-theme">Change Password</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                     </div>
                                </form>

                               
                            </div>
                        </div>
                        
                    </div>
                    <p class="sub-banner-2 text-center">© 2018 Theme Vessel. Trademarks and brands are the property of their respective owners.</p>
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

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->
</html>