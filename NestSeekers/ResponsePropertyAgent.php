   <?php include_once("admin/Connection.php");?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/bookings.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->

<?php
      $PropertyID = $_REQUEST['PropertyID'];

    if(isset($_REQUEST['IsCancel']))
    {
       // echo $_REQUEST['IsCancel'];
        //echo $_REQUEST['ResponseID'];
        //echo $_REQUEST['ResponseUserID'];

        $UpdateCancel="UPDATE tblResponse SET IsActive='".$_REQUEST['IsCancel']."' WHERE ResponseID=".$_REQUEST['ResponseID'];
        mysqli_query($con,$UpdateCancel) or die(mysqli_error($con));

        header("location:ResponsePropertyOwner.php?PropertyID=$PropertyID");

    }


    if(isset($_REQUEST['ResponseID']))
    {
       /* echo $_REQUEST['IsApprove'];
        echo $_REQUEST['ResponseID'];
        echo $_REQUEST['ResponseUserID'];
        echo $_REQUEST['PropertyID'];*/

               $UpdateResponseSendOwner="UPDATE tblResponse SET IsResponseAgent=1 WHERE ResponseID=".$_REQUEST['ResponseID'];
         mysqli_query($con,$UpdateResponseSendOwner) or die(mysqli_error($con));
       // echo $UpdateResponseSendOwner;

       /* $UpdateResponseApprove="UPDATE tblResponse SET IsApproved='".$_REQUEST['IsApprove']."',ApprovedDate='".now()."' WHERE ResponseID=".$_REQUEST['ResponseID'];
         mysqli_query($con,$UpdateResponseApprove) or die(mysqli_error($con));
        //echo $UpdateResponseApprove;


        $UpdateBidApprove="UPDATE tblbid SET IsActive=0 WHERE PropertyID=".$_REQUEST['PropertyID'];
         mysqli_query($con,$UpdateBidApprove) or die(mysqli_error($con));
        //echo $UpdateBidApprove;

        $UpdateWishListApprove="UPDATE tblwishlist SET IsActive=0 WHERE PropertyID=".$_REQUEST['PropertyID'];
        //echo $UpdateWishListApprove;
         mysqli_query($con,$UpdateWishListApprove) or die(mysqli_error($con));

        $UpdatePropertyApprove="UPDATE tblProperty SET IsActive=0, IsSold=1, SellerID='".$_REQUEST['ResponseUserID']."' WHERE PropertyID=".$_REQUEST['PropertyID'];
        //echo $UpdatePropertyApprove;
         mysqli_query($con,$UpdatePropertyApprove) or die(mysqli_error($con));
        //mysqli_query($con,$UpdateApprove) or die(mysqli_error($con));*/

       //header("location:SoldProperty.php");
    }
?>

<head>
    <?php include_once("LoadFile1.php");?>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<?php //include_once("PageLoader.php");?>

<!-- Main header start -->
<header class="main-header header-2 fixed-header">
    <?php include_once("Db_Header.php");?>
</header>
<!-- Main header end -->

<!-- Dashboard start -->
<div class="dashboard submit-property">
    <div class="container-fluid ">
        <div class="row">

            <?php include_once("Db_Menu.php");?>

            <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>Response</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="index.php">Index</a>
                                        </li>
                                        <li>
                                            <a href="dashboard.php">Dashboard</a>
                                        </li>
                                        <li class="active">Response</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-address dashboard-list">
                        <form method="GET">
                            <h4>Response List</h4>
                           <!-- PHP CODE -->
                           <?php
                               

                                 if($_SESSION['UserType']=='A')
                                 {
                                    $typ='A';
                                 }
                                 elseif($_SESSION['UserType']=='O')
                                 {
                                    $typ='O';

                                 }

                                 //echo "string".$typ;
                                
                               $selectResponse="SELECT tblUser.*,tblResponse.ResponseID, tblResponse.ResponseType,tblResponse.IsResponseAgent, tblResponse.ResponseUserID,tblResponse.ResponseUserName,tblResponse.ResponseUserEmail,tblResponse.ResponseContactNo,tblResponse.IsApproved as IsApprovedBySeller,tblResponse.Message,tblResponse.CreatedOn as ContactDate
                                            FROM tblUser
                                            INNER JOIN tblResponse ON tblUser.UserID = tblResponse.ResponseUserID
                                            WHERE tblResponse.IsActive=1 AND tblResponse.ResponseType='$typ' AND tblResponse.IsApproved=0 AND  tblResponse.PropertyID=".$PropertyID;
                                $Execute_Response=mysqli_query($con,$selectResponse) or die(mysqli_error($con));
                                while($fetch=mysqli_fetch_array($Execute_Response))
                                {
                                ?> 

                            <div class="row pad-20">
                                <div class="col-lg-12">
                                    <div class="comment">
                                        <div class="comment-author">
                                            <a href="#">
                                                <?php
                                                 $imageName=$fetch['ProfilePic'];
                                              if($imageName=="" || !file_exists("img/ProfileImages/$imageName"))
                                              {
                                                $imageName="No.png";
                                              }
                                              ?>
                                                <img src="img/ProfileImages/<?php echo $imageName;?>" alt="comments-user">
                                            </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h5><?php echo $fetch['FirstName']." ".$fetch['LastName'];?></h5>
                                                <div class="comment-meta">
                                                     <?php 
                                                        $date_Project=date('M d, Y',strtotime($fetch['ContactDate']));
                                                        echo $date_Project;
                                                    ?>
                                                  <a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <ul>
                                                <!-- <li>Item :<span> Real Luxury Villa</span></li>
                                                <li>Start date : <span> 18 November 2018</span></li>
                                                <li>End date : <span> 18 November 2018</span></li> -->
                                                <li>Message :<span> <?php echo $fetch['Message'];?></span></li>
                                                <li>Mail : <span><a href="mailto:info@themevessel.com"> <?php echo $fetch['ResponseUserEmail'];?></a> </span></li>
                                                <li>Phone : <span> <a href="tel:+79617036705">+<?php echo $fetch['ResponseContactNo'];?></a></span></li>
                                            </ul>
                                            <div class="buttons mb-20">
                                                <?php
                                                    if($fetch['IsResponseAgent']==1)
                                                    {
                                                ?>
                                                    <h4> Detail sent To Owner</h4>
                                                <?php
                                                    }else
                                                    {
                                                ?>
                                                <a href="?ResponseID=<?php echo $fetch['ResponseID'];?>&PropertyID=<?php echo $PropertyID;?>" class="btn-1 btn-gray"><i class="fa fa-fw fa-check-circle-o"></i> Send To Owner</a>
                                                <a href="?ResponseID=<?php echo $fetch['ResponseID'];?>&ResponseUserID=<?php echo $fetch['ResponseUserID'];?>&IsCancel=0&PropertyID=<?php echo $PropertyID;?>" class="btn-1 btn-gray"><i class="fa fa-fw fa-times-circle-o"></i> Cancel</a>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </form>
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

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/bookings.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->
</html>