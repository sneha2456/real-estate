    <?php include_once("admin/Connection.php");

    $propertyID = $_REQUEST['PropertyID'];
    /*$_SESSION['PropertyID']=$PropertyID;*/
    /*$select_query="select * from tblproperty where IsActive=1 and PropertyID =".$propertyID;*/
    $select_query="SELECT tblProperty.*,tblProperty.CityID as CITYIDPD, tblUser.*
    FROM tblProperty
    INNER JOIN tblUser ON tblProperty.UserID = tblUser.UserID
    WHERE tblProperty.PropertyID=".$propertyID;
    $Execute_Q=mysqli_query($con,$select_query) or die(mysqli_error($con));
        //$fetch2=mysqli_fetch_array($Execute_Q);   




    /*select Response data*/
    if(isset($_SESSION['UserID']))
    {
        $selectRes="select * from tblResponse where PropertyID='".$_REQUEST['PropertyID']."' AND ResponseUserID='".$_SESSION['UserID']."' AND IsActive=1";
        $ExeselRes=mysqli_query($con,$selectRes) or die(mysqli_error($con));
        $FetchRes=mysqli_fetch_array($ExeselRes);
    }


    if(isset($_REQUEST['btnContact']))
    {
        if(isset($_SESSION['UserID']))
        {
            if($_SESSION['IsVerifiedEmail']==1)
            {


                /*select Propert type*/
                $SelectPropertyTypeAgent="SELECT * FROM tblProperty WHERE PropertyID=".$propertyID;
                $ExecutePropertyTypeAgent=mysqli_query($con,$SelectPropertyTypeAgent) or die(mysqli_error($con));
                $fetchSelectPropertyTypeAgent=mysqli_fetch_array($ExecutePropertyTypeAgent);

                if($fetchSelectPropertyTypeAgent['IsApprovedByAgent']==1)
                {
                 $InsertResponse="insert into tblResponse values(null,'". $_REQUEST['PropertyID']."','".$_SESSION['UserID']."','".$_REQUEST['txtUserName']."','".$_REQUEST['txtEmail']."','".$_REQUEST['txtContact']."','A',0,now(),'".$_REQUEST['txtMessage']."',1,0,null)";
                 $ExecuteInsertResponse=mysqli_query($con,$InsertResponse)or die(mysqli_error($con));
                //echo "string".$InsertResponse;

                 echo "<script type='text/javascript'> alert('Contact Successfully Done...');</script>";
             }else
             {
                $InsertResponse="insert into tblResponse values(null,'". $_REQUEST['PropertyID']."','".$_SESSION['UserID']."','".$_REQUEST['txtUserName']."','".$_REQUEST['txtEmail']."','".$_REQUEST['txtContact']."','O',null,now(),'".$_REQUEST['txtMessage']."',1,0,null)";
                $ExecuteInsertResponse=mysqli_query($con,$InsertResponse)or die(mysqli_error($con));
                //echo "string".$InsertResponse;

                echo "<script type='text/javascript'> alert('Contact Successfully Done...');</script>";
            }

        }
        else{
            echo "<script type='text/javascript'> alert('Your Email Verification is Not Done.Verify Your Email...');</script>";

        }
    }else
    {
        echo "<script type='text/javascript'> alert('You Are Not LgogIn...');</script>";
    }

    }
    ?>
    <!DOCTYPE html>
    <html lang="zxx">

    <!-- Mirrored from storage.googleapis.com/themevessel-products/neer/properties-details-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:34:43 GMT -->
    <head>
      <?php include_once("LoadFile1.php");?>
      <!-- Slider File -->
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <!--  -->
      <style>
        .mySlides {display:none}
        .w3-left, .w3-right, .w3-badge {cursor:pointer}
        .w3-badge {height:13px;width:13px;padding:0}
    </style>
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
                    <h1>Properties Detail</h1>
                    <ul class="breadcrumbs">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Properties Detail</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Sub Banner end -->

        <!-- Properties details page start -->

        <div class="properties-details-page content-area-6"  <?php if($fetch['IsVerified']==1)
                            {
                        ?>
                         style="background-image: url('img/Property/logo.png');background-repeat: no-repeat;background-position: 550px 10px;background-size: 220px;" 
                        <?php 
                            }   
                        ?> >
            <div class="container" >
                <div class="row">
                    <div class="col-lg-12" >
                        <!-- Heading properties 3 start -->
                        <div class="heading-properties-3" >
                            <?php $fetch=mysqli_fetch_array($Execute_Q);
                                   
                            ?>
                            <h1><?php if(isset($fetch)) echo $fetch['PropertyTitle']; ?>  
                            &nbsp;&nbsp;
                            <?php if($fetch['IsApprovedByAgent']==1)
                            {
                                ?>
                                <i class="fa  fa-check-circle " style="color: #0d5202;font-size: 22px;">&nbsp;Verified Agent</i>
                                <?php 
                            }
                            ?> </h1>
                            <div class="mb-30">
                                <span class="property-price">
                                    <i class="fa  fa-inr"></i>&nbsp;
                                    <?php if($fetch['Status']=='Sale')
                                            {
                                            /*    <!-- select Agent Price-->*/
                                                    if($fetch['IsApprovedByAgent']==1)
                                                    {
                                                        $selectAgent="select * from tblbid Where AgentID='".$fetch['AgentID']."'  AND PropertyID='".$fetch['PropertyID']."'";
                                                        $ExeSelAgent=mysqli_query($con,$selectAgent) or die(mysqli_error($con));
                                                        $fetchSelAgent=mysqli_fetch_array($ExeSelAgent);

                                                         if(isset($fetchSelAgent)) echo $fetchSelAgent['Price'];
                                                    }
                                                    else{
                                                         echo $fetch['ExpectedPrice']; 
                                                    }                  
                                                
                                            }else{
                                                 /*    <!-- select Agent Price-->*/
                                                    if($fetch['IsApprovedByAgent']==1)
                                                    {
                                                        $selectAgent="select * from tblbid Where AgentID='".$fetch['AgentID']."'  AND PropertyID='".$fetch['PropertyID']."'";
                                                        $ExeSelAgent=mysqli_query($con,$selectAgent) or die(mysqli_error($con));
                                                        $fetchSelAgent=mysqli_fetch_array($ExeSelAgent);

                                                         if(isset($fetchSelAgent)) echo $fetchSelAgent['Price']."(Per Month)";
                                                    }
                                                    else{
                                                        echo $fetch['MonthlyRent']."(Per Month)";
                                                    }
                                                  
                                            }
                                    ?></span> 
                                <span class="rent">For <?php if(isset($fetch)) echo $fetch['Status']; ?></span> 
                                <span class="location"><i class="flaticon-pin"></i>
                                    <?php if(isset($fetch)) echo $fetch['Address'];  ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-xs-12">
                            <div class="properties-details-section">
                        <!-- <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-40">
                            <div class="carousel-inner">
                                <div class="active item carousel-item" data-slide-number="0">
                                    <img src="img/properties/properties-1.jpg" class="img-fluid" alt="slider-properties">
                                </div>
                                <div class="item carousel-item" data-slide-number="1">
                                    <img src="img/properties/properties-2.jpg" class="img-fluid" alt="slider-properties">
                                </div>
                                <div class="item carousel-item" data-slide-number="2">
                                    <img src="img/properties/properties-3.jpg" class="img-fluid" alt="slider-properties">
                                </div>
                                <div class="item carousel-item" data-slide-number="4">
                                    <img src="img/properties/properties-4.jpg" class="img-fluid" alt="slider-properties">
                                </div>
                                <div class="item carousel-item" data-slide-number="5">
                                    <img src="img/properties/properties-5.jpg" class="img-fluid" alt="slider-properties">
                                </div>

                                <a class="carousel-control left" href="#propertiesDetailsSlider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                                <a class="carousel-control right" href="#propertiesDetailsSlider" data-slide="next"><i class="fa fa-angle-right"></i></a>

                            </div>
                            <ul class="carousel-indicators smail-properties list-inline nav nav-justified">
                                <li class="list-inline-item active">
                                    <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#propertiesDetailsSlider">
                                        <img src="img/properties/properties-1.jpg" class="img-fluid" alt="properties-small">
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a id="carousel-selector-1" data-slide-to="1" data-target="#propertiesDetailsSlider">
                                        <img src="img/properties/properties-2.jpg" class="img-fluid" alt="properties-small">
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a id="carousel-selector-2" data-slide-to="2" data-target="#propertiesDetailsSlider">
                                        <img src="img/properties/properties-3.jpg" class="img-fluid" alt="properties-small">
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a id="carousel-selector-3" data-slide-to="3" data-target="#propertiesDetailsSlider">
                                        <img src="img/properties/properties-4.jpg" class="img-fluid" alt="properties-small">
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a id="carousel-selector-4" data-slide-to="4" data-target="#propertiesDetailsSlider">
                                        <img src="img/properties/properties-5.jpg" class="img-fluid" alt="properties-small">
                                    </a>
                                </li>
                            </ul>
                        </div> -->
                        <div class="w3-content w3-display-container" >
                         <?php
                         $SelectSliderimage="select * from tblImage where PropertyID=".$fetch['PropertyID'];
                         $ExeSliderimage=mysqli_query($con,$SelectSliderimage) or die(mysqli_error($con));
                         while($FetchSliderimage=mysqli_fetch_array($ExeSliderimage))
                         {
                             $imageName=$FetchSliderimage['ImageName'];
                             if($imageName=="" || !file_exists("img/Property/Images/$imageName"))
                             {
                                $imageName="NoImage.png";
                            }
                            ?>
                            <img class="mySlides"  src="img/Property/Images/<?php echo $imageName;?>" style="width:730px;height: 600px;">

                            <?php
                        }
                        ?>
                        <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
                         <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                         <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                         <?php
                         $SelectSliderimage="select * from tblImage where PropertyID=".$fetch['PropertyID'];
                         $ExeSliderimage=mysqli_query($con,$SelectSliderimage) or die(mysqli_error($con));
                         while($FetchSliderimage=mysqli_fetch_array($ExeSliderimage))
                         {
                            $count=1;
                            ?>

                            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(<?php echo $count; $count=$count+1;?>)"></span>

                            <?php
                        }
                        ?>
                    </div>
                </div>



                <br><br>

                <div class="tabbing tabbing-box mb-40">
                    <ul class="nav nav-tabs" id="carTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="false">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="6-tab" data-toggle="tab" href="#6" role="tab" aria-controls="6" aria-selected="true">Features</a>
                        </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="two" aria-selected="false">Floor Plans</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="true">Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="5-tab" data-toggle="tab" href="#5" role="tab" aria-controls="5" aria-selected="true">Location</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="4-tab" data-toggle="tab" href="#4" role="tab" aria-controls="4" aria-selected="true">Video</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="carTabContent">
                                <div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="one-tab">
                                    <div class="properties-description mb-50">
                                        <h3 class="heading-2">
                                            Description
                                        </h3>
                                        <p><?php echo $fetch['Description'];?></p>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade " id="three" role="tabpanel" aria-labelledby="three-tab">
                                    <div class="property-details mb-40">
                                        <h3 class="heading-2">Property Details</h3>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-6">
                                                <ul>
                                                    <li>
                                                        <strong>Property Id:</strong>#<?php echo $fetch['PropertyID'];?>
                                                    </li>
                                                    <li>
                                                        <strong>Price:</strong>
                                                        <i class="fa  fa-inr"></i>&nbsp;
                                                         <?php if($fetch['Status']=='Sale')
                                                            {
                                                            /*    <!-- select Agent Price-->*/
                                                                    if($fetch['IsApprovedByAgent']==1)
                                                                    {
                                                                        $selectAgent="select * from tblbid Where AgentID='".$fetch['AgentID']."'  AND PropertyID='".$fetch['PropertyID']."'";
                                                                        $ExeSelAgent=mysqli_query($con,$selectAgent) or die(mysqli_error($con));
                                                                        $fetchSelAgent=mysqli_fetch_array($ExeSelAgent);

                                                                         if(isset($fetchSelAgent)) echo $fetchSelAgent['Price'];
                                                                    }
                                                                    else{
                                                                         echo $fetch['ExpectedPrice']; 
                                                                    }                  
                                                                
                                                            }else{
                                                                 /*    <!-- select Agent Price-->*/
                                                                    if($fetch['IsApprovedByAgent']==1)
                                                                    {
                                                                        $selectAgent="select * from tblbid Where AgentID='".$fetch['AgentID']."'  AND PropertyID='".$fetch['PropertyID']."'";
                                                                        $ExeSelAgent=mysqli_query($con,$selectAgent) or die(mysqli_error($con));
                                                                        $fetchSelAgent=mysqli_fetch_array($ExeSelAgent);

                                                                         if(isset($fetchSelAgent)) echo $fetchSelAgent['Price']."(Per Month)";
                                                                    }
                                                                    else{
                                                                        echo $fetch['MonthlyRent']."(Per Month)";
                                                                    }
                                                                  
                                                            }
                                                    ?>
                                                      
                                                    </li>
                                                    <li>
                                                        <strong>Category:</strong>

                                                        <?php 
                                                        $Select_CategoryType="SELECT CategoryID from tblPropertyType WHERE PropertyTypeID=".$fetch['PropertyTypeID'];
                                                        $Exe_CategoryType=mysqli_query($con,$Select_CategoryType) or die(mysqli_error($con));
                                                        $Fetch_CategoryType=mysqli_fetch_array($Exe_CategoryType);

                                                        $Select_Category="SELECT * from tblCategory WHERE CategoryID=".$Fetch_CategoryType['CategoryID'];
                                                        $Exe_Category=mysqli_query($con,$Select_Category) or die(mysqli_error($con));
                                                        $Fetch_Category=mysqli_fetch_array($Exe_Category);

                                                        echo $Fetch_Category['CategoryName'];?>
                                                    </li>
                                                    <li>
                                                        <strong>Property Type:</strong>
                                                        <?php 
                                                        $Select_PropertyType="SELECT * from tblPropertyType WHERE PropertyTypeID=".$fetch['PropertyTypeID'];
                                                        $Exe_PropertyType=mysqli_query($con,$Select_PropertyType) or die(mysqli_error($con));
                                                        $Fetch_PropertyType=mysqli_fetch_array($Exe_PropertyType);

                                                        echo $Fetch_PropertyType['PropertyName'];?>
                                                    </li>
                                                    <li>
                                                        <strong> Area:</strong><?php echo $fetch['Area'];?><sub>(Sqf)</sub>
                                                    </li>
                                                    <?php
                                                        if(isset($fetch['SecurityAmount']))
                                                        {

                                                    ?>
                                                    <li>
                                                        <strong> Security Amount:</strong>                                        
                                                         <?php 

                                                         if($fetch['SecurityAmount']==0 || $fetch['SecurityAmount'] == " ")
                                                         {
                                                            echo "--";
                                                         }else
                                                         {      echo "<i class='fa  fa-inr'></i>&nbsp";
                                                                echo $fetch['SecurityAmount'];
                                                         }
                                                         ?>
                                                         
                                                    </li>
                                                    <?php
                                                        }
                                                    ?>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <ul>
                                                    <li>
                                                        <strong>Bhk:</strong>

                                                        <?php
                                                        if($fetch['BedRoomID']==0 || $fetch['BedRoomID']==" ")
                                                        {
                                                            echo "--";
                                                        }
                                                        else
                                                        {
                                                         $Select_BedRoom="SELECT * from tblBedRoom WHERE BedRoomID=".$fetch['BedRoomID'];
                                                         $Exe_BedRoom=mysqli_query($con,$Select_BedRoom) or die(mysqli_error($con));
                                                         $Fetch_BedRoom=mysqli_fetch_array($Exe_BedRoom);
                                                         echo $Fetch_BedRoom['BedRoomValue']."(BedRooms)";
                                                     }
                                                     ?>
                                                 </li>
                                                 <li>
                                                    <strong>BathRoom:</strong>
                                                    <?php 
                                                    if($fetch['BathRoomID']==0 || $fetch['BathRoomID']==" ")
                                                    {
                                                        echo "--";
                                                    }
                                                    else
                                                    {
                                                        $Select_BathRoom="SELECT * from tblBathRoom WHERE BathRoomID=".$fetch['BathRoomID'];
                                                        $Exe_BathRoom=mysqli_query($con,$Select_BathRoom) or die(mysqli_error($con));
                                                        $Fetch_BathRoom=mysqli_fetch_array($Exe_BathRoom);
                                                        echo $Fetch_BathRoom['BathRoomValue'];
                                                    }
                                                    ?>
                                                </li>

                                                <li>
                                                    <strong>furniture:</strong>
                                                    <?php 
                                                    if($fetch['FurnishedStatusID']==0 || $fetch['FurnishedStatusID']==" ")
                                                    {
                                                        echo "--";
                                                    }
                                                    else
                                                    {
                                                        $Select_Furnished="SELECT * from tblfurnishedstatus WHERE  furnishedstatusID=".$fetch['FurnishedStatusID'];
                                                        $Exe_Furnished=mysqli_query($con,$Select_Furnished) or die(mysqli_error($con));
                                                        $Fetch_Furnished=mysqli_fetch_array($Exe_Furnished);
                                                        echo $Fetch_Furnished['FurnishedStatusType'];
                                                    }
                                                    ?> 
                                                </li>
                                                <li>
                                                    <strong>Posted On:</strong>
                                                    <?php 
                                                    $date_Project=date('M d, Y',strtotime($fetch['CreatedOn']));
                                                    echo $date_Project;
                                                    ?>
                                                </li>
                                                <li>
                                                    <strong>Construction:</strong>
                                                    <?php 
                                                    if($fetch['ConstructionStatusID']==0 || $fetch['ConstructionStatusID']==" ")
                                                    {
                                                        echo "--";
                                                    }
                                                    else
                                                    {
                                                        $Select_Construction="SELECT * from tblConstructionStatus WHERE ConstructionStatusID=".$fetch['ConstructionStatusID'];
                                                        $Exe_Construction=mysqli_query($con,$Select_Construction) or die(mysqli_error($con));
                                                        $Fetch_Construction=mysqli_fetch_array($Exe_Construction);
                                                        echo $Fetch_Construction['ConstructionStatusType'];
                                                    }
                                                    ?> 

                                                </li>
                                                <?php
                                                        if(isset($fetch['Maintenance']))
                                                        {

                                                    ?>
                                                <li>
                                                        <strong> Maintenance :</strong>                                        
                                                         <?php 
                                                         if($fetch['Maintenance']==0 || $fetch['Maintenance'] == " ")
                                                         {
                                                            echo "--";
                                                         }else
                                                         {      echo "<i class='fa  fa-inr'></i>&nbsp";
                                                                echo $fetch['Maintenance']." (Monthly)";
                                                         }
                                                         ?>
                                                         
                                                    </li>  
                                                    <?php
                                                        }
                                                    ?> 

                                            </ul>
                                            

                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <ul>
                                                <li>
                                                    <strong>State:</strong>
                                                    <?php                                              
                                                    if($fetch['CITYIDPD']==0 || $fetch['CITYIDPD']==" " )
                                                    {
                                                         echo "--";
                                                    }
                                                    else
                                                    {
                                                        $Select_City1="SELECT * from tblcity WHERE CityID=".$fetch['CITYIDPD'];
                                                        $Exe_City1=mysqli_query($con,$Select_City1) or die(mysqli_error($con));
                                                        $Fetch_City1=mysqli_fetch_array($Exe_City1);

                                                        $Select_State="SELECT * from tblState WHERE StateID=".$Fetch_City1['StateID'];
                                                        $Exe_State=mysqli_query($con,$Select_State) or die(mysqli_error($con));
                                                        $Fetch_State=mysqli_fetch_array($Exe_State);

                                                        echo $Fetch_State['StateName'];
                                                    }
                                                    ?>
                                                </li>
                                                <li>
                                                    <strong>City:</strong>
                                                    <?php 
                                                    
                                                    if($fetch['CITYIDPD']==" " || $fetch['CITYIDPD']==0)
                                                    {
                                                        echo "--";
                                                    }
                                                    else
                                                    {
                                                        $Select_City="SELECT * from tblcity WHERE CityID=".$fetch['CITYIDPD'];
                                                        $Exe_City=mysqli_query($con,$Select_City) or die(mysqli_error($con));
                                                        $Fetch_City=mysqli_fetch_array($Exe_City);
                                                        echo $Fetch_City['CityName'];
                                                    }
                                                    ?>
                                                </li>
                                                <li>
                                                    <strong>Total floor:</strong>
                                                    <?php 
                                                    if($fetch['TotalFloorID']==0 || $fetch['TotalFloorID']==" ")
                                                    {
                                                        echo "--";
                                                    }
                                                    else
                                                    {
                                                        $Select_TotalFloor="SELECT * from tblTotalFloor WHERE TotalFloorID=".$fetch['TotalFloorID'];
                                                        $Exe_TotalFloor=mysqli_query($con,$Select_TotalFloor) or die(mysqli_error($con));
                                                        $Fetch_TotalFloor=mysqli_fetch_array($Exe_TotalFloor);
                                                        echo $Fetch_TotalFloor['TotalFloorValue'];
                                                    }
                                                    ?> 
                                                    
                                                </li>
                                                <li>
                                                    <strong>Floor No: </strong>
                                                     <?php 
                                                    if($fetch['FloorNoID']==0 || $fetch['FloorNoID']==" ")
                                                    {
                                                        echo "--";
                                                    }
                                                    else
                                                    {
                                                        $Select_FloorNo="SELECT * from tblFloorNo WHERE FloorNoID=".$fetch['FloorNoID'];
                                                        $Exe_FloorNo=mysqli_query($con,$Select_FloorNo) or die(mysqli_error($con));
                                                        $Fetch_FloorNo=mysqli_fetch_array($Exe_FloorNo);
                                                        echo $Fetch_FloorNo['FloorNoValue'];
                                                    }
                                                    ?> 
                                                </li>
                                                <li>
                                                    <strong>Owner:</strong><?php echo $fetch['FirstName'];?>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                         <?php 
                                        if($fetch['Status']=='Rent')
                                        {
                                                         if($fetch['EleWaterChargeExclude']==1)
                                                         {  

                                                            echo "&nbsp;<i class='fa fa-check-square-o' style='color:green'></i>&nbsp; Electricity & Water Charges Exclude";
                                                         }
                                                         else
                                                         {
                                                            
                                                            echo "  Electricity & Water Charges Include.(You Want To pay Electricity & Water Charges)";
                                                         }
                                        }
                                        ?>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="6" role="tabpanel" aria-labelledby="6-tab">
                                <div class="properties-amenities mb-30">
                                    <h3 class="heading-2">Features</h3>
                                    <!-- Split Features database -->
                                    <?php

                                    $b=$fetch['features'];
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
                            </div>
    <div class="tab-pane fade " id="5" role="tabpanel" aria-labelledby="5-tab">
        <div class="location mb-50">
            <div class="map">
                <h3 class="heading-2">Property Location</h3>
                <!-- <div id="map" class="contact-map"></div> -->
                <?php echo $fetch['MapURL'];?>
            </div>
        </div>
    </div>
    <div class="tab-pane fade " id="4" role="tabpanel" aria-labelledby="4-tab">
        <div class="inside-properties mb-50">
            <h3 class="heading-2">
                Property Video
            </h3>
            <!-- <iframe src="https://www.youtube.com/embed/5e0LxrLSzok" allowfullscreen=""></iframe> -->
            <?php
            $Select_video="select * from tblVideo where PropertyID=".$fetch['PropertyID'];
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
                            </div>
                        </div>
                        <?php if($fetch['IsApprovedByAgent']==1)
                        {
                            /*Select Agent Detail */
                            $agentD="SELECT tblUser.FirstName,tblUser.ProfilePic,tblUser.LastName,tblBid.*
                            FROM tblUser 
                            INNER JOIN tblBid ON tblUser.UserID=tblBid.AgentID 
                            WHERE ApprovedByUSer=1 AND PropertyID='".$_REQUEST['PropertyID']."' AND UserID=".$fetch['AgentID'];
                            $ExeAgent=mysqli_query($con,$agentD) or die(mysqli_error($con));
                            $FetcAgent=mysqli_fetch_array($ExeAgent);
                            /*Agent Detail*/
                            ?>
                            <!--  <i class="fa  fa-check-circle " style="color: #0d5202;font-size: 22px;">&nbsp;Verified Property By Agent</i> -->


                            <h3 class="heading-2">Agent Detail</h3>
                            <!-- Agent Verified  start -->
                            <ul class="comments">
                                <li>
                                    <div class="comment">
                                        <div class="comment-author">
                                            <a href="#">
                                               <?php
                                               $imageName=$FetcAgent['ProfilePic'];
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
                                            <h3>
                                                <?php echo $FetcAgent['FirstName']." ".$FetcAgent['LastName'];?>
                                            </h3>
                                             <h3>Agent Charges: 

                                                <?php
                                                    if($fetch['Status']=='Sale')
                                                    {

                                                ?>
                                                    <p>
                                                        <?php echo "(".$FetcAgent['ITRate']."% of&nbsp;  <i class='fa  fa-inr'></i> ".$FetcAgent['Price']." Price)";?>
                                                    </p>
                                                <?php
                                                    }else
                                                    {
                                                ?>
                                                    <p>
                                                        <?php echo "(First ".$FetcAgent['Month']." Month Rent)";?>
                                                    </p>
                                                <?php
                                                    }

                                                ?>
                                                
                                                
                                            </h3>
                                            <div class="comment-meta">
                                                <i class="fa fa-calendar"></i>  
                                                <?php 
                                                $date_Project=date('M d, Y',strtotime($FetcAgent['CreatedOn']));
                                                echo $date_Project;
                                                ?> 
                                                <?php //echo $FetcAgent['CreatedOn'];?>
                                            </div>
                                        </div>
                                        <p><?php //echo $FetcAgent['Price'];?></p>
                                    </div>
                                </div>

                            </li>

                        </ul>

                        <?php 
                    }
                    ?>
                    <!-- Contact 2 start -->
                    <div class="contact-2 ca mtb-50">
                        <h3 class="heading" style="text-shadow: 1px 1px 2px #ff214f, 0 0 25px #ff214f, 0 0 5px #ff214f;">Contact To Owner</h3>
                        <div class="row">
                            <div class="col-md-1">

                                <img src="img/Property/Images/OwnerAvatar.png"  style="height: 60px;box-shadow: 5px 5px 10px #aaaaaa;border-radius: 50%">

                            </div>
                            <div class="col-md-1">
                                <h4 style="margin-left: 15px;"><?php echo $fetch['FirstName'];?></h4>
                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="col-md-1">
                                <h4><?php 
                                $number=$fetch['ContactNo'];
                                echo str_pad(substr($number, -3), strlen($number), 'X', STR_PAD_LEFT);
                                        //echo $fetch['ContactNo'];?>     </h4>                                                           
                                    </div>

                                </div><br>

                                <?php
                                if(isset($FetchRes['ResponseID']))
                                {
                                  ?>
                                  <h4>Response Send</h4>
                                  <?php
                              }else
                              {
                                ?>

                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group name col-md-6">
                                            <input type="text" name="txtUserName" class="form-control" placeholder="Name" style="box-shadow: 5px 5px 10px #aaaaaa;border-radius: 10px;">
                                        </div>
                                        <div class="form-group email col-md-6">
                                            <input type="email" name="txtEmail" class="form-control" placeholder="Email" style="box-shadow: 5px 5px 10px #aaaaaa;border-radius: 10px;">
                                        </div>
                                        <div class="form-group number col-md-12">
                                            <input type="text" name="txtContact" class="form-control" placeholder="Contact No" style="box-shadow: 5px 5px 10px #aaaaaa;border-radius: 10px;">
                                        </div>
                                   <!--  <div class="form-group number col-md-6">
                                        <input type="text" name="subject" class="form-control" placeholder="Subject" style="box-shadow: 5px 5px 10px #aaaaaa;">
                                    </div> -->
                                    <div class="form-group message col-md-12">
                                        <textarea class="form-control" name="txtMessage" placeholder="Write message" style="box-shadow: 5px 5px 10px #aaaaaa;border-radius: 10px;"></textarea>
                                    </div>
                                    <div class="send-btn col-md-12">
                                        <button type="submit" class="btn btn-md button-theme" name="btnContact">Contact </button>
                                    </div>
                                </div>
                            </form>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-right">

                    <div class="widget recent-properties">
                        <h3 class="sidebar-title">Recent Properties</h3>
                        <div class="s-border"></div>
                        <?php
                        $SelectRecentProperty="Select * from tblProperty where IsActive=1 ORDER BY CreatedOn DESC LIMIT 10";
                        $ExeRecentProperty=mysqli_query($con,$SelectRecentProperty)or die(mysqli_error($con));
                        while($FetchRecentProject=mysqli_fetch_array($ExeRecentProperty))
                        {
                            ?>
                            <div class="media mb-4">
                                <?php
                                $Select_image="select * from tblImage where IsDefault=1 and PropertyID=".$FetchRecentProject['PropertyID'];
                                $Exe_image=mysqli_query($con,$Select_image) or die(mysqli_error());
                                $Fetch_image=mysqli_fetch_array($Exe_image);
                                $imageName=$Fetch_image['ImageName'];
                                if($imageName=="" || !file_exists("img/Property/Images/$imageName"))
                                {
                                    $imageName="NoImage.png";
                                }
                                ?>
                                <a class="pr-3" href="properties-details.html">
                                    <img class="media-object" src="img/Property/Images/<?php echo $imageName;?>" alt="small-properties">
                                </a>
                                <div class="media-body align-self-center">
                                    <h5>
                                        <a href="properties-details.php?PropertyID=<?php echo $propertyID?>"><?php echo $FetchRecentProject['PropertyTitle'];?></a>
                                    </h5>
                                    <div class="listing-post-meta">
                                        <i class="fa  fa-inr"></i>&nbsp;<?php echo $FetchRecentProject['ExpectedPrice'];?> | 

                                        <i class="fa fa-calendar"></i>  
                                        <?php 
                                        $date_Project=date('M d, Y',strtotime($FetchRecentProject['CreatedOn']));
                                        echo $date_Project;
                                        ?> 

                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                            <!-- <div class="media mb-4">
                                <a class="pr-3" href="properties-details.html">
                                    <img class="media-object" src="img/properties/small-properties-2.jpg" alt="small-properties">
                                </a>
                                <div class="media-body align-self-center">
                                    <h5>
                                        <a href="properties-details.html">Beautiful Single Home</a>
                                    </h5>
                                    <div class="listing-post-meta">
                                        $415,000 | <a href="#"><i class="fa fa-calendar"></i> Feb 14, 2018 </a>
                                    </div>
                                </div>
                            </div>
                            <div class="media">
                                <a class="pr-3" href="properties-details.html">
                                    <img class="media-object" src="img/properties/small-properties-3.jpg" alt="small-properties">
                                </a>
                                <div class="media-body align-self-center">
                                    <h5>
                                        <a href="properties-details.html">Real Luxury Villa</a>
                                    </h5>
                                    <div class="listing-post-meta">
                                        $345,000 | <a href="#"><i class="fa fa-calendar"></i> Oct 12, 2018 </a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- Posts by category Start -->
                        <div class="posts-by-category widget">
                            <h3 class="sidebar-title">Category</h3>
                            <div class="s-border"></div>
                            <ul class="list-unstyled list-cat">
                                <?php
                                $selectCategory="select * from tblPropertyType where IsActive=1";
                                $ExecuteCategory=mysqli_query($con,$selectCategory) or die(mysqli_error($con));
                                while ($fetchCategory=mysqli_fetch_array($ExecuteCategory)) 
                                {

                                    ?>

                                    <li>
                                        <a href="category_properties.php?PropertyTypeID=<?php echo $fetchCategory['PropertyTypeID'];?>"><?php echo $fetchCategory['PropertyName'];?> 
                                        <?php $CountType="select COUNT(PropertyTypeID) as CNT from tblproperty where IsActive=1 and PropertyTypeID=".$fetchCategory['PropertyTypeID'];
                                        $ExeCount=mysqli_query($con,$CountType)or die(mysqli_error($con));
                                        $fetchCount=mysqli_fetch_array($ExeCount);
                                        ?>
                                        <span>(<?php echo $fetchCount['CNT'];?>)</span>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- Financing calculator start -->
                       <!--  <div class="contact-2 financing-calculator widget">
                            <h5 class="sidebar-title">Mortgage Calculator</h5>
                            <div class="s-border"></div>
                            <form action="#" method="GET" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="form-label">Property Price</label>
                                    <input type="text" class="form-control" placeholder="$24.400">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Interest Rate (%)</label>
                                    <input type="text" class="form-control" placeholder="12%">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Period In Months</label>
                                    <input type="text" class="form-control" placeholder="6 Months">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Down PaymenT</label>
                                    <input type="text" class="form-control" placeholder="$32,300">
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit" class="btn button-theme btn-md btn-block">Cauculate</button>
                                </div>
                            </form>
                        </div> -->
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
    <!-- <div id="full-page-search">
        <button type="button" class="close">×</button>
        <form action="http://storage.googleapis.com/themevessel-products/neer/index.html#">
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-sm button-theme">Search</button>
        </form>
    </div> -->

    <?php include_once("LoadJS.php");?>


    </body>

    <!-- Mirrored from storage.googleapis.com/themevessel-products/neer/properties-details-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:34:59 GMT -->
    </html>

    <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
          showDivs(slideIndex += n);
      }

      function currentDiv(n) {
          showDivs(slideIndex = n);
      }

      function showDivs(n) {
          var i;
          var x = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("demo");
          if (n > x.length) {slideIndex = 1}
              if (n < 1) {slideIndex = x.length}
                  for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";  
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" w3-white", "");
                }
                x[slideIndex-1].style.display = "block";  
                dots[slideIndex-1].className += " w3-white";
            }
        </script>