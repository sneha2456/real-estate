<?php include_once("admin/Connection.php");?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->
<head>
    <?php include_once("LoadFile1.php");?> 
</head>

<!-- PHP Code Submit form -->
    
    <?php
         if(isset($_REQUEST['VerifyOTP']))
            {
                  $Fnam=$_REQUEST['Fnam'];
                    $Lnam=$_REQUEST['Lnam'];
                    $Email=$_REQUEST['Email'];
                    $Pass=$_REQUEST['Pass'];
                    $ContactNo=$_REQUEST['ContactNo'];
                    $UserTyp=$_REQUEST['UserTyp'];


                    $verotp=$_REQUEST['mobileOtp'];
                    if($verotp==$_SESSION['ContactOTP'])
                    {
                        if($_REQUEST['UserTyp']=="A")
                        {                          
                          //echo "Agent".$Fnam;                     
                            header("Location:MemberShipAgent.php?Fnam=$Fnam &Lnam=$Lnam &Email=$Email &Pass=$Pass &Contact=$ContactNo &UserTyp=$UserTyp ");
                        }
                        else
                        {
                                echo("logined successfully");
                                $insert_Query="insert into tbluser values(null,'".$Fnam."',null,'".$Lnam."','".$Email."','".$Pass."','".$ContactNo."',null,null,null,'".$UserTyp."',now(),0,1,1)";
                                //echo $insert_Query;
                                    $Execute_Query_Insert=mysqli_query($con,$insert_Query) or die(mysqli_error($con));
                                    $Last_User_InsertID=mysqli_insert_id($con);
                                    header("Location:Login.php");                           
                        }
                     }
                    else
                    {
                        echo "<script type='text/javascript'>alert('Your OTP is Wrong Please check Message...!')</script>";
                    }
            }

    ?>

<!-- PHP Code Submit form -->



<body>
 <?php include_once("PageLoader.php");?>

<!-- Contact section start -->
<div class="contact-section overview-bgi">
    <div class="container">
        <div class="row" >
            <div class="col-lg-12" >
                <!-- Form content box start -->
                <div class="form-content-box" >
                    <!-- details -->
                    <div class="details" style="">
                        <!-- Logo-->
                       <!--  <a href="index.html">
                            <img src="img/black-logo.png" class="cm-logo" alt="black-logo">
                        </a> --><a href="index.php">
                                <img src="img/logos/bl.png" alt="logo" style="height: 50px;"></a>

                        <!-- Name -->
                        <h3>OTP VERIFICATION</h3>
                        <!-- Form start-->
                        <form method="post">
                           <!--  <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="txtFirstName" class="input-text" placeholder="First Name" style="border-left-width: 3px;border-left-color: #ff214f; " value="<?php echo $_REQUEST['ufnam'];?>">
                                </div>
                                 <div class="col-md-6">
                                    <input type="text" name="txtLastName" class="input-text" placeholder="Last Name" style="border-left-width: 3px;border-left-color: #ff214f;">
                                </div>
                            </div> -->
                            <!-- <div class="form-group">
                                <input type="text" name="txtName" class="input-text" placeholder="Full Name" style="border-left-width: 3px;border-left-color: #ff214f;">
                            </div> -->
                            <div class="form-group">
                                <h3 style="font-size: 13px;">Hey, <?php echo $_REQUEST['Fnam'];?>OTP sent To your Mobile no +91 <?php echo $_REQUEST['ContactNo'];?></h3>
                            </div>
                            
                           
                             <div class="form-group">
                                <input type="number" name="mobileOtp" id="mobileOtp" class="input-text" placeholder="OTP" style="border-left-width: 3px;border-left-color: #ff214f;" maxlength="6">
                            </div>
                            
                            <div class="form-group mb-0">
                                <button type="submit" class="btn-md button-theme btn-block" name="VerifyOTP" >Verify</button>
                            </div>
                        </form>
                        <!-- Social List -->
                        <!-- <ul class="social-list clearfix">
                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                        </ul> -->
                    </div>
                    <!-- Footer -->
                   <!--  <div class="footer">
                        <span>Already a member? <a href="Login.php">Login here</a></span>
                    </div> -->
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<!-- Contact section end -->

<!-- Full Page Search -->
<?php //include_once("FullPageSearch.php");?>

<?php include_once("LoadJS.php");?>
</body>

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->
</html>