<?php include_once("admin/Connection.php");?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->
<head>
    <?php include_once("LoadFile1.php");?>
    <!-- <style type="text/css">
        input{
            border-left-width: 5px;
            border-left-color: #ff214f; 
        }
    </style> -->

    <script type="text/javascript" src="js2/JavaScriptFunctions.js"></script>
        <script type="text/javascript">
            
            function ValidationSignUp()
            {
                var msg="";
                if(document.getElementById("txtFirstName").value=="")
                {
                    msg +="\nPlease Enter FirstName";
                }
                if(document.getElementById("txtLastName").value=="")
                {
                    msg +="\nPlease Enter LastName";
                }
               
                if(document.getElementById("txtEmail").value=="")
                {
                    msg +="\nPlease Enter Email Id";
                }
                if(document.getElementById("txtPassword").value=="")
                {
                    msg +="\nPlease Enter Password";
                }
                if(document.getElementById("txtConfirmPassword").value=="")
                {
                    msg +="\nPlease Enter Confirm Password";
                    
                }
                if(document.getElementById("txtContactNo").value=="")
                {
                    msg +="\nPlease Enter Contact No";
                    
                }
                if(document.getElementById("lblConfirmPassword").innerText=="* Password & Confirm Password does not match")
                {
            
                    alert(msg+="Password & Confirm Password does not match");
                    return false;
            
                }
                
                if(document.getElementById("lblEmail1").innerText=="* Email already Exists.")
                {
            
                    alert(msg+="Email is already Exists");
                    return false;
            
                }
                if(document.getElementById("lblContactNo1").innerText=="Contact Number already Exists.")
                {
            
                    alert(msg+="Contact Number already Exists.");
                    return false;
            
                }
                if(msg!="")
                {
                    alert(msg);
                    return false;
                }
                return true;
            }

           /* function checkCheckBoxes(checkboxes) 
            {
                if (checkboxes.chkInvestor.checked == false &&
                    checkboxes.chkInitiator.checked == false &&
                    checkboxes.chkExpert.checked == false) //my txtcmd_____ is Name of Control
                {
                    alert ('Please select atlest one user Type!');
                    return false;
                } 
                else
                {    
                    return true;
                }
            }*/
        function EmailCheck12(EmailID)
        {
            
                    var xhttp = new XMLHttpRequest();
                    var Url = "AjaxSignUpEmailCheck.php?EID="+EmailID;
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
    
         /*Contact validation*/
        function ContactNoCheck(ContactNo) 
        {
            var xhttp = new XMLHttpRequest();
            var Url = "AjaxSignUpContactNoCheck.php?CNO="+ContactNo;
            //alert(Url);
            xhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200) 
                {
                    document.getElementById("lblContactNo1").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", Url, true);
            xhttp.send();
        }
        /*End Contact validation*/

        </script>

</head>

<!-- PHP Code Submit form -->
    
    <?php

        if(isset($_REQUEST['btnSignUp']))
        {
            $Fnam=$_REQUEST['txtFirstName'];
            $Lnam=$_REQUEST['txtLastName'];
            $Email=$_REQUEST['txtEmail'];
            $Pass=base64_encode($_REQUEST['txtPassword']);
            $Contact=$_REQUEST['txtContactNo'];
            $UserTyp=$_REQUEST['chkUserType'];
             
                /*otp2*/
                  
                $username = "nestseekers.real.estate2019a1@gmail.com";
                $hash = "ac2273c75ac9541628b016b2153ccf4ebfe6452c12f0996b7da0fec2845bbc96";

                // Config variables. Consult http://api.textlocal.in/docs for more info.
                $test = "0";

                // Data for text message. This is the text message data.
                //$sender = "TXTLCL"; // This is who the message appears to be from.
                $numbers = $Contact; // A single number or a comma-seperated list of numbers
                $otp=mt_rand(100000,999999);
                $_SESSION['ContactOTP']=$otp;
                $message = "Hey ".$Fnam. ", Welcome To NestSeekers RealEstate Website Your OTP : ".$otp;
                // 612 chars or less
                // A single number or a comma-seperated list of numbers
                $message = urlencode($message);
                $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
                $ch = curl_init('http://api.textlocal.in/send/?');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch); // This is the result from the API
                echo("OTP SEND SUCCESSFULLY");
                curl_close($ch);

                header("location:verifyOTPNew.php?ContactNo=$Contact &otp=$otp &Fnam=$Fnam &Lnam=$Lnam &Email=$Email &Pass=$Pass &UserTyp=$UserTyp ");
                /*otp2*/
         
        }

    ?>

<!-- PHP Code Submit form -->

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
                       <a href="index.php">
                                <img src="img/logos/bl.png" alt="logo" style="height: 50px;"></a>

                        <!-- Name -->
                        <h3>Create an account</h3>
                        <!-- Form start-->
                        <form method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="txtFirstName" id="txtFirstName" class="input-text" placeholder="First Name" style="border-left-width: 3px;border-left-color: #ff214f;" onkeypress="return CharsOnly(event);" onblur="ValidateControl('txtFirstName','lblFirstName','First Name')">
                                    <label id="lblFirstName" style="color: red;font-size: 12px;"  ></label>
                                </div>
                                 <div class="col-md-6">
                                    <input type="text" name="txtLastName" id="txtLastName" class="input-text" placeholder="Last Name" style="border-left-width: 3px;border-left-color: #ff214f;"  onkeypress="return CharsOnly(event);" onblur="ValidateControl('txtLastName','lblLastName','Last Name')">
                                    <label id="lblLastName" style="color: red;font-size: 12px;" ></label>
                                </div>
                            </div>
                          
                            <div class="form-group">

                            </div>
                            <div class="form-group">
                                <input type="email" name="txtEmail" id="txtEmail" class="input-text" placeholder="Email Address" style="border-left-width: 3px;border-left-color: #ff214f;" onblur="ValidateEmailID('txtEmail','lblEmail'); return EmailCheck12(this.value);">
                                <label id="lblEmail" style="color: red;font-size: 12px;"></label>
                                    <label id="lblEmail1" style="color: red;font-size: 12px;"></label>
                            </div>
                             <div class="row">
                                <div class="col-md-6">
                                   <input type="password" name="txtPassword" id="txtPassword" class="input-text" placeholder="Password" style="border-left-width: 3px;border-left-color: #ff214f;" onblur="ValidateControl('txtPassword','lblPassword','Password')"; minlength="8" maxlength="16">
                                   <label id="lblPassword" style="color: red;font-size: 12px;"></label>

                                </div>
                                 <div class="col-md-6">
                                    <input type="password" name="txtConfirmPassword" id="txtConfirmPassword" class="input-text" placeholder="Confirm Password" style="border-left-width: 3px;border-left-color: #ff214f;" onblur="ValidatePassword('txtPassword','txtConfirmPassword','lblConfirmPassword');" minlength="8" maxlength="16">
                                   <label id="lblConfirmPassword" style="color: red;font-size: 12px;"></label>


                                </div>
                            </div>
                            <div class="form-group">
                                
                            </div>
                            <div class="form-group" >
                                <input type="text" name="txtContactNo" id="txtContactNo" class="input-text" placeholder="ContactNo" style="border-left-width: 3px;border-left-color: #ff214f;" onblur = "ContactNoCheck(this.value);"  onblur="ValidateControl('txtContactNo','lblContactNo','Contact Nnumber');" maxlength="10" onkeypress="return NumbersOnly(event);">    
                                <label id="lblContactNo" style="color: red;font-size: 12px;"></label>
                                    <label id="lblContactNo1" style="color: red;font-size: 12px;"></label>                                                               
                            </div>
                            <div class="form-group">
                                
                                
                            </div>
                           
                             <div class="form-group">
                                <label><h5>I Am :</h5></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="chkUserType" class="input" value="O" >&nbsp;Owner/Buyer&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="chkUserType" class="input"  value="A">&nbsp;Agent
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn-md button-theme btn-block" name="btnSignUp" onclick="return ValidationSignUp(this);" >Signup</button>
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
                        <span>Already a member? <a href="Login.php">Login here</a></span>
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

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->
</html>