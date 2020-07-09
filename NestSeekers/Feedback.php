<?php include_once("admin/Connection.php");
    
    if(isset($_REQUEST['btnsend']))
    {        
        if(isset($_REQUEST['rating']))
        {
            if(isset($_GET['topic']))
            {
                $topic=$_REQUEST['topic'];
                $rate=$_REQUEST['rating'];

                $insert_query="insert into tblfeedback values(null,'".$_REQUEST['txtname']."','".$_REQUEST['txtemail']."','".$rate."','".$topic."','".$_REQUEST['txtmessage']."',now(),0)";
                
                /*$insert_query="insert into tblfeedback values(null,'".$_REQUEST['txtname']."','".$_REQUEST['txtemail']."','".$rate."','".$topic."','".$_REQUEST['txtmessage']."',now(),0)";*/
                $Execute_Q=mysqli_query($con,$insert_query) or die(mysqli_error($con));
                echo "<script type='text/javascript'>alert('Your Message send Successfully Done..');</script>";
            }
        }
    }
 ?>
<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:26 GMT -->
<head>
    <?php include_once("LoadFile1.php");?>
    <link rel="stylesheet" type="text/css" href="css/RatingCss.css">
    <script type="text/javascript">
        function validate()
        {
            var name = document.forms["myform"]["txtname"].value;
            var email = document.forms["myform"]["txtemail"].value;
            var topic = document.forms["myform"]["topic"].value;
            var rating = document.forms["myform"]["rating"].value;
            var message = document.forms["myform"]["txtmessage"].value;
            var namepat=/^[a-zA-Z ]*$/;
            if(name=="")    
            {
                /*alert("Please enter your name !");*/
                document.getElementById('name1').innerHTML="Please enter your name !";
                return false;
            }
            if(!name.match(namepat))
            {
                document.getElementById('name1').innerHTML="Enter alphabets only !";
                /*alert("Enter alphabets only !");*/
                return false;
            }
            if(email=="")    
            {
                /*alert("Please enter your name !");*/
                document.getElementById('email1').innerHTML="Please enter emailid !";
                return false;
            }
            if(topic==0)    
            {
                /*alert("Please enter your name !");*/
                document.getElementById('topic1').innerHTML="Please select topic !";
                return false;
            }
            if(rating=="")    
            {
                /*alert("Please enter your name !");*/
                document.getElementById('rating1').innerHTML="Please select rating !";
                return false;
            }
            if(message=="")    
            {
                /*alert("Please enter your name !");*/
                document.getElementById('message1').innerHTML="Please enter message !";
                return false;
            }
            return true;
            /*var flag=0;*/
        }
    </script>    
</head>
<body>
     <?php include_once("PageLoader.php");?>
<!-- Main header start -->
     <?php include_once("Menu.php");?> 
<!-- Main header end -->

<!-- Sub banner start -->
         <?php include_once("SubBannerFeedBack.php");?> 
<!-- Sub Banner end -->

<!-- Contact 2 start -->
<div class="contact-2 content-area-5">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1>Feedback</h1>
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
                                <input type="text" name="txtname" class="form-control" placeholder="Name">
                                <span id="name1" class="text-danger" style="font-size:15px;"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group email">
                                <input type="email" name="txtemail" class="form-control" placeholder="Email">
                                <span id="email1" class="text-danger" style="font-size:15px;"></span>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="form-group text">
                                <input type="text" name="txtmobile" class="form-control" placeholder="Select Topic">
                            </div>
                        </div> -->
                        <div>
                        <select name="topic" class="form-control" style="width:350px;height:45px; margin-left: 15px;">
                            <option value="0">Select Feedback</option>
                            <option value="I want to report a problem">I want to report a problem</option>
                            <option value="I have a suggestion">I have a suggestion</option>
                            <option value="I want to compliment NestSeekers">I want to compliment NestSeekers</option>
                            <option value="Others">Others</option>
                        </select>
                        <span id="topic1" class="text-danger" style="font-size:15px; margin-left: 10px;"></span>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        

                        <fieldset class="rating">
                            <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                            <!-- <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> -->
                            <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                            <!-- <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label> -->
                            <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                            <!-- <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> -->
                            <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                            <!-- <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> -->
                            <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                            <!-- <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> -->
                        </fieldset>
                        <span id="rating1" class="text-danger" style="font-size:15px;"></span>
                        <br><br><br>

                        <div class="col-md-12">
                            <div class="form-group message">
                                <textarea class="form-control" name="txtmessage" placeholder="Description"></textarea>
                                <span id="message1" class="text-danger" style="font-size:15px;"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="send-btn text-center">
                                <button type="submit" name="btnsend" onclick=" return validate();" class="btn btn-md button-theme">Send Feedback</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4">
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
                </div> -->
            </div>
        </form>
    </div>
</div>
<!-- Contact 2 end -->

<!-- Google map start -->
<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116321.6722198928!2d72.78530087563536!3d21.108254630158925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be0527f848aec3d%3A0x503630e1dedae0e2!2sThe+Grand+Bhagwati!5e0!3m2!1sen!2sin!4v1562523969120!5m2!1sen!2sin" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen>
</iframe> -->

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
