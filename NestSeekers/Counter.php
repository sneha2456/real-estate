<div class="counters overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <!--  -->
                      <?php
                        $SalePropertyCount="Select count(*) as SaleProperty from tblProperty where Status='Sale' AND IsPayment=1";
                        $ExeSalePropertyCount=mysqli_query($con,$SalePropertyCount) or die(mysqli_error($con));
                        $FetchSalePropertyCount=mysqli_fetch_array($ExeSalePropertyCount);
                      
                    ?>
                    <!--  -->
                    <i class="flaticon-sale"></i>
                    <h1 class="counter"><?php echo $FetchSalePropertyCount['SaleProperty'];?></h1>
                    <p>Property For Sale</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <!--  -->
                      <?php
                        $RentPropertyCount="Select count(*) as RentProperty from tblProperty where Status='Rent' AND IsPayment=1";
                        $ExeRentPropertyCount=mysqli_query($con,$RentPropertyCount) or die(mysqli_error($con));
                        $FetchRentPropertyCount=mysqli_fetch_array($ExeRentPropertyCount);
                      
                    ?>
                    <!--  -->
                    <i class="flaticon-rent"></i>
                    <h1 class="counter"><?php echo $FetchRentPropertyCount['RentProperty'];?></h1>
                    <p>Property For Rent</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <!--  -->
                      <?php
                        $BuyersCount="Select count(*) as Buyers from tblProperty where IsSold=1";
                        $ExeBuyersCount=mysqli_query($con,$BuyersCount) or die(mysqli_error($con));
                        $FetchBuyersCount=mysqli_fetch_array($ExeBuyersCount);
                      
                    ?>
                    <!--  -->
                    <i class="flaticon-user"></i>
                    <h1 class="counter"><?php echo $FetchBuyersCount['Buyers'];?></h1>
                    <p>Buyers</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <!--  -->
                      <?php
                        $SellersCount="Select count(*) as Sellers from tblProperty";
                        $ExecuteSellersCount=mysqli_query($con,$SellersCount) or die(mysqli_error($con));
                        $FetchSellersCount=mysqli_fetch_array($ExecuteSellersCount);
                      
                    ?>
                    <!--  -->
                    <i class="flaticon-work"></i>
                    <h1 class="counter"><?php echo $FetchSellersCount['Sellers'];?></h1>
                    <p>Sellers</p>
                </div>
            </div>
        </div>
    </div>
</div>