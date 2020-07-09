 <!-- main slider carousel items -->
                <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-40">
                    <div class="carousel-inner">
                         <!-- Select Project Image Query -->
                            <?php
                                $Select_image="select * from tblimage where PropertyID=".$Fetch_Property['PropertyID'];
                                $Exe_image=mysqli_query($con,$Select_image) or die(mysqli_error($con));
                                while($Fetch_image=mysqli_fetch_array($Exe_image))
                                {
                                    $count=0;
                                $imageName=$Fetch_image['ImageName'];
                                  if($imageName=="" || !file_exists("img/Property/Images/$imageName"))
                                  {
                                    $imageName="NoImage.png";
                                  }
                                 
                            ?>
                        <div <?php 
                                $Select_imageDefault="select * from tblimage where IsDefault=1 and ImagName=".$Fetch_image['ImageName'];
                                $Exe_imageDefault=mysqli_query($con,$Select_imageDefault) or die(mysqli_error($con));
                                $Fetch_imageDefault=mysqli_fetch_array($Exe_imageDefault);
                                $imgDef=$Fetch_imageDefault['ImageName'];
                                //echo $imgDef;
                                if (isset($imgDef))
                                {
                            ?> class="active item carousel-item"
                            <?php 
                                }
                                else
                                {
                            ?>
                                class=" item carousel-item"
                            <?php
                                }
                            ?> data-slide-number="<?php echo $count;?>">
                            <img src="img/Property/Images/<?php echo $imageName;?>" class="img-fluid" alt="slider-properties">
                        </div>

                        <?php
                            $count=$count+1;
                            }
                        ?>
                        <!-- <div class="item carousel-item" data-slide-number="1">
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
                        </div> -->

                        <a class="carousel-control left" href="#propertiesDetailsSlider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                        <a class="carousel-control right" href="#propertiesDetailsSlider" data-slide="next"><i class="fa fa-angle-right"></i></a>

                    </div>
                    <!-- main slider carousel nav controls -->
                    <ul class="carousel-indicators smail-properties list-inline nav nav-justified">
                          <?php
                                /*$Select_image="select * from tblimage where PropertyID=".$Fetch_Property['PropertyID'];
                                $Exe_image=mysqli_query($con,$Select_image) or die(mysqli_error($con));
                                while($Fetch_image=mysqli_fetch_array($Exe_image))
                                {
                                    $count=0;
                                $imageName=$Fetch_image['ImageName'];
                                  if($imageName=="" || !file_exists("img/Property/Images/$imageName"))
                                  {
                                    $imageName="NoImage.png";
                                  }*/
                                 
                            ?>
                        <li class="list-inline-item active">
                            <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#propertiesDetailsSlider">
                                <img src="img/properties/properties-1.jpg" class="img-fluid" alt="properties-small">
                            </a>
                        </li>
                        <?php
                           /* }*/
                        ?>
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
                    <!-- main slider carousel items -->
                </div>
                <!-- Advanced search start -->
                <!-- <div class="widget-2 advanced-search bg-grea-2 d-lg-none d-xl-none">
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
                        <div class="form-group mb-0">
                            <button class="search-button">Search</button>
                        </div>
                    </form>
                </div> -->