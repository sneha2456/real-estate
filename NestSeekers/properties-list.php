<?php include_once("admin/Connection.php");
	
	$title=$add=$area=$beds=$baths=$garage=$uname="";
	$select_query="select * from tblProperty where IsActive=1 and Status='Sale'";
    /*$select_query="select * from tblproperty as p,tblbedroom as b where p.IsActive=1 and";*/
    $Execute_Q=mysqli_query($con,$select_query) or die(mysqli_error($con));
    
    /*$title = $fetch['PropertyTitle'];
    $add = $fetch['Address'];
    $area = $fetch['Area'];
    $beds = $fetch[''];
    $email  = $fetch['Email'];
    $gen = $fetch['Gender'];
    $phone = $fetch['ContactNo'];
    $propic = $fetch['ProfilePic'];*/

?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/properties-list-rightside.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:33:07 GMT -->
<head>
  <?php include_once("LoadFile1.php");?>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
    <?php include_once("PageLoader.php");?>
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
                <div class="option-bar d-none d-xl-block d-lg-block d-md-block d-sm-block">
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
                </div>
                <!-- Property box 2 start -->
                <?php

    			while($fetch=mysqli_fetch_array($Execute_Q))
    			{
                
                ?>
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
                                         height:30px; width: 70px;text-align: center; padding-top: 3px;border-radius: 5px;">Sale</label>
                                    </div>
                                    <div class="price-box"><span>$850.00</span> Per month</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-pad">
                            <div class="detail">
                                <div class="hdg">
                                    <h3 class="title">
                                        <a href="properties-details.php?PropertyID=<?php echo $fetch['PropertyID']; ?>"><?php if(isset($fetch)) echo $fetch['PropertyTitle']; ?></a>
                                    </h3>
                                    <h5 class="location">
                                        <a href="properties-details.html">
                                            <i class="flaticon-pin"></i><?php if(isset($fetch)) echo $fetch['Address']; ?>
                                        </a>
                                    </h5>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <span>Area</span><?php if(isset($fetch)) echo $fetch['Area']; ?> Sqft
                                    </li>
                                    <li>
                                        <span>Beds

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
                                    <a href="#" tabindex="0">
                                        <i class="flaticon-people"></i>
                                        <?php
                                        	$select_user="select * from tbluser where UserID='".$fetch['UserID']."'";
    										/*$select_query="select * from tblproperty as p,tblbedroom as b where p.IsActive=1 and";*/
    									$Execute_user=mysqli_query($con,$select_user) or die(mysqli_error($con));
    									$fetchUser=mysqli_fetch_array($Execute_user);?> 
                                    </a>
                                    <?php if(isset($fetchUser)) echo $fetchUser['FirstName'];?>
                                    <?php if(isset($fetchUser)) echo $fetchUser['LastName'];?>
                                    <span>
                                          <i class="flaticon-calendar"></i><?php if(isset($fetch)) echo $fetch['CreatedOn']; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                    <div class="widget advanced-search">
                        <h3 class="sidebar-title">Advanced Search</h3>
                        <div class="s-border"></div>
                        <form method="GET">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="all-status">
                                    <option>All Status</option>
                                    <option>For Sale</option>
                                    <option>For Rent</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="all-type">
                                    <option>All Type</option>
                                    <option>Apartments</option>
                                    <option>Shop</option>
                                    <option>Restaurant</option>
                                    <option>Villa</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="commercial">
                                    <option>Commercial</option>
                                    <option>Residential</option>
                                    <option>Commercial</option>
                                    <option>Land</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="location">
                                    <option>location</option>
                                    <option>United States</option>
                                    <option>American Samoa</option>
                                    <option>Belgium</option>
                                    <option>Canada</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="bedrooms">
                                            <option>Bedrooms</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="bathroom">
                                            <option>Bathroom</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="balcony">
                                            <option>Balcony</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="garage">
                                            <option>Garage</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="range-slider">
                                <label>Area</label>
                                <div data-min="0" data-max="10000" data-min-name="min_area" data-max-name="max_area" data-unit="Sq ft" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="range-slider">
                                <label>Price</label>
                                <div data-min="0" data-max="150000"  data-min-name="min_price" data-max-name="max_price" data-unit="USD" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                <div class="clearfix"></div>
                            </div>
                            <a class="show-more-options" data-toggle="collapse" data-target="#options-content">
                                <i class="fa fa-plus-circle"></i> Other Features
                            </a>
                            <div id="options-content" class="collapse">
                                <h3 class="sidebar-title">Features</h3>
                                <div class="s-border"></div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox2" type="checkbox">
                                    <label for="checkbox2">
                                        Air Condition
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox3" type="checkbox">
                                    <label for="checkbox3">
                                        Places to seat
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox4" type="checkbox">
                                    <label for="checkbox4">
                                        Swimming Pool
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="checkbox1">
                                        Free Parking
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox7" type="checkbox">
                                    <label for="checkbox7">
                                        Central Heating
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox5" type="checkbox">
                                    <label for="checkbox5">
                                        Laundry Room
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox6" type="checkbox">
                                    <label for="checkbox6">
                                        Window Covering
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox8" type="checkbox">
                                    <label for="checkbox8">
                                        Alarm
                                    </label>
                                </div>
                                <br>
                            </div>
                            <div class="form-group mb-0">
                                <button class="search-button">Search</button>
                            </div>
                        </form>
                    </div>
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