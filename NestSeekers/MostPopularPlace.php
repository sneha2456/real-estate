<div class="categories content-area-7">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1>Most Popular Places</h1>
            <p>Find Your Properties In Your City</p>
        </div>
        <div class="row">
           
            <div class="col-lg-5 col-md-12 col-sm-12 col-pad">
                <div class="category"> 
                    <div class="category_bg_box category_long_bg"  style="background-image: url('img/popular-places/delhi.jpg');">
                        <div class="category-overlay">
                            <div class="category-content">
                                <?php
                                    $PropertyCount="SELECT count(*) AS DelhiProperty FROM tblproperty WHERE CityID=706 AND IsActive=1";
                                    $ExePropertyCount=mysqli_query($con,$PropertyCount) or die(mysqli_error($con));
                                    $FetchPropertyCount=mysqli_fetch_array($ExePropertyCount);
                                ?>
                                <h3 class="category-title">
                                    <a href="MostPopularCityList.php?CityID=706">Delhi</a>
                                </h3>
                                <h4 class="category-subtitle"><?php echo $FetchPropertyCount['DelhiProperty'];?> Properties</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            

            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-sm-6 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-1-bg" style="background-image: url('img/popular-places/mumbai3.jpg');">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <?php
                                            $PropertyCount="SELECT count(*) as MumbaiProperty from tblproperty where CityID=2707 AND IsActive=1 AND IsPayment=1";
                                            $ExePropertyCount=mysqli_query($con,$PropertyCount) or die(mysqli_error($con));
                                            $FetchPropertyCount=mysqli_fetch_array($ExePropertyCount);
                                        ?>
                                        <h3 class="category-title">
                                            <a href="MostPopularCityList.php?CityID=2707">Mumbai</a>
                                        </h3>
                                        <h4 class="category-subtitle"><?php echo $FetchPropertyCount['MumbaiProperty'];?> Properties</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-2-bg" style="background-image: url('img/popular-places/kolkata.jpg');">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <?php
                                            $PropertyCount="Select count(*) as KolkataProperty from tblproperty where CityID=5583 AND IsActive=1 AND IsPayment=1";
                                            $ExePropertyCount=mysqli_query($con,$PropertyCount) or die(mysqli_error($con));
                                            $FetchPropertyCount=mysqli_fetch_array($ExePropertyCount);
                                        ?>
                                        <h3 class="category-title">
                                            <a href="MostPopularCityList.php?CityID=5583">Kolkata</a>
                                        </h3>
                                        <h4 class="category-subtitle"><?php echo $FetchPropertyCount['KolkataProperty'];?> Properties</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-3-bg" style="background-image: url('img/popular-places/Bangalore.jpg');">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <?php
                                            $PropertyCount="Select count(*) as BangaloreProperty from tblproperty where CityID=1558 AND IsActive=1 AND IsPayment=1";
                                            $ExePropertyCount=mysqli_query($con,$PropertyCount) or die(mysqli_error($con));
                                            $FetchPropertyCount=mysqli_fetch_array($ExePropertyCount);
                                        ?>
                                        <h3 class="category-title">
                                            <a href="MostPopularCityList.php?CityID=1558">Bangalore</a>
                                        </h3>
                                        <h4 class="category-subtitle"><?php echo $FetchPropertyCount['BangaloreProperty'];?> Properties</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-5-bg" style="background-image: url('img/popular-places/Pune2.jpg');">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <?php
                                            $PropertyCount="Select count(*) as PuneProperty from tblproperty where CityID=2763 AND IsActive=1 AND IsPayment=1";
                                            $ExePropertyCount=mysqli_query($con,$PropertyCount) or die(mysqli_error($con));
                                            $FetchPropertyCount=mysqli_fetch_array($ExePropertyCount);
                                        ?>
                                        <h3 class="category-title">
                                            <a href="MostPopularCityList.php?CityID=2763">Pune</a>
                                        </h3>
                                        <h4 class="category-subtitle"><?php echo $FetchPropertyCount['PuneProperty'];?> Properties</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>