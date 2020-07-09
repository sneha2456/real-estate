<div class="banner banner_video_bg" id="banner">
    <div class="pattern-overlay">
        <a id="bgndVideo" class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=5e0LxrLSzok',containment:'.banner_video_bg', quality:'large', autoPlay:true, mute:true, opacity:1}"></a>
    </div>
    <?php
        if(isset($_REQUEST['btnFind']))
        {
           //$comment = !empty($_POST['comment']) ? "'".$_POST['comment']."'" : null;
            if(!empty($_REQUEST['cmbStatus']))
            {
                $Status=$_REQUEST['cmbStatus'];
            }
            else
            {
                $Status=null;
            }
             if(!empty($_REQUEST['cmbType']))
            {
                $cmbType=$_REQUEST['cmbType'];
            }
            else
            {
                $cmbType=null;
            }
             if(!empty($_REQUEST['cmbBedRoom']))
            {
                $cmbBedRoom=$_REQUEST['cmbBedRoom'];
            }
            else
            {
                $cmbBedRoom=null;
            }
             if(!empty($_REQUEST['cmbBathRoom']))
            {
                $cmbBathRoom=$_REQUEST['cmbBathRoom'];
            }
            else
            {
                $Status=null;
            }
             if(!empty($_REQUEST['cmbCity']))
            {
                $cmbCity=$_REQUEST['cmbCity'];
            }
            else
            {
                $cmbCity=null;
            }
            /*$Status = !empty($_REQUEST['cmbStatus']) ? "'".$_REQUEST['cmbStatus']."'" : null;
             $cmbType = !empty($_REQUEST['cmbType']) ? "'".$_REQUEST['cmbType']."'" : null;
              $cmbBedRoom = !empty($_REQUEST['cmbBedRoom']) ? "'".$_REQUEST['cmbBedRoom']."'" : null;
               $cmbBathRoom = !empty($_REQUEST['cmbBathRoom']) ? "'".$_REQUEST['cmbBathRoom']."'" : null;
                $cmbCity = !empty($_REQUEST['cmbCity']) ? "'".$_REQUEST['cmbCity']."'" : null;*/
           /*echo "status".$Status=$_REQUEST['cmbStatus'];
             echo "Types".$cmbType=$_REQUEST['cmbType'];
              echo "Bedrooms".$cmbBedRoom=$_REQUEST['cmbBedRoom'];
               echo "Bathrooms".$cmbBathRoom=$_REQUEST['cmbBathRoom'];
               echo "City".$cmbCity=$_REQUEST['cmbCity'];*/

               // $select="select * from tblProperty where Status='".$_REQUEST['cmbStatus']."', PropertyTypeID='".$_REQUEST['cmbType']."', BedRoomID='".$_REQUEST['cmbBedRoom']."',BathRoomID='".$_REQUEST['cmbBathRoom']."',CityID='".$_REQUEST['cmbState']."'";
               // echo $select;

                header("location:SearchProperty.php?Status=$Status&cmbType=$cmbType&cmbBedRoom=$cmbBedRoom&cmbBathRoom=$cmbBathRoom&cmbCity=$cmbCity");
        }
    ?>
    <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item banner-max-height active">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                    <div class="carousel-content container">
                        <div class="text-center">
                            <h3 class="text-uppercase">Find Your Property</h3>
                            <p>
                                India's No.1 Property Site
                            </p>
                            <form method="post">
                            <div class="inline-search-area ml-auto mr-auto d-none d-xl-block d-lg-block">
                                <div class="row">
                                    <div class="col-xl-2 col-lg-2 col-sm-4 col-6 search-col">
                                        <select class="selectpicker search-fields" name="cmbStatus" required="required">
                                            <option value=" "> Status</option>
                                            <option value="Rent">For Rent</option>
                                            <option value="Sale">For Sale</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-sm-4 col-6 search-col">
                                        <select class="selectpicker search-fields" name="cmbType" required="required">
                                            <option value=" ">Types</option>
                                            <!-- select BedRoom -->
                                            <?php
                                                $selectPropertyType="SELECT * from tblPropertyType WHERE IsActive=1";
                                                $ExePropertyType=mysqli_query($con,$selectPropertyType) or die(mysqi_error($con));
                                                while($fetchPropertyType=mysqli_fetch_array($ExePropertyType))
                                                {
                                            ?>
                                            <option value="<?php  echo $fetchPropertyType['PropertyTypeID'];?>"><?php  echo $fetchPropertyType['PropertyName'];?></option>
                                             <?php
                                            }
                                           ?>
                                            
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-sm-4 col-6 search-col">
                                        <select class="selectpicker search-fields" name="cmbBedRoom" required="required">
                                            <option value=" ">Bedrooms</option>
                                             <!-- select BedRoom -->
                                            <?php
                                                $selectBedRoom="SELECT * from tblBedRoom WHERE IsActive=1";
                                                $ExeBedRoom=mysqli_query($con,$selectBedRoom) or die(mysqi_error($con));
                                                while($fetchBedRoom=mysqli_fetch_array($ExeBedRoom))
                                                {
                                            ?>
                                            <option value="<?php  echo $fetchBedRoom['BedRoomID'];?>"><?php  echo $fetchBedRoom['BedRoomValue'];?></option>
                                            <?php
                                            }
                                           ?>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-sm-4 col-6 search-col">
                                        <select class="selectpicker search-fields" name="cmbBathRoom" required="required">
                                            <option value=" ">Bathrooms</option>
                                             <!-- select BathRoom -->
                                            <?php
                                                $selectBathRoom="SELECT * from tblBathRoom WHERE IsActive=1";
                                                $ExeBathRoom=mysqli_query($con,$selectBathRoom) or die(mysqi_error($con));
                                                while($fetchBathRoom=mysqli_fetch_array($ExeBathRoom))
                                                {
                                            ?>
                                            <option value="<?php  echo $fetchBathRoom['BathRoomID'];?>"><?php  echo $fetchBathRoom['BathRoomValue'];?></option>
                                           <?php
                                            }
                                           ?>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-sm-4 col-6 search-col">
                                        <select class="selectpicker search-fields" name="cmbCity" required="required">
                                            <option value=" " >City</option>
                                            <!-- select State -->
                                            <?php
                                                $selectCity="SELECT DISTINCT tblCity.CityID, tblCity.CityName
                                                            FROM tblProperty
                                                            INNER JOIN tblCity ON tblProperty.CityID=tblCity.CityID
                                                            WHERE tblProperty.IsPayment=1
                                                            ORDER BY tblCity.CityName ASC";
                                                $ExeCity=mysqli_query($con,$selectCity) or die(mysqi_error($con));
                                                while($fetchCity=mysqli_fetch_array($ExeCity))
                                                {
                                            ?>
                                            <option value="<?php  echo $fetchCity['CityID'];?>" ><?php  echo $fetchCity['CityName'];?></option>
                                            <?php
                                                }
                                            ?>
                                           
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-sm-4 col-6 search-col">
                                        <button class="btn button-theme btn-search btn-block" name="btnFind">
                                            <i class="fa fa-search"></i><strong>Find</strong>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
       <!--  <a class="carousel-control-prev" href="#bannerCarousole" role="button" data-slide="prev">
            <span class="slider-mover-left" aria-hidden="true">
                <i class="fa fa-angle-left"></i>
            </span>
        </a>
        <a class="carousel-control-next" href="#bannerCarousole" role="button" data-slide="next">
            <span class="slider-mover-right" aria-hidden="true">
                <i class="fa fa-angle-right"></i>
            </span>
        </a> -->
    </div>
    <div class="container search-options-btn-area">
        <a class="search-options-btn d-lg-none d-xl-none">
            <div class="search-options d-none d-xl-block d-lg-block">Search Options</div>
            <div class="icon"><i class="fa fa-chevron-up"></i></div>
        </a>
    </div>
</div>