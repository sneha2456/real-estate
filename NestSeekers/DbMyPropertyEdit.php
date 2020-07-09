    <?php include_once("admin/Connection.php");?>

    <!DOCTYPE html>
    <html lang="zxx">

    <!-- Mirrored from storage.googleapis.com/themevessel-products/neer/properties-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:34:38 GMT -->
    <head>
        <?php include_once("LoadFile1.php");?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
              <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
                  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
                  <!-- Css File External Edit -->
                  <link rel="stylesheet" type="text/css" href="mycss.css">
        <script src="js2/jquery.js" type="text/javascript"></script>

              </head>
              <!-- Fetch PropertyEditDetails Of User -->
              <?php 
              $PropertyID=$_REQUEST['PropertyID'];
              $Select_Property="SELECT * FROM tblProperty WHERE IsActive=1 AND PropertyID='".$PropertyID."'";
        /*$Select_Property="SELECT DISTINCT tblProperty.*, tblImage.ImageID, tblVideo.VideoID
                            FROM tblProperty
                            INNER JOIN tblImage ON tblProperty.PropertyID = tblImage.PropertyID
                            INNER JOIN tblVideo ON tblProperty.PropertyID = tblVideo.PropertyID
                            WHERE tblProperty.PropertyID='".$PropertyID."'";*/
                            $Exe_Property=mysqli_query($con,$Select_Property) or die(mysqli_error($con));
                            $Fetch_Property=mysqli_fetch_array($Exe_Property);

                            /*Update Details Of Property*/

                            /*Progress Status Calculation*/
                            /*$PropertyStatus=$Fetch_Property['PropertyDetailStatus'];*/
                            $PropertyStatus=0;
                            if(!empty($Fetch_Property['PropertyTitle']))
                            {
                                $PropertyStatus=$PropertyStatus+2;
                            }
                            if (!empty($Fetch_Property['Status'])) {
                             $PropertyStatus=$PropertyStatus+2;
                         }
                         if (!empty($Fetch_Property['PropertyTypeID'])) {
                             $PropertyStatus=$PropertyStatus+2;
                         }
                         if (!empty($Fetch_Property['ExpectedPrice'])) {
                             $PropertyStatus=$PropertyStatus+2;
                         }
                         if (!empty($Fetch_Property['Area'])) {
                             $PropertyStatus=$PropertyStatus+2;
                         }
                         if (!empty($Fetch_Property['BedRoomID'])) {
                             $PropertyStatus=$PropertyStatus+1;
                         }
                         if (!empty($Fetch_Property['BathRoomID'])) {
                             $PropertyStatus=$PropertyStatus+1;
                         }
                         if (!empty($Fetch_Property['Address'])) {
                             $PropertyStatus=$PropertyStatus+2;
                         }
                         if (!empty($Fetch_Property['CityID'])) {
                             $PropertyStatus=$PropertyStatus+2;
                         }
                         if (!empty($Fetch_Property['MapURL'])) {
                             $PropertyStatus=$PropertyStatus+2;
                         }
                         if (!empty($Fetch_Property['FurnishedStatusID'])) {
                             $PropertyStatus=$PropertyStatus+1;
                         }
                         if (!empty($Fetch_Property['TotalFloorID'])) {
                             $PropertyStatus=$PropertyStatus+1;
                         }
                         if (!empty($Fetch_Property['FloorNoID'])) {
                             $PropertyStatus=$PropertyStatus+1;
                         }
                         if (!empty($Fetch_Property['ConstructionStatusID'])) {
                             $PropertyStatus=$PropertyStatus+1;
                         }
                         if ($Fetch_Property['IsApprovedByAgent']==1) {
                             $PropertyStatus=$PropertyStatus+10;
                         }

                         if (!empty($UserID)) {
                             $PropertyStatus=$PropertyStatus+3;
                         }
                         if (!empty($$Fetch_Property['Description'])) {
                             $PropertyStatus=$PropertyStatus+1;
                         }


                         if (!empty($Fetch_Property['PackageID'])) {
                            if($Fetch_Property['PackageID']==1)
                            {
                                $PropertyStatus=$PropertyStatus+0;
                            }elseif($Fetch_Property['PackageID']==2)
                            {
                                $PropertyStatus=$PropertyStatus+15;
                            }elseif($Fetch_Property['PackageID']==3)
                            {
                                $PropertyStatus=$PropertyStatus+25;
                            }elseif($Fetch_Property['PackageID']==4)
                            {
                                $PropertyStatus=$PropertyStatus+35;
                            }                   
                        }
                    /*if (!empty($Fetch_Property["txtFileImage"])) {
                        $PropertyStatus=$PropertyStatus+6;
                    }
                    if (!empty($Fetch_Property['txtFileVideo'])) {
                       $PropertyStatus=$PropertyStatus+6;
                   }*/
                    //echo "propert Status".$PropertyStatus;
                   $updateStatus="update tblProperty set PropertyDetailStatus='".$PropertyStatus."' where PropertyID=".$PropertyID;
                   $Exe_Status=mysqli_query($con,$updateStatus) or die(mysqli_error($con));
                    //echo $updateStatus;
                   /*Progress Status Calculation*/


                   if(isset($_REQUEST['ContactAgent']))
                   {
                        //echo "ContactAgent".$_REQUEST['ContactAgent'];
                    $UpdateAgent="UPDATE tblbid SET ApprovedByUser=1 WHERE IsActive=1 AND BidID=".$_REQUEST['BidID'];
                        //echo $UpdateAgent;
                    mysqli_query($con,$UpdateAgent) or die(mysqli_error($con));
                    $UpdatePropertyAgent="UPDATE tblProperty SET IsApprovedByAgent=1, AgentID='".$_REQUEST['ContactAgent']."' WHERE PropertyID=".$_REQUEST['PropertyID'];
                        //echo $UpdatePropertyAgent;
                    mysqli_query($con,$UpdatePropertyAgent) or die(mysqli_error($con));
                }

                if(isset($_REQUEST['btnUpdate']))
                {
                   /*Progress Status Calculation*/
           /*  $PropertyEditStatus=$Fetch_Property['PropertyDetailStatus'];
                    if(!empty($_REQUEST['txtEditMapLocation']))
                    {
                        $PropertyEditStatus=$PropertyEditStatus+2;
                    }
                    if(!empty($_REQUEST['cmbEditBathRoom']))
                    {
                        $PropertyEditStatus=$PropertyEditStatus+1;
                    }
                    if(!empty($_REQUEST['cmbEditConstructionStatus']))
                    {
                        $PropertyEditStatus=$PropertyEditStatus+1;
                    }*/
                    


                    $UpdateProperty="update tblProperty set PropertyTitle='".$_REQUEST['txtEditTitle']."', ExpectedPrice='".$_REQUEST['txtEditPrice']."', Address='".$_REQUEST['txtEditAddress']."', Description='".$_REQUEST['txtEditDescription']."', Area='".$_REQUEST['txtEditArea']."', BedRoomID='".$_REQUEST['cmbEditBedRoom']."', BathRoomID='".$_REQUEST['cmbEditBathRoom']."', FurnishedStatusID='".$_REQUEST['cmbEditFurnished']."', TotalFloorID='".$_REQUEST['cmbEditTotalFloor']."', FloorNoID='".$_REQUEST['cmbEditFloorNo']."', ConstructionStatusID='".$_REQUEST['cmbEditConstructionStatus']."', MapUrl='".$_REQUEST['txtEditMapLocation']."' where PropertyID='".$_REQUEST['PropertyID']."' ";
            //echo "string".$UpdateProperty;
                    $ExecuteUpdateProperty=mysqli_query($con,$UpdateProperty) or die(mysqli_error($con));


          /*  $UpdateFeatures="update tblfeatures set AirConditioned='".$_REQUEST['checkbox1']."', BanquetHall='".$_REQUEST['checkbox2']."', Bar/Lounge='".$_REQUEST['checkbox3']."', Cafeteria/foodCourt='".$_REQUEST['checkbox4']."', ClubHouse='".$_REQUEST['checkbox5']."', ConferenceRoom='".$_REQUEST['checkbox6']."', DTHTelevisionFacility='".$_REQUEST['checkbox7']."', Gymnasium='".$_REQUEST['checkbox8']."', InteroomFacility='".$_REQUEST['checkbox9']."', Internet/WifiConnectivity='".$_REQUEST['checkbox10']."', JoggingandStrollingTrack='".$_REQUEST['checkbox11']."' , LaundryService='".$_REQUEST['checkbox12']."', Lift='".$_REQUEST['checkbox13']."', MaintenanceStaff='".$_REQUEST['checkbox14']."', OutdoorTennisCourt='".$_REQUEST['checkbox15']."',Garden='".$_REQUEST['checkbox21']."', PipedGas='".$_REQUEST['checkbox16']."', PowerBackUp='".$_REQUEST['checkbox17']."', Security='".$_REQUEST['checkbox18']."', Parking='".$_REQUEST['checkbox19']."', SwimmingPool='".$_REQUEST['checkbox20']."' where PropertyID='".$_REQUEST['PropertyID']."' ";
            echo "feature".$UpdateFeatures;
            echo $_REQUEST['checkbox1'];
    */

            if(isset($_REQUEST['features']))
            {
                $a=$_REQUEST['features'];
                $features=implode(',', $a);
                $updatePropertyFeatures="update tblProperty set features='".$features."' WHERE PropertyID='".$_REQUEST['PropertyID']."' ";
            //echo "features".$updatePropertyFeatures;
                $ExecuteFeatures=mysqli_query($con,$updatePropertyFeatures) or die(mysqli_error($con));
            }


            echo "<script type='text/javascript' id='error'>alert('Updated Successfully');</script>";
            if($Fetch_Property['IsApprovedByAgent']==1)
            {
                $ContactAgent=$_REQUEST['ContactAgent'];
                $BidID=$_REQUEST['BidID'];

                header("location:DbMyPropertyEdit.php?PropertyID=$PropertyID &ContactAgent=$ContactAgent &BidID=$BidID");
            }else
            {
                header("location:DbMyPropertyEdit.php?PropertyID=$PropertyID");
            }
        }
        ?>
        <!-- Fetch Project Of User -->

        <body>
            <?php //include_once("PageLoader.php"); ?>

            <!-- Main header start -->
            <header class="main-header header-2 fixed-header">
               <?php include_once("Db_Header.php");?>
           </header>  
           <!-- Main header end -->

           <!-- Sub banner start -->
           <div class="sub-banner overview-bgi">
            <div class="container">
                <div class="breadcrumb-area">
                    <h1>Properties Detail</h1>
                    <ul class="breadcrumbs">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Properties Detail</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Sub Banner end -->

        <!-- Properties details page start -->
        <div class="properties-details-page content-area">
            <div class="container">
                <!--  -->




          <!--   <div class="container">
              
              <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                  40%
                </div>
              </div>
            </div>
        -->



        <!--  -->
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <!-- Heading properties 3 start -->
                    <div class="heading-properties-3">
                        <h1>
                            <input id="txtEditTitle" type="text" name="txtEditTitle" value="<?php  echo $Fetch_Property['PropertyTitle']; ?>" required="" /><span><i class="fa fa-info-circle " style="font-size: 10px;"></i></span>&nbsp;&nbsp;&nbsp; <i class="fa fa-calendar"></i>  
                                                    <?php 
                                                        $date_Project=date('M d, Y',strtotime($Fetch_Property['CreatedOn']));
                                                            echo $date_Project;
                                                    ?> &nbsp;
                            <?php if($Fetch_Property['IsApprovedByAgent']==1)
                            {
                                ?>
                                <i class="fa  fa-check-circle " style="color: #0d5202;font-size: 18px;">&nbsp;Verified Agent</i>
                                <?php 
                            }
                            ?> 

                        </h1>

                        <div class="mb-30">
                            <span class="property-price">₹&nbsp;
                                <input type="text" name="txtEditPrice" id="txtEditPrice" value="<?php  echo $Fetch_Property['ExpectedPrice']; ?>" style="width: 120px;" required="" >
                            </span> 
                            <span class="rent">For <?php echo $Fetch_Property['Status'];?></span> 
                            <span class="location">
                                <i class="flaticon-pin"></i>
                                <input type="text" name="txtEditAddress" id="txtEditAddress" value="<?php  echo $Fetch_Property['Address']; ?>" style="width: 730px;" required="">
                            </span>
                        </div>
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
                                            <a href="img/Property/Images/<?php echo $imageName;?>" title="<?php echo $Fetch_Property['PropertyTitle'];?>">
                                                <img src="img/Property/Images/<?php echo $imageName;?>" alt="gallery-photo" class="img-fluid" style="width: 300px;height: 200px;" >
                                            </a>
                                            <div class="portfolio-content">
                                                <div class="portfolio-content-inner">
                                                    <p><?php echo $Fetch_Property['PropertyTitle'];?></p>
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
                    <p>

                        <textarea id="txtEditDescription" name="txtEditDescription" placeholder="" style="width: 700px;height: 300px;" required=""> <?php  echo $Fetch_Property['Description']; ?></textarea>
                    </p>
                </div>
                <!-- Properties amenities start -->
                <div class="properties-amenities mb-40">
                    <h3 class="heading-2">
                        Features&nbsp;<span><i class="fa fa-info-circle "></i></span>
                    </h3>
                    <div class="row">
                        <?php

                        /* <!-- Select feature -->*/
                           /* $select="select * from tblfeature where featureID%2==0";
                            $exeEvenFeature=mysqli_query($con,$select) or die(mysqli_error($con));
                            while($fetch1=mysqli_fetch_array($exeEvenFeature))*/
                             $b=$Fetch_Property['features'];
                         $features=explode(",", $b);

                         ?>
                         <!-- <input type="checkbox" name="checkbox1" value="1"> -->
                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                                <li>
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox1" name="features[]" type="checkbox" value="AirCondition" /<?php if(in_array("AirCondition", $features)){
                                            echo "checked";
                                        }
                                        ?> >
                                        <label for="checkbox1">
                                            Air Condition
                                        </label>
                                    </div>
                                    <!-- <i class="fa fa-check"></i>Air conditioning -->
                                </li>
                                <li>
                                   <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox2" name="features[]" type="checkbox" value="BanquetHall" /<?php if(in_array("BanquetHall", $features)){
                                        echo "checked";
                                    }
                                    ?> >
                                    <label for="checkbox2">
                                        Banquet Hall
                                    </label>
                                </div>
                            </li>
                            <li>
                               <div class="checkbox checkbox-theme checkbox-circle">
                                <input id="checkbox3" name="features[]" type="checkbox" value="Bar/Lounge" <?php if(in_array("Bar/Lounge", $features)){ echo "checked";}?>>
                                <label for="checkbox3">
                                    Bar / Lounge
                                </label>
                            </div>
                        </li>
                        <li>
                           <div class="checkbox checkbox-theme checkbox-circle">
                            <input id="checkbox4" name="features[]" type="checkbox" value="Cafeteria/FoodCourt" <?php if(in_array("Cafeteria/FoodCourt", $features)){ echo "checked";}?> >
                            <label for="checkbox4">
                                Cafeteria / Food Court
                            </label>
                        </div>
                    </li>
                    <li>
                       <div class="checkbox checkbox-theme checkbox-circle">
                        <input id="checkbox5" name="features[]" type="checkbox" value="ClubHouse" <?php if(in_array("ClubHouse", $features)){ echo "checked";}?> >
                        <label for="checkbox5">
                            Club House
                        </label>
                    </div>
                </li>
                <li>
                    <div class="checkbox checkbox-theme checkbox-circle">
                        <input id="checkbox6" name="features[]" type="checkbox" value="ConferenceRoom" <?php if(in_array("Cafeteria/FoodCourt", $features)){ echo "checked";}?> >
                        <label for="checkbox6">
                            ConferenceRoom
                        </label>
                    </div>
                </li>
                <li>
                    <div class="checkbox checkbox-theme checkbox-circle">
                        <input id="checkbox7" name="features[]" type="checkbox" value="DTHTelevisionFacility" <?php if(in_array("DTH Television Facility", $features)){ echo "checked";}?> >
                        <label for="checkbox7">
                            DTHTelevisionFacility
                        </label>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <ul class="amenities">
                <li>
                    <div class="checkbox checkbox-theme checkbox-circle">
                        <input id="checkbox8" name="features[]" type="checkbox" value="Gymnasium" <?php if(in_array("Cafeteria/FoodCourt", $features)){ echo "checked";}?> >
                        <label for="checkbox8">
                            Gymnasium
                        </label>
                    </div>
                </li>
                <li>
                    <div class="checkbox checkbox-theme checkbox-circle">
                        <input id="checkbox9" name="features[]" type="checkbox" value="InteroomFacility" <?php if(in_array("InteroomFacility", $features)){ echo "checked";}?> >
                        <label for="checkbox9">
                            Interoom Facility
                        </label>
                    </div>
                </li>
                <li>
                 <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="checkbox10" name="features[]" type="checkbox" value="Internet/Wi-fiConnectivity" <?php if(in_array("Internet/Wi-fiConnectivity", $features)){ echo "checked";}?> >
                    <label for="checkbox10">
                        Internet/Wi-fi Connectivity
                    </label>
                </div>
            </li>
            <li>
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="checkbox11" name="features[]" type="checkbox" value="Jogging&StrollingTrack" <?php if(in_array("Jogging&StrollingTrack", $features)){ echo "checked";}?> >
                    <label for="checkbox11">
                        Jogging & Strolling Track
                    </label>
                </div>
            </li>
            <li>
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="checkbox12" name="features[]" type="checkbox" value="LaundryService" <?php if(in_array("LaundryService", $features)){ echo "checked";}?> >
                    <label for="checkbox12">
                        Laundry Service
                    </label>
                </div>
            </li>
            <li>
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="checkbox13" name="features[]" type="checkbox" value="Lift" <?php if(in_array("Lift", $features)){ echo "checked";}?> >
                    <label for="checkbox13">
                        Lift
                    </label>
                </div>
            </li>
            <li>
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="checkbox14" name="features[]" type="checkbox" value="MaintenanceStaff" <?php if(in_array("MaintenanceStaff", $features)){ echo "checked";}?> >
                    <label for="checkbox14">
                        Maintenance Staff
                    </label>
                </div>
            </li>
        </ul>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <ul class="amenities">
            <li>
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="checkbox15" name="features[]" type="checkbox" value="Outdoor Tennis Court" <?php if(in_array("OutdoorTennisCourt", $features)){ echo "checked";}?> >
                    <label for="checkbox15">
                        Outdoor Tennis Court
                    </label>
                </div>
            </li>
            <li>
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="checkbox16" name="features[]" type="checkbox" value="GasFacility" <?php if(in_array("GasFacility", $features)){ echo "checked";}?> >
                    <label for="checkbox16">
                        Gas Facility
                    </label>
                </div>
            </li>
            <li>
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="checkbox17" name="features[]" type="checkbox" value="PowerBackUp" <?php if(in_array("PowerBackUp", $features)){ echo "checked";}?> >
                    <label for="checkbox17">
                        PowerBackUp
                    </label>
                </div>
            </li>
            <li>
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="checkbox18" name="features[]" type="checkbox" value="Security" <?php if(in_array("Security", $features)){ echo "checked";}?> >
                    <label for="checkbox18">
                        Security
                    </label>
                </div>
            </li>
            <li>
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="checkbox19" name="features[]" type="checkbox" value="Parking" <?php if(in_array("Parking", $features)){ echo "checked";}?> >
                    <label for="checkbox19">
                        Parking
                    </label>
                </div>
            </li>
            <li>
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="checkbox20" name="features[]" type="checkbox" value="SwimmingPool" <?php if(in_array("SwimmingPool", $features)){ echo "checked";}?> >
                    <label for="checkbox20">
                        Swimming Pool
                    </label>
                </div>
            </li>
            <li>
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="checkbox21" name="features[]" type="checkbox" value="Garden" <?php if(in_array("Garden", $features)){ echo "checked";}?> >
                    <label for="checkbox21">
                        Garden
                    </label>
                </div>
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
                <td><strong>Area(Sqft)</strong>
                   <?php if(empty($Fetch_Property['Area']))
                   {
                    ?>
                    &nbsp;<span><i class="fa fa-info-circle "></i></span>
                    <?php
                }
                ?>
            </td>
            <td><strong>BedRooms</strong>
               <?php if(empty($Fetch_Property['BedRoomID']))
               {
                ?>
                &nbsp;<span><i class="fa fa-info-circle "></i></span>
                <?php
            }
            ?>
        </td>
        <td><strong>Bathrooms</strong>
           <?php if(empty($Fetch_Property['BathRoomID']))
           {
            ?>
            &nbsp;<span><i class="fa fa-info-circle "></i></span>
            <?php
        }
        ?>
    </td>
    <td><strong>Furnished Status</strong>
       <?php if(empty($Fetch_Property['FurnishedStatusID']))
       {
        ?>
        &nbsp;<span><i class="fa fa-info-circle "></i></span>
        <?php
    }
    ?>
    </td>
    </tr>
    <tr>
        <td>
            <input type="text" name="txtEditArea" id="txtEditArea" value="<?php  echo $Fetch_Property['Area']; ?>"  style="width: 100px;">
        </td>
        <td>
            <select class="selectpicker search-fields" name="cmbEditBedRoom" id="cmbEditBedRoom" style="border-style: none; display: none;">
                <option value="">Choose BedRooms</option>
                <!-- php code bedroom -->
                <?php 
                $BedRoomEdit="select * from tblBedroom";
                $ExecuteBedRoomEdit=mysqli_query($con,$BedRoomEdit)or die(mysqli_error($con));
                while($fetchBedRoomEdit=mysqli_fetch_array($ExecuteBedRoomEdit))
                {
                    ?>
                    <!-- php code bedroom -->
                    <option value="<?php echo $fetchBedRoomEdit['BedRoomID'];?>" <?php if($fetchBedRoomEdit['BedRoomID']==$Fetch_Property['BedRoomID']) echo "selected";?>  ><?php echo $fetchBedRoomEdit['BedRoomValue'];   ?></option>
                    <?php
                }
                ?>

            </select>
            <!-- <?php  echo $Fetch_Property['BedRoomID']; ?> -->
        </td>
        <td>
            <select class="selectpicker search-fields" name="cmbEditBathRoom" id="cmbEditBathRoom" >
                <option value="">Choose BathRoom</option>
                <!-- php code bedroom -->
                <?php 
                $BathRoomEdit="select * from tblBathroom where IsActive=1";
                $ExecuteBathRoomEdit=mysqli_query($con,$BathRoomEdit)or die(mysqli_error($con));
                while($fetchBathRoomEdit=mysqli_fetch_array($ExecuteBathRoomEdit))
                {
                    ?>
                    <!-- php code bedroom -->
                    <option value="<?php echo $fetchBathRoomEdit['BathRoomID'];?>" 
                        <?php if($fetchBathRoomEdit['BathRoomID']==$Fetch_Property['BathRoomID']) 
                        echo "selected";
                        ?>  ><?php echo $fetchBathRoomEdit['BathRoomValue'];   ?></option>
                        <?php
                    }
                    ?>                                    
                </select>
                <!-- <?php  echo $Fetch_Property['BathRoomID']; ?> -->
            </td>
            <td>
                <select class="selectpicker search-fields" name="cmbEditFurnished">
                    <option value="">Choose Furnished Status</option>
                    <!-- php code FS -->
                    <?php 
                    $EditFS="select * from tblFurnishedStatus where IsActive=1";
                    $ExecuteEditFS=mysqli_query($con,$EditFS)or die(mysqli_error($con));
                    while($fetchEditFS=mysqli_fetch_array($ExecuteEditFS))
                    {
                        ?>
                        <!-- php code FS -->
                        <option value="<?php echo $fetchEditFS['FurnishedStatusID'];?>"  <?php if($fetchEditFS['FurnishedStatusID']==$Fetch_Property['FurnishedStatusID']) echo "selected";?>  ><?php echo $fetchEditFS['FurnishedStatusType'];?></option>
                        <?php
                    }
                    ?>                                   
                </select>
                <!--  <?php  echo $Fetch_Property['FurnishedStatusID']; ?> -->
            </td>
        </tr>
    </tbody>
    </table>
    <table>
        <tbody><tr>
            <td><strong>Total Floor</strong>
               <?php if(empty($Fetch_Property['TotalFloorID']))
               {
                ?>
                &nbsp;<span><i class="fa fa-info-circle "></i></span>
                <?php
            }
            ?>
        </td>
        <td><strong>Floor Number</strong>
           <?php if(empty($Fetch_Property['FloorNoID']))
           {
            ?>
            &nbsp;<span><i class="fa fa-info-circle "></i></span>
            <?php
        }
        ?>
    </td>
    <td><strong>Construction Status</strong>
        <?php if(empty($Fetch_Property['ConstructionStatusID']))
        {
            ?>
            &nbsp;<span><i class="fa fa-info-circle "></i></span>
            <?php
        }
        ?>
    </td>
    <!-- <td><strong>Furnished Status</strong></td> -->
    </tr>
    <tr>
        <td>
           <select class="selectpicker search-fields" name="cmbEditTotalFloor">
               <option value="">Choose Total Floor</option>
               <!-- php code TF -->
               <?php 
               $selectEditTF="select * from tblTotalFloor where IsActive=1";
               $ExecuteEditTF=mysqli_query($con,$selectEditTF)or die(mysqli_error($con));
               while($fetchEditTF=mysqli_fetch_array($ExecuteEditTF))
               {
                ?>
                <!-- php code TF -->
                <option value="<?php echo $fetchEditTF['TotalFloorID'];?>" <?php if($fetchEditTF['TotalFloorID']==$Fetch_Property['TotalFloorID']) echo "selected";?>><?php echo $fetchEditTF['TotalFloorValue'];?></option>
                <?php
            }
            ?>

        </select>
        <!-- <?php  echo $Fetch_Property['TotalFloorID']; ?> --></td>
        <td> 
            <select class="selectpicker search-fields" name="cmbEditFloorNo">
               <option value="">Choose Floor Number</option>

               <!-- php code FN -->
               <?php 
               $selectEditFN="select * from tblFloorNo where IsActive=1";
               $ExecuteEditFN=mysqli_query($con,$selectEditFN)or die(mysqli_error($con));
               while($fetchEditFN=mysqli_fetch_array($ExecuteEditFN))
               {
                ?> 
                <!-- php code FN -->
                <option value="<?php echo $fetchEditFN['FloorNoID'];?>" <?php if($fetchEditFN['FloorNoID']==$Fetch_Property['FloorNoID']) echo "selected";?> ><?php echo $fetchEditFN['FloorNoValue'];?></option>
                <?php
            }
            ?>

        </select>
        <!-- <?php  echo $Fetch_Property['FloorNoID']; ?> -->
    </td>
    <td>
       <select class="selectpicker search-fields" name="cmbEditConstructionStatus" id="cmbEditConstructionStatus" >
        <option value="">Choose Construction Status</option>
        <!-- php code bedroom -->
        <?php 
        $CSEdit="select * from tblConstructionStatus where IsActive=1";
        $ExecuteCSEdit=mysqli_query($con,$CSEdit)or die(mysqli_error($con));
        while($fetchCSEdit=mysqli_fetch_array($ExecuteCSEdit))
        {
            ?>
            <!-- php code bedroom -->
            <option value="<?php echo $fetchCSEdit['ConstructionStatusID'];?>" <?php if($fetchCSEdit['ConstructionStatusID']==$Fetch_Property['ConstructionStatusID']) echo "selected";?>  ><?php echo $fetchCSEdit['ConstructionStatusType'];   ?></option>
            <?php
        }
        ?>                                    
    </select>
    <!-- <?php  echo $Fetch_Property['ConstructionStatusID']; ?> -->
    </td>
    <!-- <td><?php  echo $Fetch_Property['FurnishedStatusID']; ?></td> -->
    </tr>
    </tbody>
    </table>
    <!--  <img src="img/floor-plans.png" alt="floor-plans" class="img-fluid"> -->
    </div>
    <!-- Location start -->
    <div class="location mb-50">
        <div class="map">
            <h3 class="heading-2">Property Location
                <?php if(empty($Fetch_Property['MapUrl']))
                {
                    ?>
                    &nbsp;<span><i class="fa fa-info-circle "></i></span>
                    <?php
                }
                ?>
            </h3>
            <?php if(empty($Fetch_Property['MapURL']))
            {
                ?>
                <input class="form-control" type="text" name="txtEditMapLocation" style="margin: 5px;" placeholder="Enter Map Location URL" />
                <?php
            }else
            {
                ?>
                <!-- <div id="map" class="contact-map">$Fetch_Property['MapURL']</div> -->
                <div><?php echo $Fetch_Property['MapURL'];?>

            </div>
            <?php
        }
        ?>
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
                                        ?>

                                        <!--  <iframe src="img/Property/Video/<?php echo $Fetch_video['VideoName'];?>" allowfullscreen=""></iframe> -->
                                        <video controls="" style="width: 700px;" autoplay="" > 
                                            <source src="img/Property/Video/<?php echo $Fetch_video['VideoName'];?>" type="video/mp4">

                                            </video>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group mb-0">
                                        <button type="submit" name="btnUpdate" class="btn-md button-theme btn-block">Update</button>
                                    </div>

                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="sidebar-right">

                                        <!-- Social links start -->
                                        <div class="widget social-links">
                                            <h3 class="sidebar-title">Completion Status</h3>
                                            <div class="s-border"></div>

                                            <center>
                                               <h1 style="font-size: 70px;"> <?php echo $Fetch_Property['PropertyDetailStatus'];?> %</h1></center>

                                               <?php
                                               if($Fetch_Property['PropertyDetailStatus']<50)
                                               {
                                                echo "<br><center><h3 style='font-size:13px;'>Add More Details To get Fast Response.</h3></center>";                                
                                            }
                                            ?>
                                        </div>

                                        <!-- Package Details-->
                                       
                                        <div class="widget social-links">
                                            <h3 class="sidebar-title">Our Package</h3>
                                            <div class="s-border"></div>
                                      <div class="col-xl-12 col-lg-12 col-md-12" >
                                        <div class="pricing-1 plan" >
                                             <?php 

                                        $selectPackage="SELECT * FROM tblPackage WHERE PackageID=".$Fetch_Property['PackageID'];
                                        $ExePackage=mysqli_query($con,$selectPackage) or die(mysqli_error($con));
                                        $FetchPackage=mysqli_fetch_array($ExePackage);

                                        ?>
                                            <div class="plan-header">
                                                <h5><?php echo $FetchPackage['PackageName'];?></h5>
                                                <p>Plan short description</p>
                                                <div class="plan-price"><sup>₹</sup><?php echo $FetchPackage['PlanPrice'];?><span>only</span> </div>
                                            </div>
                                            <div class="plan-list"  >
                                                <ul>
                                                    <li><i class="fa  fa-long-arrow-up"></i><?php echo $FetchPackage['HigherPossition'];?>%  Higher Possition</li>                                                   
                                                    <li><i class="fa fa-globe"></i><?php echo $FetchPackage['Day'];?> Days Online</li>
                                                    <li><i class="fa fa-thumbs-up"></i><?php echo $FetchPackage['GetMobileNoOfBuyers'];?> </li>
                                                   <!--  <li><i class="fa fa-signal"></i>Unlimited Bandwidth</li>
                                                    <li><i class="flaticon-people"></i>1000 Email Addresses</li> -->
                                                   <!--  <li><i class="fa fa-star"></i>Free domain with annual plan</li> -->
                                                   <!--  <li><i class="fa fa-rocket"></i>4X Processing Power</li>
                                                    <li><i class="fa fa-server"></i>Premium DNS</li -->
                                                </ul>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                        <!-- Package DEtails -->

                                        <!-- Remaining Days of Package -->
                                            <div class="widget social-links">
                                                <h3 class="sidebar-title">Remaining Days Of Package</h3>
                                                <div class="s-border"></div>
                                                    <center>
                                                         <!-- Remaining Days of Project Count start  -->
                                                            <?php
                                                                $date=$Fetch_Property['CreatedOn'];
                                                                $day=$FetchPackage['Day'];
                                                                $NewDate=Date('y-m-d', strtotime($date."+$day days"));     
                                                                 $a=date_create($NewDate); 
                                                                 $now=date('y-m-d');
                                                                  $d = date_create($now);
                                                                 $NewDate1 = date_diff($d,$a);
                                                                $RemainingDay=$NewDate1->format("%a ");

                                                            ?>
                                                        <!-- Remaining Days of Project Count start  -->
                                                        <h1 style="font-size: "> <?php echo $RemainingDay;?><sub style="font-size: 20px;">(Days)</sub> </h1>
                                                    </center>
                                            </div>
                                        <!-- Remaining Days of Package -->

                <?php 
                if($Fetch_Property['IsApprovedByAgent']==1)
                {
                    ?>
                    <div class="widget social-links">
                        <h3 class="sidebar-title">Verified Agent</h3>
                        <div class="s-border"></div>

                        <!-- Agent  verified-->
                        <?php 
                        $sel_bidAgent="SELECT * FROM tblBid WHERE BidID=".$_REQUEST['BidID'];
                        $ExeBidAgent=mysqli_query($con,$sel_bidAgent) or die(mysqli_error($con));
                                        //$fetchBid=mysqli_fetch_array($ExeBid);
                        if(mysqli_num_rows($ExeBidAgent)>0)
                        {
                            ?>
                            <div class="our-agent-sidebar">
                                            <!-- <div class="p-20">
                                                <h3 class="sidebar-title">Contact Agent</h3>
                                                <div class="s-border"></div>
                                            </div> -->
                                            <div id="carouselExampleIndicators5" class="carousel slide text-center" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <?php

                                                    $fetchAgent=mysqli_fetch_array($ExeBidAgent);
                                                    /*Count Total Deal Of Agent By Bid*/
                                                    $CountDeal="SELECT COUNT(BidID) AS CNTTotalBid from tblBid where AgentID='".$fetchAgent['AgentID']."' AND ApprovedByUser=1";
                                                    $ExeCountDeal=mysqli_query($con,$CountDeal) or die(mysqli_error($con));
                                                    $FetchDeal=mysqli_fetch_array($ExeCountDeal);
                                                    /*Count Total Deal Of Agent By Bid*/

                                                    $sel="select * from tblUser where UserID=".$fetchAgent['AgentID'];
                                                    $Exe=mysqli_query($con,$sel)or die(mysqli_error($con));
                                                    $fetchDAgent=mysqli_fetch_array($Exe);

                                                    $imageName=$fetchDAgent['ProfilePic'];
                                                    if($imageName=="" || !file_exists("img/ProfileImages/$imageName"))
                                                    {
                                                        $imageName="No.png";
                                                    }

                                                    ?>
                                                    
                                                    <div class="carousel-item active">
                                                        <div class="team-1">
                                                            <!-- Select Agent Bids Details  -->
                                                            <div class="team-photo">
                                                                <a href="#">
                                                                    <img src="img/ProfileImages/<?php echo $imageName;?>" alt="agent-2" class="img-fluid" style="border-radius: 50%;">
                                                                    
                                                                </a>
                                                                <ul class="social-list clearfix">
                                                                    <li style="color: white;"> <?php echo $fetchDAgent['Email']; ?></li>

                                                                </ul>

                                                            </div>
                                                            <div class="team-details">
                                                                <h5><a href="agent-detail.html"><?php echo $fetchDAgent['FirstName']." ".$fetchDAgent['LastName']; ?></a></h5>
                                                                <h6></h6>
                                                                <h4>Rating</h4>
                                                                <h4>Total Deal  : <?php echo $FetchDeal['CNTTotalBid']; ?></h4>
                                                                  <!--  <div class="form-group mb-0">
                                                                    <button type="submit" name="btnContactAgent" class="btn-md button-theme ">Contact To Agent</button>
                                                                </div> -->
                                                                <!--  <h4 style="box-sizing: 10px;color: #ff214f;"><a href="?ContactAgent=<?php echo $fetchA['AgentID']; ?> &PropertyID= <?php echo $PropertyID; ?> &BidID=<?php echo $fetchA['BidID'];?>"><i class="fa fa-black-tie "></i> Contact To Agent</a></h4> --> 

                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <?php

                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <!-- Agent verified -->
                                </div>
                                <?php
                            }else
                            {

                                ?>
                                <!-- Our agent sidebar start -->
                                <?php 
                                $sel_bid="SELECT * FROM tblBid WHERE IsActive=1 AND PropertyID=".$PropertyID;
                                $ExeBid=mysqli_query($con,$sel_bid) or die(mysqli_error($con));
                            //$fetchBid=mysqli_fetch_array($ExeBid);
                                if(mysqli_num_rows($ExeBid)>0)
                                {
                                    ?>
                                    <div class="our-agent-sidebar">
                                        <div class="p-20">
                                            <h3 class="sidebar-title">Contact Agent</h3>
                                            <div class="s-border"></div>
                                        </div>
                                        <div id="carouselExampleIndicators5" class="carousel slide text-center" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <?php
                                           /* $selectA="SELECT * FROM tblBid WHERE IsActive=1 AND PropertyID='".$PropertyID."'";
                                           $ExeA=mysqli_query($con,$selectA) or die(mysqli_error($con));*/
                                           $cnt=1;
                                           while($fetchA=mysqli_fetch_array($ExeBid))
                                           {
                                             /*Count Total Deal Of Agent By Bid*/
                                            $CountDeal="SELECT COUNT(BidID) AS CNTTotalBid from tblBid where AgentID='".$fetchA['AgentID']."' AND ApprovedByUser=1";
                                            $ExeCountDeal=mysqli_query($con,$CountDeal) or die(mysqli_error($con));
                                            $FetchDeal=mysqli_fetch_array($ExeCountDeal);
                                            /*Count Total Deal Of Agent By Bid*/
                                                    
                                            $sel="select * from tblUser where UserID=".$fetchA['AgentID'];
                                            $Exe=mysqli_query($con,$sel)or die(mysqli_error($con));
                                            $fetchD=mysqli_fetch_array($Exe);

                                            $imageName=$fetchD['ProfilePic'];
                                            if($imageName=="" || !file_exists("img/ProfileImages/$imageName"))
                                            {
                                                $imageName="No.png";
                                            }

                                            ?>

                                            <div class="carousel-item <?php if($cnt==1) {?> active<?php }?>">
                                                <div class="team-1">
                                                    <!-- Select Agent Bids Details  -->
                                                    <div class="team-photo">
                                                        <a href="#">
                                                            <img src="img/ProfileImages/<?php echo $imageName;?>" alt="agent-2" class="img-fluid">

                                                        </a>
                                                        <ul class="social-list clearfix">
                                                            <li style="color: white;"> <?php echo $fetchD['Email']; ?></li>
                                                       <!--  <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li> -->
                                                    </ul>

                                                </div>
                                                <div class="team-details">
                                                    <h5><a href="agent-detail.html"><?php echo $fetchD['FirstName']." ".$fetchD['LastName']; ?></a></h5>
                                                    <h6></h6>
                                                    <h4>Rating  :
                                                        <!-- Rating Agent Fetch -->
                                                        <?php
                                                        $selectAgentRating="SELECT * FROM tblAgentRating WHERE AgentID=".$fetchA['AgentID'];
                                                        $ExeAgentRating=mysqli_query($con,$selectAgentRating)or die(mysqli_error($con));
                                                        $FetchAgnetRating=mysqli_fetch_array($ExeAgentRating);

                                                            echo $FetchAgnetRating['Rating'];
                                                        ?>
                                                        <!-- Rating Agent Fetch -->

                                                    </h4>
                                                    <h4>Total Deal  : <?php echo $FetchDeal['CNTTotalBid']; ?></h4>
                                                      <!--  <div class="form-group mb-0">
                                                        <button type="submit" name="btnContactAgent" class="btn-md button-theme ">Contact To Agent</button>
                                                    </div> -->
                                                    <h4 style="box-sizing: 10px;color: #ff214f;"><a href="?ContactAgent=<?php echo $fetchA['AgentID']; ?> &PropertyID= <?php echo $PropertyID; ?> &BidID=<?php echo $fetchA['BidID'];?>"><i class="fa fa-black-tie "></i> Contact To Agent</a></h4>

                                                </div>
                                                
                                            </div>
                                        </div>
                                        <?php
                                        $cnt=$cnt+1;
                                    }
                                    ?>
                                        <!-- <div class="carousel-item">
                                            <div class="team-1">
                                                <div class="team-photo">
                                                    <a href="#">
                                                        <img src="img/avatar/avatar-7.jpg" alt="agent-2" class="img-fluid">
                                                    </a>
                                                    <ul class="social-list clearfix">
                                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="team-details">
                                                    <h5><a href="agent-detail.html">Martin Smith</a></h5>
                                                    <h6>Web Developer</h6>
                                                    <h4>+1 204 777 0187</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="team-1">
                                                <div class="team-photo">
                                                    <a href="#">
                                                        <img src="img/avatar/avatar-7.jpg" alt="agent-2" class="img-fluid">
                                                    </a>
                                                    <ul class="social-list clearfix">
                                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="team-details">
                                                    <h5><a href="agent-detail.html">Martin Smith</a></h5>
                                                    <h6>Web Developer</h6>
                                                    <h4>+1 204 777 0187</h4>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <?php   
                    }
                    ?>



                </div>
            </div>
        </div>
    </form>
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
    </body>

    <!-- Mirrored from storage.googleapis.com/themevessel-products/neer/properties-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:34:43 GMT -->
    </html>



