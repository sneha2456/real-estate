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
            

                header("location:SearchProperty.php?Status=$Status&cmbType=$cmbType&cmbBedRoom=$cmbBedRoom&cmbBathRoom=$cmbBathRoom&cmbCity=$cmbCity");
        }
    ?>
<div class="widget advanced-search">
                        <h3 class="sidebar-title">Advanced Search</h3>
                        <div class="s-border"></div>
                        <form method="GET">
                            <div class="form-group">
                               
                                 <select class="selectpicker search-fields" name="cmbStatus" required="required">
                                            <option value=" "> Status</option>
                                            <option value="Rent">For Rent</option>
                                            <option value="Sale">For Sale</option>
                                        </select>
                            </div>
                            <div class="form-group">
                               
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
                            <!-- <div class="form-group">
                                <select class="selectpicker search-fields" name="commercial">
                                    <option>Commercial</option>
                                    <option>Residential</option>
                                    <option>Commercial</option>
                                    <option>Land</option>
                                </select>
                            </div> -->
                            <div class="form-group">
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
                          <!--   <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12"> -->
                                    <div class="form-group">
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
                             <!--    </div>
                                <div class="col-lg-12 col-md-12 col-sm-12"> -->
                                    <div class="form-group">
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
                               <!--  </div>
                            </div> -->
                           <!--  <div class="row">
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
                            </div> -->
                            <!-- <div class="range-slider">
                                <label>Area</label>
                                <div data-min="0" data-max="10000" data-min-name="min_area" data-max-name="max_area" data-unit="Sq ft" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="range-slider">
                                <label>Price</label>
                                <div data-min="0" data-max="150000"  data-min-name="min_price" data-max-name="max_price" data-unit="USD" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                <div class="clearfix"></div>
                            </div> -->
                            <!-- <a class="show-more-options" data-toggle="collapse" data-target="#options-content">
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
                            </div> -->
                            <div class="form-group mb-0">
                                <button class="search-button" name="btnFind">Search</button>
                            </div>
                        </form>
                    </div>