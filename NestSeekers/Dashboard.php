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
                                                <a href="#" class="active">Dashboard</a>
                                            </li>
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


                                if($_SESSION['UserType']=='O')
                                {
                        ?>
                        <!-- Owner Dash board Start -->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="ui-item bg-success">
                                    <div class="left">
                                        <?php
                                            $SalePropertyCount="Select count(*) as SaleProperty from tblProperty where IsActive=1 AND IsPayment=1 and UserID=".$_SESSION['UserID'];
                                            $ExeSalePropertyCount=mysqli_query($con,$SalePropertyCount) or die(mysqli_error($con));
                                            $FetchSalePropertyCount=mysqli_fetch_array($ExeSalePropertyCount);                      
                                        ?>
                                        <h4><?php echo $FetchSalePropertyCount['SaleProperty'];?></h4>
                                        <p>Live Property</p>
                                    </div>
                                    <div class="right">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="ui-item bg-warning">
                                    <div class="left">
                                        <?php

                                         $sel="select * from tblVisitorCount";
                                            $Exe=mysqli_query($con,$sel) or die(mysqli_error($con));
                                            $fetch=mysqli_fetch_array($Exe);    ?>
                                        <h4><?php
                                            echo $fetch['Count'];
                                        ?></h4>
                                        <p>Visitores</p>
                                    </div>
                                    <div class="right">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="ui-item bg-active">
                                    <div class="left">
                                    <?php
                                            $SalePropertyCount="SELECT COUNT(tblProperty.PropertyID) AS Reviews,tblProperty.IsActive, tblUser.UserID, tblresponse.PropertyID
                                                FROM tblProperty
                                                INNER JOIN tblUser ON tblProperty.UserID = tblUser.UserID
                                               INNER JOIN tblresponse ON tblProperty.PropertyID = tblresponse.PropertyID
                                                WHERE tblProperty.IsActive=1 AND tblProperty.IsPayment=1 AND tblUser.UserID=".$_SESSION['UserID'];
                                            $ExeSalePropertyCount=mysqli_query($con,$SalePropertyCount) or die(mysqli_error($con));
                                            $FetchSalePropertyCount=mysqli_fetch_array($ExeSalePropertyCount);                      
                                        ?>
                                        <h4><?php echo $FetchSalePropertyCount['Reviews'];?></h4>
                                        <p>Reviews</p>
                                    </div>
                                    <div class="right">
                                        <i class="fa fa-comments-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="ui-item bg-dark">
                                    <div class="left">
                                        <?php
                                            $SalePropertyCount="Select count(*) as WishList from tblwishlist where IsActive=1 and UserID=".$_SESSION['UserID'];
                                            $ExeSalePropertyCount=mysqli_query($con,$SalePropertyCount) or die(mysqli_error($con));
                                            $FetchSalePropertyCount=mysqli_fetch_array($ExeSalePropertyCount);                      
                                        ?>
                                        <h4><?php echo $FetchSalePropertyCount['WishList'];?></h4>
                                        <p>Bookmarked</p>
                                    </div>
                                    <div class="right">
                                        <i class="fa fa-heart-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Own Property List -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="dashboard-list">
                                    <div class="dashboard-message bdr clearfix ">
                                        <div class="tab-box-2">
                                            <div class="clearfix mb-30 comments-tr">
                                                <span>Live Properties</span>
                                                <ul class="nav nav-pills float-right" id="pills-tab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active show" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Sale</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="true">Rent</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                     <!-- Fetch Property Of User -->
                                                <?php 
                                            
                                                $Select_Property="SELECT * FROM tblProperty WHERE IsActive=1 AND Status='Rent' AND UserID='".$_SESSION['UserID']."'";
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
                                                    <div class="comment">
                                                        <div class="comment-author" style="width: 150px;">
                                                            <a href="#">
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

                                                                <img src="img/Property/Images/<?php echo $imageName;?>" alt="comments-user">
                                                            </a>
                                                        </div>
                                                        <div class="comment-content" style="margin-left: 160px;">
                                                            <div class="comment-meta">
                                                                <h5>
                                                                    <a href="properties-details.php?PropertyID=<?php echo $Fetch_Property['PropertyID']; ?>">
                                                                      <?php  echo $Fetch_Property['PropertyTitle']; ?>
                                                                    </a>
                                                                </h5>
                                                                <div class="comment-meta">
                                                                     <i class="fa fa-calendar"></i>  
                                                                <?php 
                                                                    $date_Project=date('M d, Y',strtotime($Fetch_Property['CreatedOn']));
                                                                        echo $date_Project;
                                                                ?> 
                                                                <a href="">₹.
                                                                    <?php  
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
                                                                    ?> /-</a>
                                                                </div>
                                                            </div>
                                                            <p><?php  echo $Fetch_Property['Address']; ?> </p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="tab-pane fade active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                       <!-- Fetch Property Of User -->
                                                <?php 
                                            
                                                $Select_Property="SELECT * FROM tblProperty WHERE IsActive=1 AND IsPayment=1 AND Status='Sale' AND UserID='".$_SESSION['UserID']."'";
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
                                                    <div class="comment">
                                                        <div class="comment-author" style="width: 150px;">
                                                            <a href="#">
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

                                                                <img src="img/Property/Images/<?php echo $imageName;?>" alt="comments-user">
                                                            </a>
                                                        </div>
                                                        <div class="comment-content" style="margin-left: 160px;">
                                                            <div class="comment-meta">
                                                                <h5>
                                                                    <a href="properties-details.php?PropertyID=<?php echo $Fetch_Property['PropertyID']; ?>">
                                                                      <?php  echo $Fetch_Property['PropertyTitle']; ?>
                                                                    </a>
                                                                </h5>
                                                                <div class="comment-meta">
                                                                     <i class="fa fa-calendar"></i>  
                                                                <?php 
                                                                    $date_Project=date('M d, Y',strtotime($Fetch_Property['CreatedOn']));
                                                                        echo $date_Project;
                                                                ?> 
                                                                <a href="">₹. <?php  
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
                                                                    ?> /-</a>
                                                                </div>
                                                            </div>
                                                            <p><?php  echo $Fetch_Property['Address']; ?> </p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <?php
                                                    }
                                                    ?>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <!-- Own Property List -->
                        <!-- Owner Dash board End -->
                        <?php
                            }else{
                        ?>
                        <!-- Agent Dashboard start -->
                            <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="ui-item bg-success">
                                    <div class="left">
                                        <?php
                                            $TotalPropertyCount="Select count(*) as TotalProperty from tblProperty WHERE IsActive=1 AND IsPayment=1";
                                            $ExeTotalPropertyCount=mysqli_query($con,$TotalPropertyCount) or die(mysqli_error($con));
                                            $FetchTotalPropertyCount=mysqli_fetch_array($ExeTotalPropertyCount);                      
                                        ?>
                                        <h4><?php echo $FetchTotalPropertyCount['TotalProperty'];?></h4>
                                        <p>Live Properties</p>
                                    </div>
                                    <div class="right">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="ui-item bg-warning">
                                    <div class="left">
                                        <?php

                                         $sel="select * from tblVisitorCount";
                                            $Exe=mysqli_query($con,$sel) or die(mysqli_error($con));
                                            $fetch=mysqli_fetch_array($Exe);    ?>
                                        <h4><?php
                                            echo $fetch['Count'];
                                        ?></h4>
                                        <p>Visitores</p>
                                    </div>
                                    <div class="right">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="ui-item bg-active">
                                    <div class="left">
                                    <?php
                                            $BidmyPropertyCount="Select count(*) as BidMy from tblBid where AgentID=".$_SESSION['UserID'];
                                            $ExeBidmyPropertyCount=mysqli_query($con,$BidmyPropertyCount) or die(mysqli_error($con));
                                            $FetchBidmyPropertyCount=mysqli_fetch_array($ExeBidmyPropertyCount);                      
                                        ?>
                                        <h4><?php echo $FetchBidmyPropertyCount['BidMy'];?></h4>
                                        <p>My Bid</p>
                                    </div>
                                    <div class="right">
                                        <i class="fa fa-comments-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="ui-item bg-dark">
                                    <div class="left">
                                         <?php
                                            /*$SalePropertyCount="SELECT COUNT(tblProperty.PropertyID) AS Reviews,tblProperty.IsActive, tblUser.UserID, tblresponse.PropertyID
                                                FROM tblProperty
                                                INNER JOIN tblUser ON tblProperty.UserID = tblUser.UserID
                                               INNER JOIN tblresponse ON tblProperty.PropertyID = tblresponse.PropertyID
                                                WHERE tblProperty.IsActive=1 AND tblUser.UserID=".$_SESSION['UserID'];*/
                                                $DealPropertyCount="SELECT COUNT(PropertyID) AS DealProperty
                                                                    FROM tblProperty
                                                                    WHERE IsApprovedByAgent=1 AND AgentID=".$_SESSION['UserID'];
                                            $ExeDealPropertyCount=mysqli_query($con,$DealPropertyCount) or die(mysqli_error($con));
                                            $FetchDealPropertyCount=mysqli_fetch_array($ExeDealPropertyCount);                      
                                        ?>
                                        
                                        <h4><?php echo $FetchDealPropertyCount['DealProperty'];?></h4>
                                        <p>Bid Accept</p>
                                    </div>
                                    <div class="right">
                                        <i class="fa fa-heart-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Agent Dashboard -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="dashboard-list">
                                    <div class="dashboard-message bdr clearfix ">
                                        <div class="tab-box-2">
                                            <div class="clearfix mb-30 comments-tr">
                                                <span>My Deal Latest</span>
                                                <ul class="nav nav-pills float-right" id="pills-tab" role="tablist">
                                                    <!-- <li class="nav-item">
                                                        <a class="nav-link active show" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Sale</a>
                                                    </li> -->
                                                    <li class="nav-item">
                                                        <a class="nav-link " id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="true" >Show</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                     <!-- Fetch Property Of User -->
                                                <?php 
                                            
                                                $Select_Property="SELECT * FROM tblProperty WHERE IsActive=1 AND AgentID='".$_SESSION['UserID']."'";
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
                                                    <div class="comment">
                                                        <div class="comment-author" style="width: 150px;">
                                                            <a href="#">
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

                                                                <img src="img/Property/Images/<?php echo $imageName;?>" alt="comments-user">
                                                            </a>
                                                        </div>
                                                        <div class="comment-content" style="margin-left: 160px;">
                                                            <div class="comment-meta">
                                                                <h5>
                                                                    <a href="properties-details.php?PropertyID=<?php echo $Fetch_Property['PropertyID']; ?>">
                                                                      <?php  echo $Fetch_Property['PropertyTitle']; ?>
                                                                    </a>
                                                                     <span style="border-radius: 5px;padding: 1px;padding-right: 10px;padding-left: 10px;background-color: #ff214f;color: white;font-size: 12px;">
                                                                    For 
                                                                    <?php echo $Fetch_Property['Status'];?>
                                                                </span>
                                                                </h5>
                                                                <div class="comment-meta">
                                                                     <i class="fa fa-calendar"></i>  
                                                                <?php 
                                                                    $date_Project=date('M d, Y',strtotime($Fetch_Property['CreatedOn']));
                                                                        echo $date_Project;
                                                                ?> 
                                                                <a href="">₹.
                                                                     <?php 
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
                                            ?>
                                                                 /-</a>
                                                                </div>
                                                            </div>
                                                            <p><?php  echo $Fetch_Property['Address']; ?> </p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="tab-pane fade active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                       <!-- Fetch Property Of User -->
                                                <?php 
                                            
                                                $Select_Property="SELECT * FROM tblProperty WHERE IsActive=1 AND Status='Sale' AND UserID='".$_SESSION['UserID']."'";
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
                                                    <div class="comment">
                                                        <div class="comment-author" style="width: 150px;">
                                                            <a href="#">
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

                                                                <img src="img/Property/Images/<?php echo $imageName;?>" alt="comments-user">
                                                            </a>
                                                        </div>
                                                        <div class="comment-content" style="margin-left: 160px;">
                                                            <div class="comment-meta">
                                                                <h5>
                                                                    <a href="properties-details.php?PropertyID=<?php echo $Fetch_Property['PropertyID']; ?>">
                                                                      <?php  echo $Fetch_Property['PropertyTitle']; ?>
                                                                    </a>
                                                                </h5>
                                                                <div class="comment-meta">
                                                                     <i class="fa fa-calendar"></i>  
                                                                <?php 
                                                                    $date_Project=date('M d, Y',strtotime($Fetch_Property['CreatedOn']));
                                                                        echo $date_Project;
                                                                ?> 
                                                                <a href="">₹.<?php  echo $Fetch_Property['ExpectedPrice']; ?> /-</a>
                                                                </div>
                                                            </div>
                                                            <p><?php  echo $Fetch_Property['Address']; ?> </p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <?php
                                                    }
                                                    ?>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <!-- Agent Dashboard End -->


                            

                        <?php
                                }
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