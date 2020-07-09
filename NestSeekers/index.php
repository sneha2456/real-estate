<?php include_once("admin/Connection.php");
    $sel="select * from tblVisitorCount";
    $Exe=mysqli_query($con,$sel) or die(mysqli_error($con));
    $fetch=mysqli_fetch_array($Exe);
    $new=$fetch['Count'];
    $new=$new+1;
    $insertVisitor="Update tblVisitorCount Set Count='".$new."'";
    $Exen=mysqli_query($con,$insertVisitor) or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:25:20 GMT -->
<head>
    <?php include_once("LoadFile1.php");?>
    <link rel="stylesheet" type="text/css" href="css2/RatingCss.css">
    
</head>
<body>
    <?php //include_once("PageLoader.php");?>

<!-- Main header start -->
    <?php include_once("Menu.php");?>    
<!-- Main header end -->

<!-- Banner start -->
    <?php include_once("Banner1.php");?> 
<!-- Banner end -->

<!-- Search Section start -->
<!-- <div class="search-section search-area pb-hediin-12 bg-grea animated fadeInDown" id="search-style-1">
    <div class="container">
        <div class="search-section-area">
            <div class="search-area-inner">
                <div class="search-contents">
                    <form method="GET">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="any-status">
                                        <option>Any Status</option>
                                        <option>For Rent</option>
                                        <option>For Sale</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="all-type">
                                        <option>All Type</option>
                                        <option>Apartments</option>
                                        <option>Shop</option>
                                        <option>Restaurant</option>
                                        <option>Villa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
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
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="bathrooms">
                                        <option>Bathrooms</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="location">
                                        <option>location</option>
                                        <option>United States</option>
                                        <option>American Samoa</option>
                                        <option>Belgium</option>
                                        <option>Canada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <button class="search-button">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Search Section end -->

<!-- Featured Properties start -->
<?php include_once("RecentProperty.php");?> 
<!-- Featured Properties end -->

<!-- Services start -->
<?php include_once("Service.php");?> 
<!-- Services end -->

<!-- Categories strat -->
<?php include_once("MostPopularPlace.php");?> 
<!-- Categories end -->

<!-- Counters strat -->
<?php include_once("Counter.php");?>
<!-- Counters end -->

<!-- Our team start -->
<?php include_once("Agents.php");?>
<!-- Our team end -->

<!-- Blog start -->
<?php //include_once("Blog.php");?>
<!-- Blog end -->

<!-- Partners strat -->
<?php //include_once("Partners.php");?>
<!-- Partners end -->

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

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:28:17 GMT -->
</html>