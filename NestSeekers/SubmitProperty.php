   <?php include_once("admin/Connection.php");?>

<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/submit-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->
<head>
    <?php include_once("LoadFile1.php");?>
    <!-- In Ajax Fetch City the Class of comboBox must set Form-control  not use library class -->
       <script type="text/javascript">
        function addRent(x)
        {
            if(x=='Rent')
            {   
                document.getElementById("txtPrice").disabled =true;
                document.getElementById("txtRentPerMonth").disabled =false;                
                document.getElementById("txtSecurityAmount").disabled =false;
                document.getElementById("txtMaintenance").disabled =false;
                document.getElementById("chkOtherCharges").disabled =false;
                document.getElementById("renth4").disabled=false;
                document.getElementById("rentdiv").disabled=false;
                alert("hi");
            }
            else
            {
                document.getElementById("txtPrice").disabled =false;
                document.getElementById("txtRentPerMonth").disabled=true;
                 document.getElementById("txtSecurityAmount").disabled =true;
                document.getElementById("txtMaintenance").disabled =true;
                document.getElementById("chkOtherCharges").disabled =true;
                document.getElementById("renth4").disabled=true;
                document.getElementById("rentdiv").disabled=true;
                alert("no");
            }
        }
        function getCity(StateID) 
        {
            var xhttp = new XMLHttpRequest();      
            var strURL="FindCity.php?StID="+StateID;       
              //alert(strURL);
            xhttp.onreadystatechange = function() 
            {      
                  if (this.readyState == 4 && this.status == 200) 
                  {
                   //alert(this.responseText);
                   document.getElementById("citydiv").innerHTML = this.responseText;
                  }
            };
            xhttp.open("GET", strURL, true);
            xhttp.send();
        }

         function getPropertyType(PropertyTypeID) 
        {
            var xhttp = new XMLHttpRequest();      
            var strURL="FindPropertyType.php?PtID="+PropertyTypeID;       
              //alert(strURL);
            xhttp.onreadystatechange = function() 
            {      
                  if (this.readyState == 4 && this.status == 200) 
                  {
                   //alert(this.responseText);
                   document.getElementById("PropertyDiv").innerHTML = this.responseText;
                  }
            };
            xhttp.open("GET", strURL, true);
            xhttp.send();
        }



    </script>
</head>
<!-- PHP Code User Detail Fetch -->

<?php
        $select_UserDetails="select * from tblUser where UserID='".$_SESSION['UserID']."'";
        $Execute_UserDetail=mysqli_query($con,$select_UserDetails)or die(mysqli_error($con));
        $fetch_UserDetail=mysqli_fetch_array($Execute_UserDetail);

        $PropertyStatus=0;
        /*On Click Submit Property*/
        
        if(isset($_REQUEST['btnSubmitProperty']))
        {
            $UserID=$fetch_UserDetail['UserID'];
            $PackageID=$_REQUEST['PackID'];

            $selPackage="select * from tblPackage WHERE PackageID=".$PackageID;
            $ExePackage=mysqli_query($con,$selPackage) or die(mysqli_error($con));
            $fetchPackage=mysqli_fetch_array($ExePackage);
           
            if($fetch_UserDetail['IsActive']==0 || $fetch_UserDetail['IsActive']==1)
            {

                if($_REQUEST['cmbStatus']=='Sale')
                {    
                    $insert_Property="INSERT into tblProperty VALUES(null,
                    '".$_REQUEST['txtPropertyTitle']."',
                    '".$_REQUEST['cmbStatus']."',
                    '".$_REQUEST['cmbPropertyType']."',
                    '".$_REQUEST['txtPrice']."',
                    null,
                    null,
                    null,
                    0,
                    '".$_REQUEST['txtArea']."',
                    '".$_REQUEST['cmbBedRoom']."',
                    null,
                    '".$_REQUEST['txtAddress']."',
                    null,
                    '".$_REQUEST['CmbCity']."',
                    null,
                    '".$_REQUEST['txtDetail']."',
                    '".$_REQUEST['cmbFurnished']."',
                    '".$_REQUEST['cmbTotalFloor']."',
                    '".$_REQUEST['cmbFloorNo']."',
                    null,
                    '".$PackageID."',
                    null,
                    1,
                    0,
                    0,
                    null,
                    '".$UserID."',
                    null,
                    now(),
                    null,
                    0,
                    1,
                    0,
                    null)";
                    //echo $insert_Property;
            }else
            {
                 $insert_Property="INSERT into tblProperty VALUES(null,
                '".$_REQUEST['txtPropertyTitle']."',
                '".$_REQUEST['cmbStatus']."',
                '".$_REQUEST['cmbPropertyType']."',
                null,
                '".$_REQUEST['txtRentPerMonth']."',
                '".$_REQUEST['txtSecurityAmount']."',
                '".$_REQUEST['txtMaintenance']."',
                1,
                '".$_REQUEST['txtArea']."',
                '".$_REQUEST['cmbBedRoom']."',
                null,
                '".$_REQUEST['txtAddress']."',
                null,
                '".$_REQUEST['CmbCity']."',
                null,
                '".$_REQUEST['txtDetail']."',
                '".$_REQUEST['cmbFurnished']."',
                '".$_REQUEST['cmbTotalFloor']."',
                '".$_REQUEST['cmbFloorNo']."',
                null,
                '".$PackageID."',
                null,
                1,
                0,
                0,
                null,
                '".$UserID."',
                null,
                now(),
                null,
                0,
                1,
                0,
                null)";
                //echo $insert_Property;
            }

                
                $Exe_InsertProperty=mysqli_query($con,$insert_Property)or die(mysqli_error($con));
                $Last_PropertyID=mysqli_insert_id($con);


               
                if (!empty($_FILES["txtFileImage"])) {
                    $PropertyStatus=$PropertyStatus+6;
                }
                if (!empty($_FILES['txtFileVideo'])) {
                   $PropertyStatus=$PropertyStatus+6;
                }
                //echo "propert Status".$PropertyStatus;
                $updateStatus="update tblProperty set PropertyDetailStatus='".$PropertyStatus."' where PropertyID=".$Last_PropertyID;
                $Exe_Status=mysqli_query($con,$updateStatus) or die(mysqli_error($con));
                //echo $updateStatus;
                /*Progress Status Calculation*/


                foreach($_FILES["txtFileImage"]["name"] as $key => $a ) 
                {

                    $fname=date("HsYHsdm").$_FILES['txtFileImage']['name'][$key]; 
                    $inimg="insert into tblimage values(Null,'$Last_PropertyID','$fname',now(),1,0)";  
                    //echo "aaaaaaaaaaaaaaaa".$fname;
                    //echo $inimg."<br>";  
                    mysqli_query($con,$inimg);
                    move_uploaded_file($_FILES['txtFileImage']['tmp_name'][$key],"img/Property/Images/".$fname);  
                    $lastimgid=mysqli_insert_id($con);
                }
                    $upDefault="update tblimage set IsDefault=1 where ImageID=".$lastimgid;
                    mysqli_query($con,$upDefault) or die(mysqli_error($con));
                foreach($_FILES["txtFileVideo"]["name"] as $key => $a ) 
                {
                    $fname=date("HsYHsdm").$_FILES['txtFileVideo']['name'][$key]; 
                    $inimg="insert into tblVideo values(Null,'$Last_PropertyID','$fname',now(),1,0)";  
                    //echo "aaaaaaaaaaaaaaaa".$fname;
                    //echo $inimg."<br>";  
                    mysqli_query($con,$inimg);
                    move_uploaded_file($_FILES['txtFileVideo']['tmp_name'][$key],"img/Property/Video/".$fname); 
                    $lastvideoid=mysqli_insert_id($con); 
                }
                $upDefault2="update tblvideo set IsDefault=1 where VideoID=".$lastvideoid;
                mysqli_query($con,$upDefault2) or die(mysqli_error($con));
                echo "<script>alert('Your Project Will be Online & Verified withine 24 hour by NestSeekers. Now You Can See Your Project In Your Dashboard')</script>";

                /*Property Features Insert */
               
                //$insertFeatures="insert into tblFeatures values(null,'".$Last_PropertyID."','".$UserID."',now(),1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)";
                //echo $insertFeatures;
                //mysqli_query($con,$insertFeatures)or die(mysqli_error($con));
                /*roperty Features Insert */


                 /*Send Email To Owner Thankyou For submit new property*/
                $Email=$_SESSION['UserEmail'];
                $Subject="Thank You For Submit New Property";                 
                $msg="WelCome To NestSeekers Real Estate Website, Your Payment Process is Not Done
                For Payment -
                Step 1>. Login
                Step 2>. Go To DashBoard.
                Step 3>. then Go to My Property Option.
                Step 4>. Property List Display Here You Can Pay Which is Remaining...
                    If Payment is Succefully Done then Your Property Post is Live In Website. You can see your post 
                    & Thankyou For Submiting New Property. Your PropertyID : #$Last_PropertyID";
                $from="NestSeekers.real.estate2019@gmail.com";
                mail($Email,$Subject,$msg,$from); 
            /*End Send  Email To Owner Thankyou For submit new property*/
                $UID=$_SESSION['UserID'];
                //header("location:my-properties.php?UserID=$UID");
                header("location:propertyPayment.php?PropertyID=$Last_PropertyID");
            }/*close IsActive*/
            else
            {
                echo "<script>alert('You Are Not Active By NestSeekers ')</script>";
            }
        }
        /*On Click Submit Property*/



     ?>
<!-- PHP Code User Detail Fetch -->



<body>
    <?php include_once("PageLoader.php");?>


<!-- Main header start -->
<header class="main-header header-2 fixed-header">
     <?php include_once("Db_Header.php");?>
    
</header>
<!-- Main header end -->

<!-- Dashboard start -->
<div class="dashboard submit-property">
    <div class="container-fluid">
        <div class="row">
             <!-- Menu Dashboard -->
                <?php include_once("Db_Menu.php");?>

            <!-- Menu Dashboard -->
            <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>Hey <span style="color: #ff214f;"><?php echo $fetch_UserDetail['FirstName'];?>!</span> Tell Us About Property</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="index.html">Index</a>
                                        </li>
                                        <li>
                                            <a href="dashboard.html">Dashboard</a>
                                        </li>
                                        <li class="active">Submit New Property</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-address dashboard-list" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <form method="post" enctype="multipart/form-data">
                            <h4 class="bg-grea-3" >Basic Information</h4>
                            <div class="search-contents-sidebar">
                                <div class="row pad-20">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Property Title *</label>
                                            <input type="text" class="input-text" name="txtPropertyTitle" placeholder="Property Title" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Status *</label>
                                            <select class="selectpicker search-fields" name="cmbStatus" required="" onchange="addRent(this.value)">
                                                 <option value="">Choose Status</option>
                                                <option value="Sale" >For Sale</option>
                                                <option value="Rent" >For Rent</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Category * </label>
                                            <select class="form-control" name="cmbCategory" onchange="getPropertyType(this.value)">
                                                <option value="">Choose Category</option>
                                                <!-- php code Category -->
                                                    <?php 
                                                        $select_Category="select * from tblCategory where IsActive=1";
                                                        $Execute_select_Category=mysqli_query($con,$select_Category)or die(mysqli_error($con));
                                                        while($fetch_Category=mysqli_fetch_array($Execute_select_Category))
                                                        {
                                                    ?>
                                                <!-- php code Category -->
                                                <option value="<?php echo $fetch_Category['CategoryID'];?>"><?php echo $fetch_Category['CategoryName'];?></option>
                                                <?php
                                                        }
                                                ?>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group" id="PropertyDiv">
                                            <label>Property Type *</label>
                                            <select class="form-control" name="cmbPropertyType" >
                                                <option value="">Choose PropertyType</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Expected Price(₹&nbsp;) *</label>
                                            <input type="text" class="input-text" name="txtPrice" id="txtPrice" placeholder="INR">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Area *</label>
                                            <input type="text" class="input-text" name="txtArea" placeholder="SqFt">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>BedRooms</label>
                                            <select class="selectpicker search-fields" name="cmbBedRoom">
                                                <option value="">Choose BedRooms</option>
                                                <!-- php code bedroom -->
                                                    <?php 
                                                        $select_BedRoom="SELECT * from tblBedroom WHERE IsActive=1";
                                                        $Execute_select_BedRoom=mysqli_query($con,$select_BedRoom)or die(mysqli_error($con));
                                                        while($fetch_BedRoom=mysqli_fetch_array($Execute_select_BedRoom))
                                                        {
                                                    ?>
                                                <!-- php code bedroom -->
                                                <option value="<?php echo $fetch_BedRoom['BedRoomID'];?>"><?php echo $fetch_BedRoom['BedRoomValue'];?></option>
                                                <?php
                                                        }
                                                ?>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                             <h4 class="bg-grea-3" id="renth4">Rent Details * (Only For Rent Properties)</h4>
                            <div class="row pad-20" id="rentdiv">
                               
                             
                                      <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Monthly Rent *</label>
                                            <input type="text" class="input-text" name="txtRentPerMonth" id="txtRentPerMonth" placeholder="Monthly Rent">
                                        </div>
                                    </div>
                                
                                     <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Security Amount *</label>
                                            <input type="text" class="input-text" name="txtSecurityAmount" id="txtSecurityAmount" placeholder="Security Amount">
                                        </div>
                                    </div>
                                     <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Maintenance Charges *</label>
                                            <input type="text" class="input-text" name="txtMaintenance" id="txtMaintenance" placeholder="Maintenance">
                                        </div>
                                    </div>
                                     <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Other Charges *</label>
                                            <input type="CheckBox" name="" name="chkOtherCharges" id="chkOtherCharges" value="1">Electricity & Water charges excluded.
                                            
                                        </div>

                                    </div>                                
                               
                            </div>
                            <h4 class="bg-grea-3">Location *</h4>
                            <div class="row pad-20">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Address </label>
                                        <input type="text" class="input-text" name="txtAddress"  placeholder="Address" required="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>State</label>
                                        <!-- <select class="selectpicker search-fields" name="CmbState" onChange="getCity(this.value)" required=""> -->
                                            <select class="form-control" name="CmbState" onchange="getCity(this.value)" required="">
                                            <option value="">Choose State</option>
                                            <!-- php Select State -->
                                            <?php
                                              $select_State="SELECT * from tblstate ORDER BY StateName";
                                              $Exe_State_query=mysqli_query($con,$select_State) or die(mysqli_error($con));
                                              while($fetch_State=mysqli_fetch_array($Exe_State_query))
                                              {
                                            ?>   
                                            <!-- php Select State -->

                                            <option value="<?php echo $fetch_State['StateID']?>"><?php echo $fetch_State['StateName']?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group" id="citydiv">
                                        <label>City</label>
                                        <select class="form-control" name="CmbCity" required="" >
                                            <option value="">Choose City</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="text" class="input-text" name="zip"  placeholder="Postal Code">
                                    </div>
                                </div> -->
                            </div>
                            <h4 class="bg-grea-3">Property Images</h4>
                            <div class="row pad-20">
                                <div class="col-lg-12">
                                    <!-- <div id="myDropZone" class="dropzone dropzone-design"  >
                                        <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                                    </div> -->
                                        <div class="single-input">
                                            <input onfocus="(this.type='file')"  placeholder="Select Property Images " accept=".png, .jpg, .jpeg, .gif" name="txtFileImage[]" id="txtFileImage" multiple="multiple">
                                        </div> <!-- /.single-input -->                                  
                                </div>
                            </div>
                            <h4 class="bg-grea-3">Property Video</h4>
                            <div class="row pad-20">
                                <div class="col-lg-12">
                                    <!-- <div id="myDropZone" class="dropzone dropzone-design"  >
                                        <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                                    </div> -->
                                               
                                        <div class="single-input">
                                            <input onfocus="(this.type='file')"  placeholder="Select Property Videos " accept=".mp4, .avi" name="txtFileVideo[]" id="txtFileVideo" multiple="multiple">
                                        </div> <!-- /.single-input -->
                                  
                                </div>
                            </div>
                            <h4 class="bg-grea-3">Detailed Information</h4>
                            <div class="row pad-20">
                                <div class="col-lg-12">
                                    <textarea class="input-text" name="txtDetail" placeholder="Detailed Information" required=""></textarea>
                                </div>
                            </div>
                            <h4 class="bg-grea-3">Add More Details To Get relevant Response</h4>
                            
                            <div class="row pad-20">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Furnished Status</label>
                                            <select class="selectpicker search-fields" name="cmbFurnished">
                                                <option value="">Choose Furnished Status</option>
                                                <!-- php code FS -->
                                                    <?php 
                                                        $select_FS="SELECT * from tblFurnishedStatus WHERE IsActive=1";
                                                        $Execute_select_FS=mysqli_query($con,$select_FS)or die(mysqli_error($con));
                                                        while($fetch_FS=mysqli_fetch_array($Execute_select_FS))
                                                        {
                                                    ?>
                                                <!-- php code FS -->
                                                <option value="<?php echo $fetch_FS['FurnishedStatusID'];?>"><?php echo $fetch_FS['FurnishedStatusType'];?></option>
                                                <?php
                                                        }
                                                ?>
                                                
                                            </select>
                                        </div>
                                    </div>

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Total Floor</label>
                                            <select class="selectpicker search-fields" name="cmbTotalFloor">
                                                 <option value="">Choose Total Floor</option>
                                                <!-- php code TF -->
                                                    <?php 
                                                        $select_TF="SELECT * from tblTotalFloor WHERE IsActive=1";
                                                        $Execute_select_TF=mysqli_query($con,$select_TF)or die(mysqli_error($con));
                                                        while($fetch_TF=mysqli_fetch_array($Execute_select_TF))
                                                        {
                                                    ?>
                                                <!-- php code TF -->
                                                <option value="<?php echo $fetch_TF['TotalFloorID'];?>"><?php echo $fetch_TF['TotalFloorValue'];?></option>
                                                <?php
                                                        }
                                                ?>
                                                
                                            </select>
                                        </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Floor Number</label>
                                            <select class="selectpicker search-fields" name="cmbFloorNo">
                                                 <option value="">Choose Floor Number</option>

                                                <!-- php code FN -->
                                                    <?php 
                                                        $select_FN="SELECT * from tblFloorNo WHERE IsActive=1";
                                                        $Execute_select_FN=mysqli_query($con,$select_FN)or die(mysqli_error($con));
                                                        while($fetch_FN=mysqli_fetch_array($Execute_select_FN))
                                                        {
                                                    ?>
                                                <!-- php code FN -->
                                                <option value="<?php echo $fetch_FN['FloorNoID'];?>"><?php echo $fetch_FN['FloorNoValue'];?></option>
                                                <?php
                                                        }
                                                ?>
                                                
                                            </select>
                                        </div>
                                    </div>
                            </div>
                            <h4 class="bg-grea-3">Contact Details</h4>
                            <div class="row pad-20">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="input-text" name="txtName" value="<?php if(isset($fetch_UserDetail)) echo $fetch_UserDetail['FirstName']." ".$fetch_UserDetail['LastName'];?>" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="input-text" name="txtEmail" value="<?php if(isset($fetch_UserDetail)) echo $fetch_UserDetail['Email'];?>" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Phone (optional)</label>
                                        <input type="text" class="input-text" name="txtContactNo"  value="<?php if(isset($fetch_UserDetail)) echo $fetch_UserDetail['ContactNo'];?>"  placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                      <button type="submit" class="btn btn-md button-theme" name="btnSubmitProperty">Submit Property</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php include_once("Db_BottomFooter.php");?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashboard end -->

<!-- Full Page Search -->
<!-- <div id="full-page-search">
    <button type="button" class="close">×</button>
    <form action="http://storage.googleapis.com/themevessel-products/neer/index.html#">
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-sm button-theme">Search</button>
    </form>
</div> -->


</body>

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/submit-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:35:27 GMT -->

</html>
    <?php include_once("LoadJS.php");?>

