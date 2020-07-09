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
                                <div class="col-sm-12 col-md-6"><h4>Hey,<span style="color: #ff214f;"> <?php echo $_SESSION['UserFirstName'];?></span></h4></div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="breadcrumb-nav">
                                        <ul>
                                            <li>
                                                <a href="index.php">Index</a>
                                            </li>
                                            <li>
                                                <a href="Dashboard.php?UserID=<?php echo $_SESSION['UserID'];?>">Dashboard</a>
                                            </li>
                                            <li class="active">
                                                RecentProperties
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
                            <h3>Recent Properties List</h3>
                            <table class="manage-table" >
                                <tbody>
                            <!-- Fetch Property Of User -->
                                <?php 
                            
                                $Select_Property="select * from tblProperty where IsApprovedByAgent=0 and IsActive=1 and IsPayment=1";
                                $Exe_Property=mysqli_query($con,$Select_Property) or die(mysqli_error($con));
                                while($Fetch_Property=mysqli_fetch_array($Exe_Property))
                                {
                                    /*Select Bid Request For Check Request Sent or not*/
                                    $selectBidRequest="select * from tblBid where PropertyID='".$Fetch_Property['PropertyID']."' and AgentID='".$_SESSION['UserID']."' ";
                                    $ExecuteBidRequest=mysqli_query($con,$selectBidRequest) or die(mysqli_error($con));
                                    $FetchBR=mysqli_fetch_array($ExecuteBidRequest);

                                    /*Count*/
                                    $count="select count(PropertyID) as Bids from tblbid where PropertyID=".$Fetch_Property['PropertyID'];
                                    $ExeC=mysqli_query($con,$count) or die(mysqli_error($con));
                                    $FetchC=mysqli_fetch_array($ExeC);


                            ?>
                            <!-- Fetch Project Of User -->
                                <tr class="responsive-table">
                                    <td class="listing-photoo">
                                        <!-- Select Project Image Query -->
                                        <?php
                                            $Select_image="select * from tblimage where IsDefault=1 and PropertyID=".$Fetch_Property['PropertyID'];
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
                                            </span>
                                        </h2>
                                        <h5 class="d-none d-xl-block d-lg-block d-md-block"><i class="flaticon-pin"></i> <?php  echo $Fetch_Property['Address']; ?></h5>
                                        <h6 class="table-property-price">₹.<?php  echo $Fetch_Property['ExpectedPrice']; ?> /-</h6>
                                        
                                    </td>
                                    <td class="expire-date">
                                        <h5 class="d-none d-xl-block d-lg-block d-md-block"><?php  echo $FetchC['Bids']; ?> Bids</h5>
                                    </td>
                                    <td class="action">
                                        <!-- <a href="bookings.php"><button class="btn btn-md button-theme" style="font-size: 10px;">response</button></a> -->
                                       <!--  <a href="DbMyPropertyEdit.php?PropertyID=<?php  echo $Fetch_Property['PropertyID']; ?>"><i class="fa fa-pencil"></i> Edit</a> -->
                                        <?php
                                        if($FetchBR['AgentID']==$_SESSION['UserID'])
                                        {
                                        ?>  <center>
                                            <h5 style="font-size: 12px;"><i class="fa fa-hourglass-half"></i><br>Request Pending</h5>
                                            
                                            </center>
                                        <?php
                                        }else
                                        {
                                        ?>
                                            <a href="DBAgentBidProperty.php?PropertyID=<?php echo $Fetch_Property['PropertyID'];?>"><i class="fa fa-eye"></i> Bid</a>
                                            <!-- <a href="bookings.php?PropertyID=<?php  echo $Fetch_Property['PropertyID']; ?>"><i class="fa fa-eye"></i> View</a> -->
                                        <?php
                                        }
                                        ?>
                                       <!--  <a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a> -->
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