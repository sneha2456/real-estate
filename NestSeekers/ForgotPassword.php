<?php include_once("admin/Connection.php");?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->
<head>
    <?php include_once("LoadFile1.php");?>

        <?php
    
       

        if(isset($_REQUEST['btnsubmit']))
        {
             $selectEmail="SELECT Password from tblUser WHERE Email='".$_REQUEST['txtEmail']."'";
        $ExeEmail=mysqli_query($con,$selectEmail)or die(mysqli_error($con));
        $FetchEmail=mysqli_fetch_array($ExeEmail);
        $OldPassword=base64_decode($FetchEmail['Password']);

            $msg = "Your NestSeeker RealEstate Website Password IS :".$OldPassword;
          // use wordwrap() if lines are longer than 70 characters
          $msg1 = strip_tags($msg);
          //$Email=$fetchData['Email'];
          $Email=$_REQUEST['txtEmail'];
          //echo$Email;
          $Done=mail("$Email","NestSeekers",$msg1);
          //echo $Done;
          if($Done)
          {
            echo"<script> alert('Your Password Will Send To Your Email...');</script>";
        
            header("location:Login.php");
          }
           
        ?>
         
        <?php
        }
        ?>

        <script type="text/javascript" src="js/JavaScriptFunctions.js"></script>
        <script type="text/javascript">
            
            function Vali()
            {
                var msg="";
               
                if(document.getElementById("txtEmail").value=="")
                {
                    msg +="\nPlease Enter Email Id";
                }
               
                if(document.getElementById("lblEmail1").innerText=="* Email already Exists.")
                {
            
                    alert(msg+="Email is already Exists");
                    return false;
            
                }
               
                if(msg!="")
                {
                    alert(msg);
                    return false;
                }
                return true;
            }
            function EmailCheck12(EmailID)
            {
            
                    var xhttp = new XMLHttpRequest();
                    var Url = "AjaxEmailCheck.php?EID="+EmailID;
                    //alert(Url);
                    xhttp.onreadystatechange = function() 
                    {
                        if (this.readyState == 4 && this.status == 200) 
                        {
                            document.getElementById("lblEmail1").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", Url, true);
                    xhttp.send();
            }
    
        /*End Contact validation*/

        </script>
</head>

<!-- PHP Login Code -->
<!-- PHP Login Code -->

<body>
     <?php include_once("PageLoader.php");?>
      
<!-- Contact section start -->
<div class="contact-section overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <!-- details -->
                    <div class="details">
                        <!-- Logo -->
                        <!-- <a href="index.html">
                            <img src="img/black-logo.png" class="cm-logo" alt="black-logo">
                        </a> --> <a href="index.php"><img src="img/logos/bl.png" alt="logo"></a>
                        <!-- Name -->
                        <h3>Sign into your account</h3>
                        <!-- Form start -->
                        <form method="POST" >
                            <div class="form-group">
                                <input type="email" name="txtEmail" id="txtEmail" onblur="ValidateEmailID('txtEmail','lblEmail'); return EmailCheck12(this.value);" class="input-text" placeholder="Email Address" style="border-left-width: 3px;border-left-color: #ff214f;">
                                    <label id="lblEmail" style="color: red"></label>
                                    <label id="lblEmail1" style="color: yellow"></label>
                            </div>
                            <!-- <div class="form-group">
                                <input type="password" name="txtPassword" class="input-text" placeholder="Password" style="border-left-width: 3px;border-left-color: #ff214f;">
                            </div> -->
                            <div class="checkbox">
                               <!--  <div class="ez-checkbox pull-left">
                                    <label>
                                        <input type="checkbox" class="ez-hide">
                                        Remember me
                                    </label>
                                </div> -->
                                <!-- <a href="ForgotPassword.php" class="link-not-important pull-right">Forgot Password</a> -->
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" name="btnsubmit" onclick="return Vali(this);" class="btn-md button-theme btn-block">Send Me Email</button>
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
                    <div class="footer">
                        <span>Don't have an account? <a href="SignUp.php">Register here</a></span>
                    </div>
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

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->
</html>