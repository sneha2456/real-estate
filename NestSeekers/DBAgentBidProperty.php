<?php include_once("admin/Connection.php");?>

<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/properties-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:34:38 GMT -->
<head>
    <?php include_once("LoadFile1.php");?>
</head>
<!-- Fetch PropertyEditDetails Of User -->
<?php 
    
    $UserID=$_SESSION['UserID'];
    $PropertyID=$_REQUEST['PropertyID'];
    $Select_Property="SELECT * FROM tblProperty WHERE IsActive=1 AND PropertyID='".$PropertyID."'";
    $Exe_Property=mysqli_query($con,$Select_Property) or die(mysqli_error($con));
    $Fetch_Property=mysqli_fetch_array($Exe_Property);


    

    if(isset($_REQUEST['btnBid']))
    {
        /*Agent Earn Amount calculation*/
        $PropertyPrice=$_REQUEST['txtPropertyPrice'];
        

        if($Fetch_Property['Status']=='Rent')
        {
                               $InsertBid="insert into tblBid values(null,'".$_SESSION['UserID']."','$PropertyID','".$Fetch_Property['UserID']."',0,'".$_REQUEST['txtPropertyPrice']."','".$_REQUEST['cmbRentAgent']."','".$_REQUEST['txtDescription']."',null,null,0,0,null,1,now())";
        //echo $InsertBid;
        mysqli_query($con,$InsertBid) or die(mysqli_error($con));
        /*header("location:DashBoard.php?UserID=<?php echo $_SESSION['UserID'];?>");*/
        //header("location:DashBoard.php")
            echo "<script type='text/javascript'>alert('Your bid is done Succefully...');</script>";
            header("location:AgentRecentProperty.php?UserID=$UserID");
        }else{
            $ITRate=$_REQUEST['txtITrate'];
        $Earn=(($PropertyPrice*$ITRate)/100);

        /*Insert Bid Details*/
        $InsertBid="insert into tblBid values(null,'".$_SESSION['UserID']."','$PropertyID','".$Fetch_Property['UserID']."',0,'".$_REQUEST['txtPropertyPrice']."',null,'".$_REQUEST['txtDescription']."','".$_REQUEST['txtITrate']."','$Earn',0,0,null,1,now())";
        //echo $InsertBid;
        mysqli_query($con,$InsertBid) or die(mysqli_error($con));
        /*header("location:DashBoard.php?UserID=<?php echo $_SESSION['UserID'];?>");*/
        //header("location:DashBoard.php")
            echo "<script type='text/javascript'>alert('Your bid is done Succefully...');</script>";

            header("location:AgentRecentProperty.php?UserID=$UserID");

    }
}


?>
<!-- Fetch Project Of User -->

<body>
    <?php //include_once("PageLoader.php");?>

<!-- Main header start -->
    <header class="main-header header-2 fixed-header">
     <?php include_once("Db_Header.php");?>
</header>  
<!-- Main header end -->

<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>I Want Bid </h1>
            <ul class="breadcrumbs">
                <li><a href="index.html">Home</a></li>
                <li class="active">Bid Property</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Properties details page start -->
<div class="properties-details-page content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Heading properties 3 start -->
                <div class="heading-properties-3">
                    <h1><?php  echo $Fetch_Property['PropertyTitle']; ?></h1>
                    <div class="mb-30"><span class="property-price">₹&nbsp;<?php  echo $Fetch_Property['ExpectedPrice']; ?> /-</span> <span class="rent">For <?php echo $Fetch_Property['Status'];?></span> <span class="location"><i class="flaticon-pin"></i><?php  echo $Fetch_Property['Address']; ?></span></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12">
               <!-- old -->

                <!-- Photo gallery start -->
                <div class="photo-gallery content-area">
                    <div class="container">
                        <div class="main-title text-center">
                            <h1 class="mb-30">Properties Gallery</h1>
                           <!--  <ul class="list-inline-listing filters filteriz-navigation">
                                <li class="active btn filtr-button filtr" data-filter="all">All</li>
                                <li data-filter="1" class="btn btn-inline filtr-button filtr">Apartment</li>
                                <li data-filter="2" class="btn btn-inline filtr-button filtr">House</li>
                                <li data-filter="3" class="btn btn-inline filtr-button filtr">Office</li>
                            </ul> -->
                        </div>
                        <div class="row filter-portfolio">
                            <div class="cars">
                                 <?php
                                    $Select_image="select * from tblimage where PropertyID=".$Fetch_Property['PropertyID'];
                                    $Exe_image=mysqli_query($con,$Select_image) or die(mysqli_error($con));
                                    while($Fetch_image=mysqli_fetch_array($Exe_image))
                                    {
                                    $imageName=$Fetch_image['ImageName'];
                                      if($imageName=="" || !file_exists("img/Property/Images/$imageName"))
                                      {
                                        $imageName="NoImage.png";
                                      }
                                     
                                ?>
                                <div class="col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="3">
                                    <div class="portfolio-item">
                                        <a href="img/Property/Images/<?php echo $imageName;?>" title="Relaxing Apartment">
                                            <img src="img/Property/Images/<?php echo $imageName;?>" alt="gallery-photo" class="img-fluid" style="width: 300px;height: 200px;" >
                                        </a>
                                        <div class="portfolio-content">
                                            <div class="portfolio-content-inner">
                                                <p>Relaxing Apartment</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Photo gallery end -->
                <!-- Properties description start -->
                <div class="properties-description mb-40">
                    <h3 class="heading-2">
                        Description
                    </h3>
                    <p><?php  echo $Fetch_Property['Description']; ?></p>
                </div>
                <!-- Properties amenities start -->
                <div class="properties-amenities mb-40">
                    <h3 class="heading-2">Features</h3>
                                    <!-- Split Features database -->
                                    <?php

                                    $b=$Fetch_Property['features'];
                                    $features=explode(",", $b);

                                    ?>
                                    <!-- Split Features database -->

                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <ul class="amenities">
                                                <li>
                                                    <?php if(in_array("AirCondition", $features)){
                                                        ?>
                                                        <i class="fa fa-check"></i>
                                                        <?php
                                                            }else
                                                            {
                                                        ?>
                                                        <i class="fa fa-check" style="color: gray;"></i>
                                                        <?php
                                                    }
                                                    ?>                                                         
                                                    Air conditioning
                                                </li>
                                                <li>
                                                    <?php if(in_array("BanquetHall", $features)){
                                                        ?>
                                                        <i class="fa fa-check"></i>
                                                        <?php
                                                    }else
                                                    {
                                                        ?>
                                                        <i class="fa fa-check" style="color: gray;"></i>
                                                        <?php
                                                    }
                                                    ?>                                                         
                                                    Banquet Hall
                                                </li>

                                                <li>
                                                    <?php if(in_array("Bar/Lounge", $features))
                                                    { 
                                                        ?>
                                                        <i class="fa fa-check"></i>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <i class="fa fa-check" style="color: gray;"></i>
                                                        <?php
                                                    }
                                                    ?> 
                                                    Bar / Lounge
                                                </li>
                                                <li>
                                                    <?php if(in_array("Cafeteria/FoodCourt", $features)){ 
                                                           ?>
                                                           <i class="fa fa-check"></i>
                                                           <?php
                                                       }else
                                                       {
                                                        ?>
                                                        <i class="fa fa-check" style="color: gray;"></i>
                                                        <?php
                                                    }
                                                    ?>     Cafeteria / Food Court

                                                </li>
                                                <li>
                                                    <?php if(in_array("ClubHouse", $features)){ 
                                                       ?>
                                                       <i class="fa fa-check"></i>
                                                       <?php
                                                   }else
                                                   {
                                                    ?>
                                                    <i class="fa fa-check" style="color: gray;"></i>
                                                    <?php
                                                }
                                                ?> Club House

                                                </li>
                                                <li>
                                                    <?php if(in_array("Cafeteria/FoodCourt", $features)){ ?>
                                                        <i class="fa fa-check"></i>
                                                        <?php
                                                    }else
                                                    {
                                                        ?>
                                                        <i class="fa fa-check" style="color: gray;"></i>
                                                        <?php
                                                    }
                                                    ?>ConferenceRoom

                                                </li>
                                                <li>
                                                   <?php if(in_array("DTH Television Facility", $features)){ ?>
                                                    <i class="fa fa-check"></i>
                                                    <?php
                                                    }else
                                                    {
                                                        ?>
                                                        <i class="fa fa-check" style="color: gray;"></i>
                                                        <?php
                                                    }
                                                    ?> DTHTelevisionFacility

                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                         <ul class="amenities">
                                            <li>
                                               <?php if(in_array("Cafeteria/FoodCourt", $features)){ ?>
                                                <i class="fa fa-check"></i>
                                                <?php
                                                }else
                                                {
                                                    ?>
                                                    <i class="fa fa-check" style="color: gray;"></i>
                                                    <?php
                                                }
                                                ?>
                                                Gymnasium

                                                </li>
                                                <li>
                                                    <?php if(in_array("InteroomFacility", $features)){?>
                                                        <i class="fa fa-check"></i>
                                                        <?php
                                                    }else
                                                    {
                                                        ?>
                                                        <i class="fa fa-check" style="color: gray;"></i>
                                                        <?php
                                                    }
                                                    ?> Interoom Facility

                                                </li>
                                                <li>
                                                       <?php if(in_array("Internet/Wi-fiConnectivity", $features)){ ?>
                                                        <i class="fa fa-check"></i>
                                                        <?php
                                                        }else
                                                        {
                                                            ?>
                                                            <i class="fa fa-check" style="color: gray;"></i>
                                                            <?php
                                                        }
                                                        ?> Internet/Wi-fi Connectivity

                                                </li>
                                                <li>
                                                     <?php if(in_array("Jogging&StrollingTrack", $features)){ ?>
                                                        <i class="fa fa-check"></i>
                                                        <?php
                                                        }else
                                                        {
                                                            ?>
                                                            <i class="fa fa-check" style="color: gray;"></i>
                                                            <?php
                                                        }
                                                        ?>  Jogging & Strolling Track

                                                </li>
                                                <li>
                                                    <?php if(in_array("LaundryService", $features)){ ?>
                                                        <i class="fa fa-check"></i>
                                                        <?php
                                                    }else
                                                    {
                                                        ?>
                                                        <i class="fa fa-check" style="color: gray;"></i>
                                                        <?php
                                                    }
                                                    ?>Laundry Service

                                                </li>
                                                <li>
                                                    <?php if(in_array("Lift", $features)){ ?>
                                                        <i class="fa fa-check"></i>
                                                        <?php
                                                    }else
                                                    {
                                                        ?>
                                                        <i class="fa fa-check" style="color: gray;"></i>
                                                        <?php
                                                    }
                                                    ?> Lift

                                                </li>
                                                <li>
                                                   <?php if(in_array("MaintenanceStaff", $features)){?>
                                                    <i class="fa fa-check"></i>
                                                    <?php
                                                    }else
                                                    {
                                                        ?>
                                                        <i class="fa fa-check" style="color: gray;"></i>
                                                        <?php
                                                    }
                                                    ?> Maintenance Staff

                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <ul class="amenities">
                                                <li>
                                                <?php if(in_array("OutdoorTennisCourt", $features)){ ?>
                                                    <i class="fa fa-check"></i>
                                                    <?php
                                                        }else
                                                        {
                                                            ?>
                                                            <i class="fa fa-check" style="color: gray;"></i>
                                                            <?php
                                                        }
                                                        ?>  Outdoor Tennis Court

                                                </li>
                                                <li>
                                                    <?php if(in_array("GasFacility", $features)){ ?>
                                                    <i class="fa fa-check"></i>
                                                    <?php
                                                        }else
                                                        {
                                                        ?>
                                                        <i class="fa fa-check" style="color: gray;"></i>
                                                        <?php
                                                        }
                                                    ?> Gas Facility

                                                </li>
                                                <li>
                                                       <?php if(in_array("PowerBackUp", $features)){ ?>
                                                        <i class="fa fa-check"></i>
                                                        <?php
                                                        }else
                                                        {
                                                        ?>
                                                        <i class="fa fa-check" style="color: gray;"></i>
                                                        <?php
                                                    }
                                                    ?>PowerBackUp

                                                </li>
                                                <li>
                                                     <?php if(in_array("Security", $features)){ ?>
                                                        <i class="fa fa-check"></i>
                                                        <?php
                                                    }else
                                                    {
                                                        ?>
                                                        <i class="fa fa-check" style="color: gray;"></i>
                                                        <?php
                                                    }
                                                    ?>  Security

                                                </li>
                                                <li>
                                                     <?php if(in_array("Parking", $features)){?>
                                                        <i class="fa fa-check"></i>
                                                        <?php
                                                        }else
                                                        {
                                                        ?>
                                                        <i class="fa fa-check" style="color: gray;"></i>
                                                        <?php
                                                    }
                                                    ?>Parking

                                                </li>
                                                <li>
                                                        <?php if(in_array("SwimmingPool", $features)){ ?>
                                                            <i class="fa fa-check"></i>
                                                            <?php
                                                        }else
                                                        {
                                                            ?>
                                                            <i class="fa fa-check" style="color: gray;"></i>
                                                            <?php
                                                        }
                                                        ?> Swimming Pool

                                                </li>
                                                <li>
                                                     <?php if(in_array("Garden", $features)){ ?>
                                                        <i class="fa fa-check"></i>
                                                        <?php
                                                    }else
                                                    {
                                                        ?>
                                                        <i class="fa fa-check" style="color: gray;"></i>
                                                        <?php
                                                    }
                                                    ?>Garden

                                                </li>
                                        </ul>
                                        </div>
                                    </div>
                </div>
                <!-- Floor plans start -->
                <div class="floor-plans mb-50">
                    <h3 class="heading-2">Floor Plans</h3>
                    <table>
                        <tbody><tr>
                            <td><strong>Area(Sqft)</strong></td>
                            <td><strong>BHK</strong></td>
                            <td><strong>Bathrooms</strong></td>
                            <td><strong>Furnished Status</strong></td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo $Fetch_Property['Area'];?><sub>(Sqf)</sub>
                            </td>
                            <td>
                                <?php
                                    if($Fetch_Property['BedRoomID']==0 || $Fetch_Property['BedRoomID']==" ")
                                    {
                                        echo "--";
                                    }
                                    else
                                    {
                                         $Select_BedRoom="SELECT * from tblBedRoom WHERE BedRoomID=".$Fetch_Property['BedRoomID'];
                                         $Exe_BedRoom=mysqli_query($con,$Select_BedRoom) or die(mysqli_error($con));
                                         $Fetch_BedRoom=mysqli_fetch_array($Exe_BedRoom);
                                         echo $Fetch_BedRoom['BedRoomValue']."(BedRooms)";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if($Fetch_Property['BathRoomID']==0 || $Fetch_Property['BathRoomID']==" ")
                                    {
                                        echo "--";
                                    }
                                    else
                                    {
                                        $Select_BathRoom="SELECT * from tblBathRoom WHERE BathRoomID=".$Fetch_Property['BathRoomID'];
                                        $Exe_BathRoom=mysqli_query($con,$Select_BathRoom) or die(mysqli_error($con));
                                        $Fetch_BathRoom=mysqli_fetch_array($Exe_BathRoom);
                                        echo $Fetch_BathRoom['BathRoomValue'];
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if($Fetch_Property['FurnishedStatusID']==0 || $Fetch_Property['FurnishedStatusID']==" ")
                                    {
                                        echo "--";
                                    }
                                    else
                                    {
                                        $Select_Furnished="SELECT * from tblfurnishedstatus WHERE furnishedstatusID=".$Fetch_Property['FurnishedStatusID'];
                                        $Exe_Furnished=mysqli_query($con,$Select_Furnished) or die(mysqli_error($con));
                                        $Fetch_Furnished=mysqli_fetch_array($Exe_Furnished);
                                        echo $Fetch_Furnished['FurnishedStatusType'];
                                    }
                                ?> 
                            </td>
                        </tr>
                        </tbody>
                    </table>
                     <table>
                        <tbody><tr>
                            <td><strong>Total Floor</strong></td>
                            <td><strong>Floor Number</strong></td>
                            <td><strong>Category</strong></td>
                            <td><strong>Property Type</strong></td>
                        </tr>
                        <tr>
                            <td>
                                <?php 
                                    if($Fetch_Property['TotalFloorID']==0 || $Fetch_Property['TotalFloorID']==" ")
                                    {
                                        echo "--";
                                    }
                                    else
                                    {
                                        $Select_TotalFloor="SELECT * from tblTotalFloor WHERE TotalFloorID=".$Fetch_Property['TotalFloorID'];
                                        $Exe_TotalFloor=mysqli_query($con,$Select_TotalFloor) or die(mysqli_error($con));
                                        $Fetch_TotalFloor=mysqli_fetch_array($Exe_TotalFloor);
                                        echo $Fetch_TotalFloor['TotalFloorValue'];
                                    }
                                ?> 
                            </td>
                            <td>
                                 <?php 
                                    if($Fetch_Property['FloorNoID']==0 || $Fetch_Property['FloorNoID']==" ")
                                    {
                                        echo "--";
                                    }
                                    else
                                    {
                                        $Select_FloorNo="SELECT * from tblFloorNo WHERE FloorNoID=".$Fetch_Property['FloorNoID'];
                                        $Exe_FloorNo=mysqli_query($con,$Select_FloorNo) or die(mysqli_error($con));
                                        $Fetch_FloorNo=mysqli_fetch_array($Exe_FloorNo);
                                        echo $Fetch_FloorNo['FloorNoValue'];
                                    }
                                ?> 
                            </td>
                            <td>
                                <?php 
                                    $Select_CategoryType="SELECT CategoryID from tblPropertyType WHERE PropertyTypeID=".$Fetch_Property['PropertyTypeID'];
                                    $Exe_CategoryType=mysqli_query($con,$Select_CategoryType) or die(mysqli_error($con));
                                    $Fetch_CategoryType=mysqli_fetch_array($Exe_CategoryType);

                                    $Select_Category="SELECT * from tblCategory WHERE CategoryID=".$Fetch_CategoryType['CategoryID'];
                                    $Exe_Category=mysqli_query($con,$Select_Category) or die(mysqli_error($con));
                                    $Fetch_Category=mysqli_fetch_array($Exe_Category);

                                    echo $Fetch_Category['CategoryName'];
                                ?>
                            </td>
                            <td>
                                 <?php 
                                    $Select_PropertyType="SELECT * from tblPropertyType WHERE PropertyTypeID=".$Fetch_Property['PropertyTypeID'];
                                    $Exe_PropertyType=mysqli_query($con,$Select_PropertyType) or die(mysqli_error($con));
                                    $Fetch_PropertyType=mysqli_fetch_array($Exe_PropertyType);

                                    echo $Fetch_PropertyType['PropertyName'];
                                ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                   <!--  <img src="img/floor-plans.png" alt="floor-plans" class="img-fluid"> -->
                </div>
                <!-- Location start -->
                <div class="location mb-50">
                    <div class="map">
                        <h3 class="heading-2">Property Location</h3>
                       <!--  <div id="map" class="contact-map"></div> -->
                       <?php echo $Fetch_Property['MapURL'];?>
                    </div>
                </div>
                <!-- Inside properties start -->
                <div class="inside-properties mb-50">
                    <h3 class="heading-2">
                        Property Video
                    </h3>
                     <?php
                        $Select_video="select * from tblVideo where PropertyID=".$Fetch_Property['PropertyID'];
                        $Exe_video=mysqli_query($con,$Select_video) or die(mysqli_error($con));
                        while($Fetch_video=mysqli_fetch_array($Exe_video))
                        {
                            /*$imageName=$Fetch_image['ImageName'];
                              if($imageName=="" || !file_exists("img/Property/Images/$imageName"))
                              {
                                $imageName="NoImage.png";
                            }*/
                             //echo $Fetch_video['VideoName'];
                            if(empty($Fetch_video['VideoName']))
                            {
                                echo "Video Not Available";
                            }else{
                            ?>

                            <!--  <iframe src="img/Property/Video/<?php echo $Fetch_video['VideoName'];?>" allowfullscreen=""></iframe> -->
                            <video controls="" style="width: 700px;" autoplay="" > 
                                <source src="img/Property/Video/<?php echo $Fetch_video['VideoName'];?>" type="video/mp4">

                                </video>
                                <?php
                                }
                            }
                        ?>
                    
                </div>
                
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-right">
                   
                    
                    <div class="contact-2 financing-calculator widget">
                        <h5 class="sidebar-title">I Want Bid now</h5>
                        <div class="s-border"></div>
                        <form method="post" >
                            <div class="form-group">
                                <label class="form-label">Property Price (₹&nbsp;)</label>
                                <input type="text" name="txtPropertyPrice" class="form-control" placeholder="₹&nbsp;Price">
                            </div>
                            <?php
                                if($Fetch_Property['Status']=='Rent')
                                {
                            ?>
                                <div class="form-group">
                                <label class="form-label" >Interest Rate (Per Monthly)</label>
                                <select name="cmbRentAgent">
                                    <option value=" ">Select Rate</option>
                                    <option value="1">1 Month</option>
                                    <option value="2">2 Month</option>
                                    <option value="3">3 Month</option>
                                    <option value="4">4 Month</option>
                                </select>
                            </div>
                            <?php
                                }
                                else
                                {
                            ?>
                            <div class="form-group">
                                <label class="form-label">Interest Rate (%)</label>
                                <input type="text" name="txtITrate" class="form-control" placeholder="Rate">
                            </div>
                            <?php
                                }
                            ?>
                            <div class="form-group">
                                <label class="form-label">Description  </label>
                                
                                <textarea type="text" name="txtDescription" class="form-control" placeholder="Enter Description"></textarea>
                            </div>
                            <!-- <div class="form-group">
                                <label class="form-label">Down PaymenT</label>
                                <input type="text" class="form-control" placeholder="$32,300">
                            </div> -->

                            <div class="form-group mb-0">
                                <button type="submit" name="btnBid" class="btn button-theme btn-md btn-block">Bid Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Properties details page end -->

<!-- Footer start -->
<?php include_once("Footer.php");?>
<!-- Footer end -->

<!-- Sub footer start -->
<?php include_once("SubFooter.php");?>
<!-- Sub footer end -->

<!-- Full Page Search -->
<?php //include_once("FullPageSearch.php");?>

<?php include_once("LoadJS.php");?>

<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0N5pbJN10Y1oYFRd0MJ_v2g8W2QT74JE"></script>
<script>
    function LoadMap(propertes) {
        var defaultLat = 40.7110411;
        var defaultLng = -74.0110326;
        var mapOptions = {
            center: new google.maps.LatLng(defaultLat, defaultLng),
            zoom: 15,
            scrollwheel: false,
            styles: [
                {
                    featureType: "administrative",
                    elementType: "labels",
                    stylers: [
                        {visibility: "off"}
                    ]
                },
                {
                    featureType: "water",
                    elementType: "labels",
                    stylers: [
                        {visibility: "off"}
                    ]
                },
                {
                    featureType: 'poi.business',
                    stylers: [{visibility: 'off'}]
                },
                {
                    featureType: 'transit',
                    elementType: 'labels.icon',
                    stylers: [{visibility: 'off'}]
                },
            ]
        };
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        var infoWindow = new google.maps.InfoWindow();
        var myLatlng = new google.maps.LatLng(40.7110411, -74.0110326);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map
        });
        (function (marker) {
            google.maps.event.addListener(marker, "click", function (e) {
                infoWindow.setContent("" +
                    "<div class='map-properties contact-map-content'>" +
                    "<div class='map-content'>" +
                    "<p class='address'>20-21 Kathal St. Tampa City, FL</p>" +
                    "<ul class='map-properties-list'> " +
                    "<li><i class='flaticon-phone'></i>  +0477 8556 552</li> " +
                    "<li><i class='flaticon-phone'></i>  info@themevessel.com</li> " +
                    "<li><a href='index.html'><i class='fa fa-globe'></i>  http://www.example.com</li></a> " +
                    "</ul>" +
                    "</div>" +
                    "</div>");
                infoWindow.open(map, marker);
            });
        })(marker);
    }
    LoadMap();
</script>
</body>

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/properties-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:34:43 GMT -->
</html>



