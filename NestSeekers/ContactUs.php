<?php include_once("admin/Connection.php");
    
    if(isset($_REQUEST['btnsend']))
    { 
        $insert_query="insert into tblcontactus values(null,'".$_REQUEST['txtname']."','".$_REQUEST['txtemail']."','".$_REQUEST['txtsubject']."','".$_REQUEST['txtmobile']."','".$_REQUEST['txtmessage']."',now(),0,null,null,0)";
        $Execute_Q=mysqli_query($con,$insert_query) or die(mysqli_error($con));
        
        echo "<script type='text/javascript'>alert('Your Message send Successfully Done..');</script>";


    }
 ?>
<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:26 GMT -->
<head>
    <?php include_once("LoadFile1.php");?>
   
</head>
<body>
     <?php include_once("PageLoader.php");?>
<!-- Main header start -->
     <?php include_once("Menu.php");?> 
<!-- Main header end -->

<!-- Sub banner start -->
         <?php include_once("SubBannerContactUs.php");?> 
<!-- Sub Banner end -->

<!-- Contact 2 start -->
<div class="contact-2 content-area-5">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1>Contact Us</h1>
            <p>We waited until we could do it right. Then we did! Instead of creating a carbon copy.</p>
        </div>
        <!-- Contact info -->
        <div class="contact-info">
            <div class="row">
                <div class="col-md-3 col-sm-6 mrg-btn-50">
                    <i class="flaticon-pin"></i>
                    <p>Office Address</p>
                    <strong>Dumas Road, Magdalla Circle, Surat, Gujarat 395007</strong>
                </div>
                <div class="col-md-3 col-sm-6 mrg-btn-50">
                    <i class="flaticon-phone"></i>
                    <p>Phone Number</p>
                    <strong>+55 417 634 7071</strong>
                </div>
                <div class="col-md-3 col-sm-6 mrg-btn-50">
                    <i class="flaticon-mail"></i>
                    <p>Email Address</p>
                    <strong>nestseekers@gmail.com</strong>
                </div>
                <div class="col-md-3 col-sm-6 mrg-btn-50">
                    <i class="flaticon-earth"></i>
                    <p>Web</p>
                    <strong>nestseekers@gmail.com</strong>
                </div>
            </div>
        </div>
        <form method="GET" name="myform" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group name">
                                <input type="text" name="txtname" id="txtname" placeholder="Name" class="form-control">

                                <!-- <input type="text" id="txtname" name="txtname" class="form-control" placeholder="Name"> -->
                               
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group email">
                                <input type="email" name="txtemail" id="txtemail" placeholder="Email" class="form-control" >

                                <!-- <input type="email" id="txtemail" name="txtemail" class="form-control" placeholder="Email"> -->
                         
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group subject">
                                <input type="text" name="txtsubject" id="txtsubject" placeholder="Subject" class="form-control" >

                                <!-- <input type="text" id="txtsubject" name="txtsubject" class="form-control" placeholder="Subject"> -->
                               
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group number">
                                <input type="text" name="txtmobile" id="txtmobile" placeholder="Mobile" class="form-control" >

                                <!-- <input type="text" id="txtmobile" name="txtmobile" class="form-control" placeholder="Number" onkeypress="return NumbersOnly(event);"> -->
                              
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group message">
                                <textarea class="form-control" id="txtmessage" name="txtmessage" placeholder="Write message"       >
                                </textarea> 

                                <!-- <textarea class="form-control" id="txtmessage" name="txtmessage" placeholder="Write message"></textarea> -->
                              
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="send-btn text-center">
                                <button type="submit" name="btnsend"  class="btn btn-md button-theme">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="opening-hours bg-light">
                        <h3>Opening Hours</h3>
                        <ul class="list-style-none">
                            <li><strong>Sunday</strong> <span class="text-red"> closed</span></li>
                            <li><strong>Monday</strong> <span> 10 AM - 8 PM</span></li>
                            <li><strong>Tuesday </strong> <span> 10 AM - 8 PM</span></li>
                            <li><strong>Wednesday </strong> <span> 10 AM - 8 PM</span></li>
                            <li><strong>Thursday </strong> <span> 10 AM - 8 PM</span></li>
                            <li><strong>Friday </strong> <span> 10 AM - 8 PM</span></li>
                            <li><strong>Saturday </strong> <span> 10 AM - 8 PM</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Contact 2 end -->

<!-- Google map start -->
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116321.6722198928!2d72.78530087563536!3d21.108254630158925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be0527f848aec3d%3A0x503630e1dedae0e2!2sThe+Grand+Bhagwati!5e0!3m2!1sen!2sin!4v1562523969120!5m2!1sen!2sin" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen>
</iframe>

<?php //include_once("MapcontactUs.php");?>

<!-- Google map end -->

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

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:26 GMT -->
</html>
