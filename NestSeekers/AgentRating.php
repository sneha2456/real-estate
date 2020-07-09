   <?php include_once("admin/Connection.php");?>

<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/my-properties.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->
<head>
    <?php include_once("LoadFile1.php");?>
    <link rel="stylesheet" type="text/css" href="css2/RatingCss.css">

</head>

<!-- DElete Property IsActive update -->
<?php
    $UserID=$_SESSION['UserID'];
    //$AgentID=$_REQUEST['AgentID'];
    //$PropertyID=$_REQUEST['PropertyID'];

    $selAgentDetails="select * from tblUser Where UserID=".$_REQUEST['AgentID'];
    $ExeAgentDetails=mysqli_query($con,$selAgentDetails) or die(mysqli_error($con));
    $FetchAgentDetails=mysqli_fetch_array($ExeAgentDetails);
    /*if(isset($_REQUEST['DeleTePropertyID']))
    {
        $updateProperty="UPDATE tblProperty SET IsActive=0 WHERE PropertyID=".$_REQUEST['DeleTePropertyID'];
        //echo "string".$updateProperty;
        $ExeUpProperty=mysqli_query($con,$updateProperty)or die(mysqli_error($con));
        header("location:my-properties.php?UserID=$UserID");
    }*/

    /*Submit Fedback Agent*/
    if(isset($_REQUEST['btnSubmit']))
            {   
                if(isset($_SESSION['UserID']))
                {
                    $AgentID=$_REQUEST['AgentID'];
                    $rate=$_REQUEST['rating'];
                    $PropertyID=$_REQUEST['PropertyID'];
                    $insert_qry="insert into tblAgentRating values(null,'".$PropertyID."','".$AgentID."','".$_SESSION['UserID']."','".$_REQUEST['txtReview']."','".$rate."',now())";
                    $ExeRate=mysqli_query($con,$insert_qry)or die(mysqli_error($con));
                    //echo $insert_qry;
                }
                //echo $insert_qry;
            
         
            
            /*Mail*/
                /*$Email=$_REQUEST['txtEmail'];
                $Subject="Seed And Spark ";
                $Message="Thank You for your Feedback, We will Surely Work Upon your Feedback ";*/
                //$from="chiragbroz4diu@gmail.com";

                //mail($Email,$Subject,$Message);
            /*End Mail*/
                //header("location:index.php");
            }
            /*Sumit FeedBack Agent*/
?>


<body>
<!-- Google Tag Manager (noscript) -->
    <?php include_once("PageLoader.php");?>

<!-- Main header start -->
<header class="main-header header-2 fixed-header">
    <?php include_once("Db_Header.php");?>
</header>
<!-- Main header end -->

<!-- Dashboard start -->
<div class="dashboard">
    <div class="container-fluid">
        <div class="row">
                
                <?php include_once("Db_Menu.php");?>

            <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                             <div class="row">
                                <div class="col-sm-12 col-md-6"><h4>Hey,<span style="color: #ff214f;"> <?php echo $_SESSION['UserFirstName'];?></span> here you can give Rating </h4></div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="breadcrumb-nav">
                                        <ul>
                                            <li>
                                                <a href="index.php">Index</a>
                                            </li>
                                            <li>
                                                <a href="Dashboard.php?UserID=<?php echo $_SESSION['UserID'];?>">Dashboard</a>
                                            </li>
                                            <li class="active">Agent Rating</li>
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
                            <h3>Agent Details</h3>
                            <!--  -->
                                <div class="row" style="padding-left:30px; ">
                                    <div class="col-xl-6 col-lg-6 align-self-center">
                                        <!-- Contact 1 start -->
                                        <div class="contact-2 pb-hediin-60">
                                            <h5 class="clearfix">Always Support You</h5>
                                            <h3 class="heading">How can we help</h3>
                                            <form  method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group name">
                                                            <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $FetchAgentDetails['FirstName']." ".$FetchAgentDetails['LastName'];?>" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group email">
                                                            <input type="email" name="email" class="form-control" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group subject">
                                                            <input type="text" name="subject" class="form-control" placeholder="Subject">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group number">
                                                            <input type="text" name="phone" class="form-control" placeholder="Number">
                                                        </div>
                                                    </div> -->
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group message">
                                                            <textarea class="form-control" name="txtReview" placeholder="Write message"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                   <!--  <h1>Pure CSS Star Rating Widget</h1> -->
                                                    <fieldset class="rating">
                                                        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                                        <!-- <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> -->
                                                        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                                        <!-- <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label> -->
                                                        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                                        <!-- <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> -->
                                                        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                                        <!-- <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> -->
                                                        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                                        <!-- <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> -->
                                                    </fieldset>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="send-btn">
                                                            <button type="submit" name="btnSubmit" class="btn btn-md button-theme">Send Message</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- Contact 1 end -->
                                    </div>
                                    <div class="offset-xl-1 col-xl-5 col-lg-6">
                                        <img src="img/avatar/avatar-10.png" alt="avatar-10" class="img-fluid">
                                    </div>
                                </div>
                            <!--  -->
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
<!-- Dashboard end -->

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

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/my-properties.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->
</html>