<?php include_once("admin/Connection.php");

    $uid=$fname=$mname=$lname=$email=$gen=$phone=$propic="";
    $select_query="select * from tbluser where UserID='".$_SESSION['UserID']."'";
    $Execute_Q=mysqli_query($con,$select_query) or die(mysqli_error($con));
    $fetch=mysqli_fetch_array($Execute_Q);
    $uid = $fetch['UserID'];
    $fname = $fetch['FirstName'];
    $mname = $fetch['MiddleName'];
    $lname = $fetch['LastName'];
    $email  = $fetch['Email'];
    $gen = $fetch['Gender'];
    $phone = $fetch['ContactNo'];
    $propic = $fetch['ProfilePic'];

    if (isset($_REQUEST['btnchange'])) 
    {
        if(!empty($_FILES['txtpic']['name']))
        {
            //echo "iii".$_REQUEST['txthdnImageNameOld'];
           if(isset($_REQUEST['txthdnImageNameOld']))
            {
                $oldimg=$_REQUEST['txthdnImageNameOld'];
                //echo $oldimg;
            unlink("img/ProfileImages/$oldimg");
            }
            $img2=date("HMmd").$_FILES['txtpic']['name'];
            move_uploaded_file($_FILES['txtpic']['tmp_name'],"img/ProfileImages/".$img2);
        }
        else
        {
            $img2=$_REQUEST["txthdnImageNameOld"];
        }


         $Update="update tbluser set FirstName='".$_REQUEST['txtfname']."',MiddleName='".$_REQUEST['txtmname']."',LastName='".$_REQUEST['txtlname']."',ProfilePic='".$img2."',Gender='".$_REQUEST['cmbGender']."' where UserID=".$_SESSION['UserID'];
               //echo $Update;
        $Exe_Insert=mysqli_query($con,$Update)or die(mysqli_error($con));
               header("location:my-profile.php?UserID=$uid");
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
             <!-- Menu Dashboard -->
                <?php include_once("Db_Menu.php");?>

            <!-- Menu Dashboard -->
            <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><h4>Hey,<span style="color: #ff214f;"> <?php echo $_SESSION['UserFirstName'];?></span> here you can change profile details</h4></div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="breadcrumb-nav">
                                        <ul>
                                            <li>
                                                <a href="index.php">Index</a>
                                            </li>
                                            <li>
                                                <a href="Dashboard.php?UserID=<?php echo $_SESSION['UserID'];?>">Dashboard</a>
                                            </li>
                                            <li class="active">My Profile</li>
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

                            <!-- <div class="alert alert-success alert-2" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Your listing</strong> YOUR LISTING HAS BEEN APPROVED!
                            </div> -->
                            <div class="alert alert-warning" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Warning!</strong> You are Verified within 24 hours by NestSeekers.<!-- <a href="AgentVerificationForm.php?UserID=<?php echo $_SESSION['UserID'];?>" style="text-transform: lowercase;"> <u><i>Click Here to Upload...</i></u></a> -->
                            </div>
                            <?php
                                }else
                                {
                            ?>
                        <div class="dashboard-list">
                            <h3 class="heading">My Profile</h3>
                            <div class="dashboard-message contact-2 bdr clearfix">
                                <form method="post" enctype="multipart/form-data">

                                        <div class="row">

                                            <div class="col-lg-3 col-md-3">
                                                <!-- Edit profile photo -->
                                                
                                                <div class="edit-profile-photo">
                                                    <?php
                                                      $imageName=$fetch['ProfilePic'];
                                                      if($imageName=="" || !file_exists("img/ProfileImages/$imageName"))
                                                      {
                                                        $imageName="No.png";
                                                      }
                                                    ?>
                                                    <img src="img/ProfileImages/<?php echo $imageName;?>" alt="profile-photo" class="img-fluid" style="width: 100%;height: 100%;">
                                                    <div class="change-photo-btn">
                                                        <div class="photoUpload">
                                                            <span><i class="fa fa-upload"></i></span>
                                                            <input type="file" class="upload" name="txtpic"
                                                            value="img/ProfileImages/<?php if(isset($fetch)) echo $fetch['ProfilePic']; ?>">
                                                            
                                                            <input type="text" name="txthdnImageNameOld" value="<?php echo $fetch['ProfilePic'];?>" hidden >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group name">
                                                                <label>First Name</label>
                                                                <input type="text" name="txtfname" class="form-control" placeholder="First Name" 
                                                                value="<?php echo $fname; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group name">
                                                                <label>Middle Name</label>
                                                                <input type="text" name="txtmname" class="form-control" placeholder="Middle Name"
                                                                value="<?php echo $mname; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group name">
                                                                <label>Last Name</label>
                                                                <input type="text" name="txtlname" class="form-control" placeholder="Last Name"
                                                                value="<?php echo $lname; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group gender">
                                                                <label>Gender</label>
                                                                <select class="selectpicker search-fields" name="cmbGender" >
                                                                    <option>Choose Gender</option>
                                                                            
                                                                    <option value="Male" <?php if($fetch['Gender']=='M') echo "selected";?>  >Male</option>
                                                                    <option value="Female" <?php if($fetch['Gender']=='F') echo "selected";?>>Female</option>

                                                                </select>
                                                            </div>
                                                           <!--  <div class="form-group gender">
                                                                <label>Gender</label>
                                                                <input type="radio" name="rbtnGender"  class="form-control" value="Male">Male
                                                                <input type="radio" name="rbtnGender" class="form-control" value="Female">Female

                                                            </div> -->
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group subject">
                                                                <label>Phone</label>
                                                                <input type="text" name="txtphone" class="form-control" placeholder="Phone"
                                                                value="<?php echo $phone; ?>" readonly >
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group number">
                                                                <label>Email</label>
                                                                <input type="email" name="txtemail" class="form-control" placeholder="Email"
                                                                value="<?php echo $email; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group message">
                                                                <label>Personal info</label>
                                                                <textarea class="form-control" name="message" placeholder="Personal info"></textarea>
                                                            </div>
                                                        </div> -->

                                                        <div class="col-lg-12">
                                                            <div class="send-btn">
                                                                <button type="submit" class="btn btn-md button-theme" name="btnchange">Send Changes</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                            </div>

                                        </div>
                                </form>

                            </div>
                        </div>
                        <?php
                            }
                        ?>
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

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/my-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->
</html>