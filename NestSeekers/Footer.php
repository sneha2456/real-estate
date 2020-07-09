 <?php
                            if(isset($_REQUEST['btnsubmit']))
                            {
                                $insert_query="insert into tblnewsletter values(null,'".$_REQUEST['txtemail']."',now(),1)";
                                $Exe_InsertProperty=mysqli_query($con,$insert_query)or die(mysqli_error($con));
                                //echo $insert_query;
                            }
                        ?>

<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <!-- <img src="img/logos/logo.png" alt="logo" class="f-logo"> -->
            <a href="index.php"> <img src="img/logos/l.png" alt="logo" style="height: 50px;"></a>

                    <div class="text"><br>
                        <p><a href="index.php" style="color: #ff214f">NestSeekers&nbsp;</a>is India's No 1 Property portal and has been adjudged as the most preferred property site in India, by independent surveys.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>Contact Us</h4>
                    <div class="f-border"></div>
                    <ul class="contact-info">
                        <li>
                            <i class="flaticon-pin"></i> The Grand Bhagwati Circle, Dumas Rd, Magdalla, Surat, Gujarat 395007
                        </li>
                        <li>
                            <i class="flaticon-mail"></i><a href="mailto:sales@hotelempire.com">nestseekers@gmal.com</a>
                        </li>
                        <li>
                            <i class="flaticon-phone"></i><a href="tel:+55-417-634-7071">+91 63517-18007</a>
                        </li>
                        <li>
                            <i class="flaticon-fax"></i>+91 82000-91218
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
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="AboutUs.php">About Us</a>
                        </li>
                        <!-- <li>
                            <a href="services.html">Services</a>
                        </li> -->
                        <li>
                            <a href="ContactUs.php">Contact Us</a>
                        </li>
                        <li>
                            <a href="faq.php">Faq's</a>
                        </li>

                        <li>
                            <a href="Feedback.php">FeedBack</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <h4>Subscribe</h4>
                    <div class="f-border"></div>
                    <div class="Subscribe-box">
                        <p>To get daily Updates into your inbox Subcribe to our Newsletter.</p>
                        <form class="form-inline" method="POST">
                            <input type="text" class="form-control mb-sm-0" name="txtemail" id="txtemail" placeholder="Email Address">
                            <button type="submit" class="btn" name="btnsubmit"><i class="fa fa-paper-plane"></i></button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>