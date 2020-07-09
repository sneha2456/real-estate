
<div class="our-team content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Feedback</h1>
            <p></p>
        </div>
        <!-- Slick slider area start -->
        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>

<!-- PhP Code Agent Select  -->

<?php
    $selectFeedBack="select * from tblfeedback";
    $ExecuteFeedBack=mysqli_query($con,$selectFeedBack) or die(mysqli_error($con));
    while($fetchFeedBack=mysqli_fetch_array($ExecuteFeedBack))
    {

?>
<!-- PhP Code Agent Select  -->

                <div class="slick-slide-item">
                    <div class="row team-2">
<!--                         <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                            <div class="photo">
                                <?php
                                  $imageName=$fetchAgent['ProfilePic'];
                                  if($imageName=="" || !file_exists("img/ProfileImages/$imageName"))
                                  {
                                    $imageName="NoimgAgent.png";
                                  }
                                ?>
                                <!-- <img src="img/ProfileImages/<?php echo $imageName;?>" alt="profile-photo" class="img-fluid"> -->
                                <!-- <img src="img/ProfileImages/<?php echo $imageName;?>" alt="avatar-10" class="img-fluid" style="background-size: cover;width: 100%;height: 100%;"> -->
                            <!-- </div> -->
                        <!-- </div> -->
                        <div class="col-xl-11 col-lg-6 col-md-12 col-sm-12 col-pad align-self-center">
                            <div class="detail" style="border-width: medium;left: 12px;background-color: #f8f9fa;box-shadow: 0 0 35px rgba(0, 0, 0, 0.1);">
                                <div class="contact">
                                    <div>
                                        <h4 class="fa fa-quote-left"></h4> <font style="font-family:MV Boli;"><?php echo $fetchFeedBack['Description']?></font>
                                    </div><br>
                                    <h4>
                                    <p style="float:right;">- <font style="font-family:Brush Script Std; font-size:25px;"><?php echo $fetchFeedBack['Name']?></font></>
                                </h4>
                                 <fieldset class="rating">
                                    <?php
                                        if($fetchFeedBack['Rating']==5)
                                        {
                                    ?>
                                    <i class="fa fa-star" style="color:#ff214f;"></i>
                                    <i class="fa fa-star" style="color:#ff214f;"></i>
                                    <i class="fa fa-star" style="color:#ff214f;"></i>
                                    <i class="fa fa-star" style="color:#ff214f;"></i>
                                    <i class="fa fa-star" style="color:#ff214f;"></i>
                                    <?php
                                        }
                                        if($fetchFeedBack['Rating']==4)
                                        {
                                    ?>
                                    <i class="fa fa-star" style="color:#ff214f;"></i>
                                    <i class="fa fa-star" style="color:#ff214f;"></i>
                                    <i class="fa fa-star" style="color:#ff214f;"></i>
                                    <i class="fa fa-star" style="color:#ff214f;"></i>
                                    <i class="fa fa-star-o"></i>
                                    <?php
                                        }
                                        if($fetchFeedBack['Rating']==3)
                                        {
                                    ?>
                                    <i class="fa fa-star" style="color:#ff214f;"></i>
                                    <i class="fa fa-star" style="color:#ff214f;"></i>
                                    <i class="fa fa-star" style="color:#ff214f;"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <?php
                                        }
                                        if($fetchFeedBack['Rating']==2)
                                        {
                                    ?>
                                    <i class="fa fa-star" style="color:#ff214f;"></i>
                                    <i class="fa fa-star" style="color:#ff214f;"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <?php
                                        }
                                        if($fetchFeedBack['Rating']==1)
                                        {
                                    ?>
                                    <i class="fa fa-star" style="color:#ff214f;"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <?php
                                        }
                                    ?>
                                </fieldset>
                                </div>
                                

                               
                                <!-- <ul class="social-list clearfix">
                                    <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                </div>
    <!--  -->
    <?php
        }
    ?>
                <!-- <div class="slick-slide-item">
                    <div class="row team-2">
                        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                            <div class="photo">
                                <img src="img/avatar/avatar-9.jpg" alt="avatar-9" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                            <div class="detail">
                                <h4>
                                    <a href="agent-detail.html">Eliane Pereira</a>
                                </h4>
                                <h5>Creative Director</h5>
                                <div class="contact">
                                    <ul>
                                        <li>
                                            <i class="flaticon-pin"></i><a>44 New Design Street,</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-mail"></i><a href="mailto:info@themevessel.com">info@themevessel.com</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-phone"></i><a href="tel:+554XX-634-7071"> +55 4XX-634-7071</a>
                                        </li>
                                    </ul>
                                </div>

                                <ul class="social-list clearfix">
                                    <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="row team-2">
                        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                            <div class="photo">
                                <img src="img/avatar/avatar-10.jpg" alt="avatar-10" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                            <div class="detail">
                                <h4>
                                    <a href="agent-detail.html">Karen Paran</a>
                                </h4>
                                <h5>Office Manager</h5>
                                <div class="contact">
                                    <ul>
                                        <li>
                                            <i class="flaticon-pin"></i><a>44 New Design Street,</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-mail"></i><a href="mailto:info@themevessel.com">info@themevessel.com</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-phone"></i><a href="tel:+554XX-634-7071"> +55 4XX-634-7071</a>
                                        </li>
                                    </ul>
                                </div>

                                <ul class="social-list clearfix">
                                    <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="row team-2">
                        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                            <div class="photo">
                                <img src="img/avatar/avatar-9.jpg" alt="avatar-9" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                            <div class="detail">
                                <h4>
                                    <a href="agent-detail.html">Eliane Pereira</a>
                                </h4>
                                <h5>Creative Director</h5>
                                <div class="contact">
                                    <ul>
                                        <li>
                                            <i class="flaticon-pin"></i><a>44 New Design Street,</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-mail"></i><a href="mailto:info@themevessel.com">info@themevessel.com</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-phone"></i><a href="tel:+554XX-634-7071"> +55 4XX-634-7071</a>
                                        </li>
                                    </ul>
                                </div>

                                <ul class="social-list clearfix">
                                    <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="slick-prev slick-arrow-buton">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="slick-next slick-arrow-buton">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
    </div>
</div>