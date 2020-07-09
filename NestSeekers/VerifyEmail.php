<?php include_once("admin/Connection.php");?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->
<head>
    <?php include_once("LoadFile1.php");?>
</head>
<?php
    $UserID=$_SESSION['UserID'];
    if(isset($_REQUEST['btnSendOTP']))
    {
        //echo "string";

       
        /*Send Email*/
                $Email=$_REQUEST['txtEmailToSend'];
                $Subject="Email Verification";
                  $Code2=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
                $msg="WelCome To NestSeekers Real Estate Website, Your Email Verification Password :
                <?php echo $Code2;?></p>
                


                ";
              
                $from="NestSeekers.real.estate2019@gmail.com";

                mail($Email,$Subject,$msg,$from); 

                $_SESSION['Code']=$Code2;
                //echo $_SESSION['Code'];
                //header("location:CheckCode.php?UserID='$Last_Insert_ID'");
            /*End Send Email*/
            header("location:VerifyEmail.php?UserID=$UserID");
    }
    
  /*verify code */

    if(isset($_REQUEST['btnVerify']))
    {
        $Code=$_REQUEST["txtverifyCode"];
        $verify=$_SESSION['Code'];
        if($Code==$verify)
        {
            $Update="Update tblUser set IsVerifiedEmail=1 where UserID=".$_SESSION['UserID'];
            //echo $Update;
            $Exe_Update=mysqli_query($con,$Update)or die(mysqli_error($con));
            echo "<script>alert('Your Email is successfully verified');</script>";
            //Not working alert box
            header("Location:Login.php");

        }
        else
        {
            $error="Code invalid!";
        }
        
            }
   
   /*verify code */
?>
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
                                <div class="col-sm-12 col-md-6"><h4>Hello , <?php echo $_SESSION['UserFirstName'];?></h4></div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="breadcrumb-nav">
                                        <ul>
                                            <li>
                                                <a href="index.html">Index</a>
                                            </li>
                                            <li>
                                                <a href="#">Dashboard</a>
                                            </li>
                                             <li class="active">
                                                Email Verification
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dashboard-list">
                            <h3 class="heading">Email Details</h3>
                            <div class="dashboard-message contact-2 bdr clearfix">
                                <div class="row">
                                   <!--  <div class="col-lg-3 col-md-3">
                                       
                                        <div class="edit-profile-photo">
                                            <img src="img/avatar/avatar-6.jpg" alt="profile-photo" class="img-fluid">
                                            <div class="change-photo-btn">
                                                <div class="photoUpload">
                                                    <span><i class="fa fa-upload"></i></span>
                                                    <input type="file" class="upload">
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-9 col-md-9">
                                        <form action="#" method="GET" enctype="multipart/form-data">
                                            <div class="row">
                                                 <div class="col-lg-8 col-md-8">
                                                    <div class="form-group number">
                                                        <label>Email</label>
                                                        <input type="email" name="txtEmailToSend" class="form-control" placeholder="Email" value="<?php echo $_SESSION['UserEmail'];?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="send-btn">
                                                        
                                                        <button type="submit" class="btn btn-outline-danger bomd" style="border-top-left-radius: 45px;border-bottom-right-radius: 45px;margin-top: 30px;" name="btnSendOTP"><i class="fa fa-repeat "></i> &nbsp;Send OTP</button>

                                                    </div>
                                                </div>
                                               
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="form-group email">
                                                        <label>Enter Verification Code</label>
                                                        <input type="text" name="txtverifyCode" class="form-control" placeholder="Code ">
                                                            <?php 
                                                                if(isset($error))
                                                                {
                                                            ?>

                                                            <label id="lblveritfyCode" style="color: red" >
                                                            <?php echo $error;?>
                                                            </label>
                                                            <?php
                                                                }
                                                            ?>
                                                    </div>
                                                </div>
                                               
                                               
                                                <div class="col-lg-12">
                                                    <div class="send-btn">
                                                        <button type="submit" class="btn btn-md button-theme" name="btnVerify" >Verify</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <?php include_once("Db_BottomFooter.php");?>
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