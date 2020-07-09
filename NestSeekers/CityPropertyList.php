<?php include_once("admin/Connection.php");

	$title=$add=$area=$beds=$baths=$garage=$uname="";
	$select_query="select * from tblProperty where IsActive=1 and IsPayment=1 and PropertyTypeID = '".$_REQUEST['PropertyTypeID']."' and Status='".$_REQUEST['Status']."' and CityID='".$_REQUEST['CityID']."' ";
    /*$select_query="select * from tblproperty as p,tblbedroom as b where p.IsActive=1 and";*/
    $Execute_Q=mysqli_query($con,$select_query) or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/properties-list-rightside.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:33:07 GMT -->
<head>
  <?php include_once("LoadFile1.php");?>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
    <?php //include_once("PageLoader.php");?>
<!-- Main header start -->
    <?php include_once("Menu.php");?>
<!-- Main header end -->

<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Properties Listing</h1>
            <ul class="breadcrumbs">
                <li><a href="index.html">Home</a></li>
                <li class="active">Properties Listing</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Properties section start -->
<div class="properties-section content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <!-- Option bar start -->
                <!-- <div class="option-bar d-none d-xl-block d-lg-block d-md-block d-sm-block">
                    <div class="row">
                        <div class="col-lg-6 col-md-7 col-sm-7">
                            <div class="sorting-options2">
                                <span class="sort">Sort by:</span>
                                <select class="selectpicker search-fields" name="default-order">
                                    <option>Default Order</option>
                                    <option>Price High to Low</option>
                                    <option>Price: Low to High</option>
                                    <option>Newest Properties</option>
                                    <option>Oldest Properties</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5 col-sm-5">
                            <div class="sorting-options">
                                <a href="properties-list-rightside.html" class="change-view-btn active-view-btn"><i class="fa fa-th-list"></i></a>
                                <a href="properties-grid-rightside.html" class="change-view-btn"><i class="fa fa-th-large"></i></a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- Property box 2 start -->
                <?php

                if(isset($_REQUEST['WishListPropertyID']))
                {
                    if(isset($_SESSION['UserID']))
                    {
                            $UserID = $_SESSION['UserID'];
                    $insert_query="insert into tblwishlist values(null,now(),$UserID,'".$_REQUEST['WishListPropertyID']."',1)";
                    $Exe_InsertProperty=mysqli_query($con,$insert_query)or die(mysqli_error($con));
                    echo '<script>alert("Added"); </script>';
                        header("location:BuyProperties.php");
                    }else
                    {
                           echo '<script>alert("You Are not Login"); </script>';
                           
                    }
                    
                }

    			while($fetch=mysqli_fetch_array($Execute_Q))
    			{
                
               
                ?>
                <form method="POST">
                <div class="property-box-2" >
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-pad">
                            <div class="property-thumbnail">
                                <a href="properties-details.html" class="property-img">
                                	  <!-- Select Project Image Query -->
                                        <?php
                                            $Select_image="select * from tblimage where IsDefault=1 and PropertyID=".$fetch['PropertyID'];
                                            $Exe_image=mysqli_query($con,$Select_image) or die(mysqli_error($con));
                                            $Fetch_image=mysqli_fetch_array($Exe_image);
                                            $imageName=$Fetch_image['ImageName'];
                                              if($imageName=="" || !file_exists("img/Property/Images/$imageName"))
                                              {
                                                $imageName="NoImage.png";
                                              }
                                             
                                        ?>

    								 <!-- <img src="img/Property/Images/<?php echo $imageName;?>" alt="properties" class="img-fluid"> -->
									<!-- 
                                	 -->
                                    <img src="img/Property/Images/<?php echo $imageName;?>" style="height: 250px;" alt="properties" class="img-fluid">
                                    <div class="price-box" style="float: left;margin-bottom: 185px; margin-right: 205px;">
                                        <label style="background-color: #ff214f;color: white;
                                         height:30px; width: 70px;text-align: center; padding-top: 3px;border-radius: 5px;">
                                             <?php if(isset($fetch)) echo $fetch['Status']; ?>
                                         </label>
                                         
                                         <!-- <label style="background-color: #ff214f;
                                        height:30px; width: 70px; text-align:center; margin-top: -3250px; "  >
                                             <i class="fa fa-heart"></i>
                                         </label> -->

                                         
                                    </div>
                                    
                                   <div class="price-box">
                                    ₹&nbsp;
                                    <?php 
                                        if($fetch['Status']=='Sale')
                                        {
                                            if($fetch['IsApprovedByAgent']==1)
                                            {
                                            $selectAgent="select * from tblbid Where AgentID='".$fetch['AgentID']."'  AND PropertyID='".$fetch['PropertyID']."'";
                                            $ExeSelAgent=mysqli_query($con,$selectAgent) or die(mysqli_error($con));
                                            $fetchSelAgent=mysqli_fetch_array($ExeSelAgent);

                                            echo $fetchSelAgent['Price'];
                                            }
                                            else{
                                                 echo $fetch['ExpectedPrice'];
                                            }
                                        }
                                        else
                                        {
                                            if($fetch['IsApprovedByAgent']==1)
                                            {
                                            $selectAgent="select * from tblbid Where AgentID='".$fetch['AgentID']."'  AND PropertyID='".$fetch['PropertyID']."'";
                                            $ExeSelAgent=mysqli_query($con,$selectAgent) or die(mysqli_error($con));
                                            $fetchSelAgent=mysqli_fetch_array($ExeSelAgent);

                                             echo $fetchSelAgent['Price'];
                                            }else{
                                                  echo $fetch['MonthlyRent'];
                                            }
                                          
                                        }   
                                        ?><span>&nbsp;INR 
                                        
                                    <?php if($fetch['Status']=='Rent')
                                            {
                                    ?> (Per month)
                                    <?php
                                            }
                                    ?>
                                    </span>
                                </div>


                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-pad"  
                        <?php if($fetch['IsVerified']==1)
                            {
                        ?>
                         style="background-image: url('img/Property/logo.png');background-repeat: no-repeat;background-position: 250px -50px;background-size: 220px;" 
                        <?php 
                            }   
                        ?> >
                            <div class="detail" >
                                <div class="hdg" >
                                    <h3 class="title">
                                        <a href="properties-details.php?PropertyID=<?php echo $fetch['PropertyID']; ?>"><?php if(isset($fetch)) echo $fetch['PropertyTitle']; ?></a>
                                        <?php if($fetch['IsApprovedByAgent']==1)
                            {
                        ?>
                            <i class="fa  fa-check-circle " style="color: #0d5202;font-size: 13px;">&nbsp;Verified Agent</i>
                        <?php 
                            }
                        ?> 

                                    <span style="font-size: 1px;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<i class="flaticon-calendar"></i>&nbsp;<?php if(isset($fetch)) echo $fetch['CreatedOn']; ?>
                                    </span>
                                    </h3>

                                    <h5 class="location">
                                        <a href="properties-details.html">

                                            <i class="flaticon-pin"></i><?php if(isset($fetch)) echo $fetch['Address']; ?>
                                        </a>
                                    </h5>
                                </div>
                                <ul class="facilities-list clearfix" style="background-color: none;background: rgba(0, 0, 0, 0);" ><!-- style="background-image: url('img/Property/logo.png');position: absolute;background-size: 130px;background-repeat: no-repeat;" -->
                                    <li>
                                        <span>Area</span><?php if(isset($fetch)) echo $fetch['Area']; ?> Sqft
                                    </li>
                                    <li>
                                        <span>Bhk

                                        <?php
                                        	$select_bed="select * from tblBedRoom where BedRoomID='".$fetch['BedRoomID']."'";
    										/*$select_query="select * from tblproperty as p,tblbedroom as b where p.IsActive=1 and";*/
    									$Execute_Bed=mysqli_query($con,$select_bed) or die(mysqli_error($con));
    									$fetchBed=mysqli_fetch_array($Execute_Bed);?>
                                        </span> <?php if(isset($fetchBed)) echo $fetchBed['BedRoomValue']; ?>
                                    </li>
                                    <li>
                                        <span>Baths

                                        	<?php
                                        	$select_bath="select * from tblbathroom where BathRoomID='".$fetch['BathRoomID']."'";
    										/*$select_query="select * from tblproperty as p,tblbedroom as b where p.IsActive=1 and";*/
    									$Execute_Bath=mysqli_query($con,$select_bath) or die(mysqli_error($con));
    									$fetchBath=mysqli_fetch_array($Execute_Bath);?> 
                                        </span>
                                        <?php if(isset($fetchBath)) echo $fetchBath['BathRoomValue']; ?>
                                    </li>

                                    <li>
                                        <span>Furnished Status

                                        	<?php
                                        	$select_fur="select * from tblfurnishedstatus where FurnishedStatusID='".$fetch['FurnishedStatusID']."'";
    										/*$select_query="select * from tblproperty as p,tblbedroom as b where p.IsActive=1 and";*/
    									$Execute_fur=mysqli_query($con,$select_fur) or die(mysqli_error($con));
    									$fetchFur=mysqli_fetch_array($Execute_fur);?> 
                                        </span>
                                        <?php if(isset($fetchFur)) echo $fetchFur['FurnishedStatusType']; ?>
                                    </li>
                                
                                </ul>
                                 <div class="footer">

                                   <!--  <i class="flaticon">


                                    <button id="btnwishlist" name="btnwishlist" style="background-color:#ff214f; color:white;border-radius:5px; border:none;">
                                        <i class="fa fa-heart"></i>Wishlist
                                    </button>
                                    </i> -->
                                    <a href="?WishListPropertyID=<?php echo $fetch['PropertyID'];?>" style="color: #ff214f;"> <i class="fa fa-heart"></i> WishList</a>

                                     
                                    <a href="#" tabindex="0" style="margin-left: 170px;">
                                        <i class="flaticon-people"></i>
                                        <?php
                                            $select_user="select * from tbluser where UserID='".$fetch['UserID']."'";
                                            /*$select_query="select * from tblproperty as p,tblbedroom as b where p.IsActive=1 and";*/
                                        $Execute_user=mysqli_query($con,$select_user) or die(mysqli_error($con));
                                        $fetchUser=mysqli_fetch_array($Execute_user);?> 
                                        <?php if(isset($fetchUser)) echo $fetchUser['FirstName'];?>
                                        <?php if(isset($fetchUser)) echo $fetchUser['LastName'];?>
                                    </a>
                                    
                                    
                                    
                                    <!-- <button class="search-button" style="background-color:#ff214f; color:white; margin-left: 220px;    
                                        height:30px; width: 70px;text-align: center; font-size:10px; padding-top: 3px;border-radius: 5px; margin-bottom:-100px;">
                                        Favourite
                                    </button> -->
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

                <?php
                	}
                ?>
            
                <!-- Page navigation start -->
                <div class="pagination-box hidden-mb-45 text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#">Prev</a>
                            </li>
                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="properties-list-leftsidebar.html">2</a></li>
                            <li class="page-item"><a class="page-link" href="properties-list-fullwidth.html">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="properties-list-leftsidebar.html">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-right">
                    <!-- Advanced search start -->
                    <?php include_once("AdvanceSearch.php");?>
                    <!-- Recent properties start -->
                    <!-- Posts by category Start -->
                    
                    <!-- Our agent sidebar start -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Properties section end -->

<!-- Footer start -->
<?php include_once("Footer.php");?>
<!-- Footer end -->

<!-- Sub footer start -->
<?php include_once("SubFooter.php");?>
<!-- Sub footer end -->

<!-- Full Page Search -->
<!--<div id="full-page-search">
    <button type="button" class="close">×</button>
    <form action="http://storage.googleapis.com/themevessel-products/neer/index.html#">
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-sm button-theme">Search</button>
    </form>
</div>-->
<?php include_once("LoadJS.php");?>
</body>

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/properties-list-rightside.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:34:37 GMT -->
</html>