<?php include_once("admin/Connection.php");?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->
<head>
    <?php include_once("LoadFile1.php");?>
</head>
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
                                <div class="col-sm-12 col-md-6"><h4>Hello ,<span style="color: #ff214f;"> <?php echo $_SESSION['UserFirstName'];?></span></h4></div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="breadcrumb-nav">
                                        <ul>
                                            <li>
                                                <a href="index.php">Index</a>
                                            </li>
                                            <li>
                                                <a href="Dashboard.php?UserID=<?php echo $_SESSION['UserID'];?>">Dashboard</a>
                                            </li>
                                           <li  class="active">
                                                MyDeal
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php 
                        if($_SESSION['UserType']=='A' && $_SESSION['UserIsVerified']==0)
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
                                <h3>Deal Property List</h3>
                                <table class="manage-table" >
                                    <tbody>
                                <!-- Fetch Property Of User -->
                                    <?php 
                                
                                            $Select_Property="SELECT * FROM tblProperty WHERE IsActive=1  AND AgentID='".$_SESSION['UserID']."'";
                                            $Exe_Property=mysqli_query($con,$Select_Property) or die(mysqli_error($con));
                                            while($Fetch_Property=mysqli_fetch_array($Exe_Property))
                                            {

                                                /*Find Bid id*/
                                                if($Fetch_Property['IsApprovedByAgent']==1)
                                                {   $ContactAgent=$Fetch_Property['AgentID'];
                                                        $selectBid="select * from tblBid where AgentID='".$ContactAgent."' AND PropertyID='".$Fetch_Property['PropertyID']."'";
                                                        $ExeBid=mysqli_query($con,$selectBid) or die(mysqli_error($con));
                                                        $FetchBid=mysqli_fetch_array($ExeBid);
                                                }

                                    ?>
                                                <!-- Fetch Project Of User -->
                                                    <tr class="responsive-table"  <?php if($Fetch_Property['IsVerified']==1)
                                                {
                                            ?>
                                             style="background-image: url('img/Property/logo.png');background-repeat: no-repeat;background-position: 650px -30px;background-size: 220px;" 
                                            <?php 
                                                }
                                            ?> >
                                                        <td class="listing-photoo">
                                                            <!-- Select Project Image Query -->
                                                            <?php
                                                                $Select_image="SELECT * FROM tblimage WHERE IsDefault=1 AND PropertyID=".$Fetch_Property['PropertyID'];
                                                                $Exe_image=mysqli_query($con,$Select_image) or die(mysqli_error($con));
                                                                $Fetch_image=mysqli_fetch_array($Exe_image);
                                                                $imageName=$Fetch_image['ImageName'];
                                                                  if($imageName=="" || !file_exists("img/Property/Images/$imageName"))
                                                                  {
                                                                    $imageName="NoImage.png";
                                                                  }
                                                                 
                                                            ?>

                                                            <img src="img/Property/Images/<?php echo $imageName;?>" alt="listing-photo" class="img-fluid">
                                                        </td>
                                                        <td class="title-container">
                                                            
                                                            <h2>
                                                                <a href="properties-details.php?PropertyID=<?php echo $Fetch_Property['PropertyID'];?>">
                                                                    <?php  echo $Fetch_Property['PropertyTitle']; ?>
                                                                </a>
                                                                <span style="border-radius: 5px;padding: 1px;padding-right: 10px;padding-left: 10px;background-color: #ff214f;color: white;font-size: 12px;">
                                                                    For 
                                                                    <?php echo $Fetch_Property['Status'];?>
                                                                </span>
                                                                <span style="font-size: 10px;">&nbsp;
                                                                     <i class="fa fa-calendar"></i>  
                                                                        <?php 
                                                                            $date_Project=date('M d, Y',strtotime($Fetch_Property['CreatedOn']));
                                                                                echo $date_Project;
                                                                        ?> 
                                                                   <!--  <?php  echo $Fetch_Property['CreatedOn']; ?> -->
                                                                </span>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <?php if($Fetch_Property['IsApprovedByAgent']==1)
                                                                    {
                                                                ?>
                                                                    <i class="fa  fa-check-circle " style="color: #0d5202;font-size: 18px;">&nbsp;Verified Agent</i>
                                                                <?php 
                                                                    }
                                                                ?> 
                                                            </h2>
                                                            <h5 class="d-none d-xl-block d-lg-block d-md-block"><i class="flaticon-pin"></i> <?php  echo $Fetch_Property['Address']; ?></h5>
                                                            <h6 class="table-property-price">₹. <?php 
                                                if($Fetch_Property['Status']=='Sale')
                                                {
                                                    if($Fetch_Property['IsApprovedByAgent']==1)
                                                    {
                                                    $selectAgent="select * from tblbid Where AgentID='".$Fetch_Property['AgentID']."'  AND PropertyID='".$Fetch_Property['PropertyID']."'";
                                                    $ExeSelAgent=mysqli_query($con,$selectAgent) or die(mysqli_error($con));
                                                    $fetchSelAgent=mysqli_fetch_array($ExeSelAgent);

                                                    echo $fetchSelAgent['Price'];
                                                    }
                                                    else{
                                                         echo $Fetch_Property['ExpectedPrice'];
                                                    }
                                                }
                                                else
                                                {
                                                    if($Fetch_Property['IsApprovedByAgent']==1)
                                                    {
                                                    $selectAgent="select * from tblbid Where AgentID='".$Fetch_Property['AgentID']."'  AND PropertyID='".$Fetch_Property['PropertyID']."'";
                                                    $ExeSelAgent=mysqli_query($con,$selectAgent) or die(mysqli_error($con));
                                                    $fetchSelAgent=mysqli_fetch_array($ExeSelAgent);

                                                     echo $fetchSelAgent['Price'];
                                                    }else{
                                                          echo $Fetch_Property['MonthlyRent'];
                                                    }
                                                  
                                                }   
                                                ?><span>&nbsp;INR 
                                                
                                            <?php if($Fetch_Property['Status']=='Rent')
                                                    {
                                            ?> (Per month)
                                            <?php
                                                    }
                                            ?> /-</h6>
                                                            
                                                        </td>
                                                       
                                                        <td class="action">
                                                        <!--      <?php 

                                                                if($Fetch_Property['IsApprovedByAgent']==1)
                                                                {

                                                            ?>
                                                <a href="DbMyPropertyEdit.php?PropertyID=<?php  echo $Fetch_Property['PropertyID']; ?>&ContactAgent=<?php echo $Fetch_Property['AgentID'];?> &BidID=<?php echo $FetchBid['BidID'];?>"><i class="fa fa-pencil"></i> Edit</a>

                                                    <?php

                                                            }else
                                                            {
                                                                ?>
                                                                    <a href="DbMyPropertyEdit.php?PropertyID=<?php  echo $Fetch_Property['PropertyID']; ?>"><i class="fa fa-pencil"></i> Edit</a>

                                                                <?php

                                                            }
                                                    ?>
 -->
                                                           
                                                            <a href="ResponsePropertyAgent.php?PropertyID=<?php  echo $Fetch_Property['PropertyID']; ?>"><i class="fa fa-eye"></i> Response</a>
                                                           <!--  <a href="?DeleTePropertyID=<?php  echo $Fetch_Property['PropertyID']; ?>" class="delete"><i class="fa fa-remove"></i> Delete</a> --> 
                                                        </td>
                                    </tr>
                                <!-- Fetch Property Of User -->
                                <?php 
                                    }// fetch property close
                                ?>
                                <!-- Fetch Project Of User -->   
                                    </tbody>
                                </table>
                            </div>
                        <?php
                            }
                        ?>
                        <!-- <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="dashboard-list">
                                    <div class="dashboard-message bdr clearfix ">
                                        <div class="tab-box-2">
                                            <div class="clearfix mb-30 comments-tr">
                                                <span>Comments</span>
                                                <ul class="nav nav-pills float-right" id="pills-tab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active show" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Pending</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="true">Approved</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                    <div class="comment">
                                                        <div class="comment-author">
                                                            <a href="#">
                                                                <img src="img/avatar/avatar-3.jpg" alt="comments-user">
                                                            </a>
                                                        </div>
                                                        <div class="comment-content">
                                                            <div class="comment-meta">
                                                                <h5>Maikel Alisa</h5>
                                                                <div class="comment-meta">
                                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                                </div>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem </p>
                                                        </div>
                                                    </div>
                                                    <div class="comment">
                                                        <div class="comment-author">
                                                            <a href="#"><img src="img/avatar/avatar-1.jpg" alt="comments-user"></a>
                                                        </div>
                                                        <div class="comment-content">
                                                            <div class="comment-meta">
                                                                <h5>
                                                                    Maikel Alisa
                                                                </h5>
                                                                <div class="comment-meta">
                                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                                </div>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem </p>
                                                        </div>
                                                    </div>
                                                    <div class="comment mb-0">
                                                        <div class="comment-author">
                                                            <a href="#">
                                                                <img src="img/avatar/avatar-2.jpg" alt="comments-user">
                                                            </a>
                                                        </div>
                                                        <div class="comment-content">
                                                            <div class="comment-meta">
                                                                <h5>
                                                                    Maikel Alisa
                                                                </h5>
                                                                <div class="comment-meta">
                                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                                </div>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                    <div class="comment">
                                                        <div class="comment-author">
                                                            <a href="#">
                                                                <img src="img/avatar/avatar-2.jpg" alt="comments-user">
                                                            </a>
                                                        </div>
                                                        <div class="comment-content">
                                                            <div class="comment-meta">
                                                                <h5>
                                                                    Maikel Alisa
                                                                </h5>
                                                                <div class="comment-meta">
                                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                                </div>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem </p>
                                                        </div>
                                                    </div>
                                                    <div class="comment">
                                                        <div class="comment-author">
                                                            <a href="#">
                                                                <img src="img/avatar/avatar-3.jpg" alt="comments-user">
                                                            </a>
                                                        </div>
                                                        <div class="comment-content">
                                                            <div class="comment-meta">
                                                                <h5>
                                                                    Maikel Alisa
                                                                </h5>
                                                                <div class="comment-meta">
                                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                                </div>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem </p>
                                                        </div>
                                                    </div>
                                                    <div class="comment mb-0">
                                                        <div class="comment-author">
                                                            <a href="#">
                                                                <img src="img/avatar/avatar-1.jpg" alt="comments-user">
                                                            </a>
                                                        </div>
                                                        <div class="comment-content">
                                                            <div class="comment-meta">
                                                                <h5>
                                                                    Maikel Alisa
                                                                </h5>
                                                                <div class="comment-meta">
                                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                                </div>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="dashboard-list">
                                    <div class="dashboard-message bdr clearfix ">
                                        <div class="tab-box-2">
                                            <div class="clearfix mb-30 comments-tr">
                                                <span>Comments</span>
                                                <ul class="nav nav-pills float-right" id="pills-tab2" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active show" id="pills-profile-tab2" data-toggle="pill" href="#pills-profile2" role="tab" aria-controls="pills-profile" aria-selected="false">Pending</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="pills-contact-tab2" data-toggle="pill" href="#pills-contact2" role="tab" aria-controls="pills-contact" aria-selected="true">Approved</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-content" id="pills-tabContent2">
                                                <div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact-tab2">
                                                    <div class="comment">
                                                        <div class="comment-author">
                                                            <a href="#">
                                                                <img src="img/avatar/avatar-3.jpg" alt="comments-user">
                                                            </a>
                                                        </div>
                                                        <div class="comment-content">
                                                            <div class="comment-meta">
                                                                <h5>Maikel Alisa</h5>
                                                                <div class="comment-meta">
                                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                                </div>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem </p>
                                                        </div>
                                                    </div>
                                                    <div class="comment">
                                                        <div class="comment-author">
                                                            <a href="#"><img src="img/avatar/avatar-1.jpg" alt="comments-user"></a>
                                                        </div>
                                                        <div class="comment-content">
                                                            <div class="comment-meta">
                                                                <h5>
                                                                    Maikel Alisa
                                                                </h5>
                                                                <div class="comment-meta">
                                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                                </div>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem </p>
                                                        </div>
                                                    </div>
                                                    <div class="comment mb-0">
                                                        <div class="comment-author">
                                                            <a href="#">
                                                                <img src="img/avatar/avatar-2.jpg" alt="comments-user">
                                                            </a>
                                                        </div>
                                                        <div class="comment-content">
                                                            <div class="comment-meta">
                                                                <h5>
                                                                    Maikel Alisa
                                                                </h5>
                                                                <div class="comment-meta">
                                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                                </div>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade active show" id="pills-profile2" role="tabpanel" aria-labelledby="pills-profile-tab2">
                                                    <div class="comment">
                                                        <div class="comment-author">
                                                            <a href="#">
                                                                <img src="img/avatar/avatar-2.jpg" alt="comments-user">
                                                            </a>
                                                        </div>
                                                        <div class="comment-content">
                                                            <div class="comment-meta">
                                                                <h5>
                                                                    Maikel Alisa
                                                                </h5>
                                                                <div class="comment-meta">
                                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                                </div>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem </p>
                                                        </div>
                                                    </div>
                                                    <div class="comment">
                                                        <div class="comment-author">
                                                            <a href="#">
                                                                <img src="img/avatar/avatar-3.jpg" alt="comments-user">
                                                            </a>
                                                        </div>
                                                        <div class="comment-content">
                                                            <div class="comment-meta">
                                                                <h5>
                                                                    Maikel Alisa
                                                                </h5>
                                                                <div class="comment-meta">
                                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                                </div>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem </p>
                                                        </div>
                                                    </div>
                                                    <div class="comment mb-0">
                                                        <div class="comment-author">
                                                            <a href="#">
                                                                <img src="img/avatar/avatar-1.jpg" alt="comments-user">
                                                            </a>
                                                        </div>
                                                        <div class="comment-content">
                                                            <div class="comment-meta">
                                                                <h5>
                                                                    Maikel Alisa
                                                                </h5>
                                                                <div class="comment-meta">
                                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                                </div>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
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