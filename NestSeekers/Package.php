   <?php include_once("admin/Connection.php");?>

<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/pricing-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:24 GMT -->
<head>
    
    <?php include_once("LoadFile1.php");?>
</head>
<!-- PHP Code User Detail Fetch -->

<?php
        

        /*On Click Submit Property*/
        
        if(isset($_REQUEST['btnSubmitProperty']))
        {
            //$insert_Property_Query="insert into tblProperty values(null,1,'".."')";
      /*     
            echo "_".$_REQUEST['txtPropertyTitla']."_".$_REQUEST['cmbStatus']."_".$_REQUEST['cmbCategory']."_".$_REQUEST['cmbPropertyType']."_". $_REQUEST['txtPrice']."_".$_REQUEST['txtArea']."_".$_REQUEST['cmbBedRoom']."_".$_REQUEST['txtAddress']."_".$_REQUEST['CmbState']."_".$_REQUEST['CmbCity']."_".$_REQUEST['txtDetail']."_".$_REQUEST['cmbFurnished']."_".$_REQUEST['cmbTotalFloor']."_".$_REQUEST['cmbFloorNo'];*/



           
        }
        /*On Click Submit Property*/



     ?>
<!-- PHP Code User Detail Fetch -->

<body>
    <?php include_once("PageLoader.php");?>


<!-- Main header start -->
    <?php include_once("Menu.php");?>    

<!-- Main header end -->

<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Pricing Package</h1>
            <ul class="breadcrumbs">
                <li><a href="index.html">Home</a></li>
                <li class="active">Package </li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Pricing tables start -->
<div class="pricing-tables content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1>Pricing Package</h1>
            <p>Finding your perfect plan.</p>
        </div>
        <div class="row">
            <?php
        $select_Package="select * from tblPackage where IsActive=1";
        $Execute_Package=mysqli_query($con,$select_Package)or die(mysqli_error($con));
        //$fetch_Package=mysqli_fetch_array($Execute_Package);

            while ($fetch_Package=mysqli_fetch_array($Execute_Package)) 
            {
             
            ?>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="pricing-1 plan">
                    <div class="plan-header">
                        <h5><?php echo $fetch_Package['PackageName'];?></h5>
                        <p>Plan short description</p>
                        <div class="plan-price"><sup>₹</sup><?php echo $fetch_Package['PlanPrice'];?><span>only</span> </div>
                    </div>
                    <div class="plan-list">
                        <ul>
                            <li><i class="fa  fa-long-arrow-up"></i><?php echo $fetch_Package['HigherPossition'];?>%  Higher Possition</li>
                            <li><i class="fa fa-globe"></i><?php echo $fetch_Package['Day'];?> Days Online</li>
                            <li><i class="fa fa-thumbs-up"></i><?php echo $fetch_Package['GetMobileNoOfBuyers'];?> </li>
                           <!--  <li><i class="fa fa-signal"></i>Unlimited Bandwidth</li>
                            <li><i class="flaticon-people"></i>1000 Email Addresses</li> -->
                           <!--  <li><i class="fa fa-star"></i>Free domain with annual plan</li> -->
                           <!--  <li><i class="fa fa-rocket"></i>4X Processing Power</li>
                            <li><i class="fa fa-server"></i>Premium DNS</li -->
                        </ul>
                        <div class="plan-button text-center">
                            <a href="submitProperty.php?UserID=<?php echo $_SESSION['UserID'];?>&PackID=<?php echo $fetch_Package['PackageID'];?>" class="btn btn-outline pricing-btn">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
            <!-- <div class="col-xl-3 col-lg-3 col-md-12">
                <div class="pricing-1 plan">
                    <div class="plan-header">
                        <h5>Ultimate Plan</h5>
                        <p>Plan short description</p>
                        <div class="plan-price"><sup>₹</sup>1500<span>only</span> </div>
                    </div>
                    <div class="plan-list">
                        <ul>
                            <li><i class="fa fa-globe"></i>20 Response</li>
                            <li><i class="fa fa-thumbs-up"></i>Unlimited Storage</li>
                            <li><i class="fa fa-signal"></i>Unlimited Bandwidth</li>
                            <li><i class="flaticon-people"></i>1000 Email Addresses</li>
                            
                            <li><i class="fa fa-rocket"></i>4X Processing Power</li>
                            <li><i class="fa fa-server"></i>Premium DNS</li>
                        </ul>
                        <div class="plan-button text-center">
                            <a href="#" class="btn btn-outline pricing-btn">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12">
                <div class="pricing-1 plan">
                    <div class="plan-header">
                        <h5>Deluxe Plan</h5>
                        <p>Plan short description</p>
                        <div class="plan-price"><sup>₹</sup>2599<span>only</span> </div>
                    </div>
                    <div class="plan-list">
                        <ul>
                            <li><i class="fa fa-globe"></i>Unlimited Response</li>
                            <li><i class="fa fa-thumbs-up"></i>Unlimited Storage</li>
                            <li><i class="fa fa-signal"></i>Unlimited Bandwidth</li>
                            <li><i class="flaticon-people"></i>1000 Email Addresses</li>
                            <li><i class="fa fa-rocket"></i>4X Processing Power</li>
                            <li><i class="fa fa-server"></i>Premium DNS</li>
                        </ul>
                        <div class="plan-button text-center">
                            <a href="#" class="btn btn-outline pricing-btn button-theme">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12">
                <div class="pricing-1 plan">
                    <div class="plan-header">
                        <h5>Professional Plan</h5>
                        <p>Plan short description</p>
                        <div class="plan-price"><sup>₹</sup>5599<span>only</span> </div>
                    </div>
                    <div class="plan-list">
                        <ul>
                            <li><i class="fa fa-globe"></i>Unlimited Response</li>
                            <li><i class="fa fa-thumbs-up"></i>Unlimited Storage</li>
                            <li><i class="fa fa-signal"></i>Unlimited Bandwidth</li>
                            <li><i class="flaticon-people"></i>1000 Email Addresses</li>
                            <li><i class="fa fa-rocket"></i>4X Processing Power</li>
                            <li><i class="fa fa-server"></i>Premium DNS</li>
                        </ul>
                        <div class="plan-button text-center">
                            <a href="#" class="btn btn-outline pricing-btn">Get Started</a>
                        </div>
                    </div>
                </div>
            </div> -->
            
        </div>
    </div>
</div>
<!-- Pricing tables end -->

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

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/pricing-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:24 GMT -->
</html>