<?php include_once("admin/Connection.php");?>

<?php 
    $_SESSION['AgentLnam']=$_REQUEST['Lnam'];
    $_SESSION['AgentFnam']=$_REQUEST['Fnam'];
    $_SESSION['AgentEmail']=$_REQUEST['Email'];
    $_SESSION['AgentPass']=$_REQUEST['Pass'];
    $_SESSION['AgentContact']=$_REQUEST['Contact'];
    $_SESSION['AgentUserTyp']=$_REQUEST['UserTyp'];
?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/pricing-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:24 GMT -->
<head>
    <?php include_once("LoadFile1.php");?>
</head>
<body>
    <?php include_once("PageLoader.php");?>

<!-- Main header start -->
    <?php include_once("Menu.php");?>  

<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Membership Agent</h1>
            <ul class="breadcrumbs">
                <li><a href="index.html">Home</a></li>
                <li class="active">Membership Agent</li>
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
            <h1>Membership Plans</h1>
            <p>Finding your perfect plan.</p>
        </div>
        <div class="row">
            <!-- select Membership data -->
            <?php 

            $sel="SELECT * FROM tblMembership WHERE IsActive=1";
            $ExeMembership=mysqli_query($con,$sel) or die(mysqli_error($con));
            while($fetchMembership=mysqli_fetch_array($ExeMembership))
            {
            ?>
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="pricing-1 plan">
                    <div class="plan-header">
                        <h5><?php echo $fetchMembership['Title'];?> Plan</h5>
                        <p>Plan short description</p>
                        <div class="plan-price"><sup>₹</sup><?php echo $fetchMembership['Price'];?><!-- <span>/6 month</span> --> </div>
                    </div>
                    <div class="plan-list">
                        <ul>
                            <li><i class="fa fa-globe"></i><?php echo $fetchMembership['Days'];?> Days Member</li>
                            <!-- <li><i class="fa fa-thumbs-up"></i>Unlimited Storage</li>
                            <li><i class="fa fa-signal"></i>Unlimited Bandwidth</li>
                            <li><i class="flaticon-people"></i>1000 Email Addresses</li>
                            <li><i class="fa fa-star"></i>Free domain with annual plan</li>
                            <li><i class="fa fa-rocket"></i>4X Processing Power</li>
                            <li><i class="fa fa-server"></i>Premium DNS</li> -->
                        </ul>
                        <div class="plan-button text-center">
                            <a href="MembershipPayment.php?MembershipID=<?php echo $fetchMembership['MembershipID'];?> " class="btn btn-outline pricing-btn">Get Started</a>
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
<!-- Pricing tables end -->

<!-- Footer start -->
<!-- <footer class="footer">
    <div class="container footer-inner">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <img src="img/logos/logo.png" alt="logo" class="f-logo">
                    <div class="text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>Contact Us</h4>
                    <div class="f-border"></div>
                    <ul class="contact-info">
                        <li>
                            <i class="flaticon-pin"></i>20/F Green Road, Dhanmondi, Dhaka
                        </li>
                        <li>
                            <i class="flaticon-mail"></i><a href="mailto:sales@hotelempire.com">info@themevessel.com</a>
                        </li>
                        <li>
                            <i class="flaticon-phone"></i><a href="tel:+55-417-634-7071">+0477 85X6 552</a>
                        </li>
                        <li>
                            <i class="flaticon-fax"></i>+0477 85X6 552
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>
                        Useful Links
                    </h4>
                    <div class="f-border"></div>
                    <ul class="links">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="about.html">About Us</a>
                        </li>
                        <li>
                            <a href="services.html">Services</a>
                        </li>
                        <li>
                            <a href="contact.html">Contact Us</a>
                        </li>
                        <li>
                            <a href="dashboard.html">Dashboard</a>
                        </li>
                        <li>
                            <a href="properties-details.html">Properties Details</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <h4>Subscribe</h4>
                    <div class="f-border"></div>
                    <div class="Subscribe-box">
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                        <form class="form-inline" action="#" method="GET">
                            <input type="text" class="form-control mb-sm-0" id="inlineFormInputName3" placeholder="Email Address">
                            <button type="submit" class="btn"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer> -->
<!-- Footer end -->
<!-- Sub footer start -->
<?php include_once("SubFooter.php");?>
<!-- Sub footer end -->

<!-- Full Page Search -->
<?php //include_once("FullPageSearch.php");?>

<?php include_once("LoadJS.php");?>

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/pricing-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:24 GMT -->
</html>