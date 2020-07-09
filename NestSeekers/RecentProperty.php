<div class="featured-properties content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Recent Properties</h1>
            <p>Find your properties in your city</p>
        </div>
        <!-- Slick slider area start -->
        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>


                <!-- Select Property PHP CODE -->

                <?php
                    $select="SELECT tblProperty.*, tblUser.FirstName, tblUser.LastName
                                FROM tblProperty
                                INNER JOIN tblUser ON tblProperty.UserID = tblUser.UserID
                                WHERE tblProperty.IsActive=1 AND tblProperty.IsPayment=1
                                ORDER BY tblProperty.PackageID DESC,tblProperty.PropertyDetailStatus DESC, tblProperty.CreatedOn DESC
                                LIMIT 0,10";

                        /*   $select="     SELECT DISTINCT tblProperty.*, tblUser.FirstName, tblUser.LastName, tblBedRoom.BedRoomValue,tblBathRoom.BathRoomValue, tblfurnishedstatus.FurnishedStatusType
                        FROM tblProperty
                        INNER JOIN tblUser ON tblProperty.UserID = tblUser.UserID
                        INNER JOIN tblBedRoom ON tblProperty.BedRoomID = tblBedRoom.BedRoomID
                        INNER JOIN tblBathRoom ON (tblProperty.BathRoomID = tblBathRoom.BathRoomID OR tblProperty.BathRoomID IS NULL AND tblBathRoom.BathRoomID)
                        INNER JOIN tblfurnishedstatus ON tblProperty.FurnishedStatusID = tblfurnishedstatus.FurnishedStatusID
                        WHERE tblProperty.IsActive=1 
                        ORDER BY tblProperty.PackageID DESC,tblProperty.PropertyDetailStatus DESC, tblProperty.CreatedOn DESC
                        LIMIT 0,10";*/
                    $Exe_Property=mysqli_query($con,$select) or die(mysqli_error($con));
                    while($fetch_Property=mysqli_fetch_array($Exe_Property))
                    {
                ?>

                <!-- Select Property PHP CODE -->

                <div class="slick-slide-item">
                    <div class="property-box">
                        <div class="property-thumbnail">
                            <a href="properties-details.php?PropertyID=<?php echo $fetch_Property['PropertyID']; ?>" class="property-img">
                                <?php if(!empty($fetch_Property['Status']))
                                    {
                                ?>
                                <div class="listing-badges">
                                    <span class="featured"><?php echo $fetch_Property['Status'];?></span>
                                </div>
                                <?php
                                    }
                                ?>
                                <div class="price-box">
                                    ₹&nbsp;
                                    <?php 
                                        if($fetch_Property['Status']=='Sale')
                                        {
                                            echo $fetch_Property['ExpectedPrice'];
                                        }
                                        else
                                        {
                                            echo $fetch_Property['MonthlyRent'];
                                        }   
                                        ?><span>&nbsp;INR 
                                        
                                    <?php if($fetch_Property['Status']=='Rent')
                                            {
                                    ?> (Per month)
                                    <?php
                                            }
                                    ?>
                                    </span>
                                </div>
                                 <!-- Select Project Image Query -->
                                        <?php
                                            $Select_image="select * from tblimage where IsDefault=1 and PropertyID=".$fetch_Property['PropertyID'];
                                            $Exe_image=mysqli_query($con,$Select_image) or die(mysqli_error($con));
                                            $Fetch_image=mysqli_fetch_array($Exe_image);
                                            $imageName=$Fetch_image['ImageName'];
                                              if($imageName=="" || !file_exists("img/Property/Images/$imageName"))
                                              {
                                                $imageName="NoImage.png";
                                              }
                                             
                                        ?>

                                       <!--  <img src="img/Property/Images/<?php echo $imageName;?>" alt="listing-photo" class="img-fluid"> -->
                                <img class="d-block w-100" src="img/Property/Images/<?php echo $imageName;?>" alt="properties"  >
                            </a>
                        </div>
                        <div class="detail" 
                        <?php if($fetch_Property['IsVerified']==1)
                            {
                        ?>
                         style="background-image: url('img/Property/logo.png');background-repeat: no-repeat;background-position: 220px -40px;background-size: 170px;" 
                        <?php 
                            }
                        ?> >
                            <h1 class="title">
                                <a href="properties-details.php?PropertyID=<?php echo $fetch_Property['PropertyID']; ?>" style="text-transform: capitalize;"><?php echo $fetch_Property['PropertyTitle'];?></a>&nbsp;&nbsp;
                                     <?php if($fetch_Property['IsApprovedByAgent']==1)
                                        {
                                    ?>
                                        <i class="fa  fa-check-circle " style="color: #0d5202;font-size: 15px;">&nbsp;Verified Agent</i>
                                    <?php 
                                        }
                                    ?> 
                            </h1>

                            <div class="location">
                                <a href="properties-details.html">
                                    <i class="flaticon-pin"></i><?php echo $fetch_Property['Address'];?>
                                </a>
                            </div>
                        </div>
                        <ul class="facilities-list clearfix">
                            <li>
                                <span>Area</span>
                                 <?php 
                                    if($fetch_Property['Area']==0 || $fetch_Property['Area']==" ")
                                    {
                                        echo "-";
                                    }
                                    else
                                    {
                                          echo $fetch_Property['Area'];
                                    }
                              ?><sub> (Sqft)</sub>
                            </li>
                            <li>
                                <span>Bhk</span>
                                 <?php 
                                    if($fetch_Property['BedRoomID']==0 || $fetch_Property['BedRoomID']==" ")
                                    {
                                        echo "-";
                                    }
                                    else
                                    {
                                          echo $fetch_Property['BedRoomID'];
                                    }
                              ?>

                            </li>
                            <li>
                                <span>Baths</span> 
                                <?php 
                                    if($fetch_Property['BathRoomID']==0 || $fetch_Property['BathRoomID']==" ")
                                    {
                                        echo "-";
                                    }
                                    else
                                    {
                                          echo $fetch_Property['BathRoomID'];
                                    }
                              ?>
                            </li>
                             <li>
                                <span>Furniture </span> 
                                 <?php                                             
                                    if($fetch_Property['FurnishedStatusID']==0 || $fetch_Property['FurnishedStatusID']==" ")
                                    {
                                        echo "-";
                                    }
                                    else
                                    {
                                        $Select_Furnished="SELECT * from tblfurnishedstatus WHERE IsActive=1 AND furnishedstatusID=".$fetch_Property['FurnishedStatusID'];
                                        $Exe_Furnished=mysqli_query($con,$Select_Furnished) or die(mysqli_error($con));
                                        $Fetch_Furnished=mysqli_fetch_array($Exe_Furnished);
                                          echo $Fetch_Furnished['FurnishedStatusType'];
                                    }
                              ?>

                            </li>                         
                        </ul>
                        <div class="footer">
                            <a href="#">
                                <i class="flaticon-people"></i> <?php echo $fetch_Property['FirstName'];?>
                            </a>
                            <span>
                                 <i class="fa fa-calendar"></i>  
                                        <?php 
                                            $date_Project=date('M d, Y',strtotime($fetch_Property['CreatedOn']));
                                                echo $date_Project;
                                        ?>  
                            </span>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
            <div class="slick-prev slick-arrow-buton">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="slick-next slick-arrow-buton">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
    </div>
</div>