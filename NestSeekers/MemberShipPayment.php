<?php include_once("admin/Connection.php");?>
<!--  -->
<?php

/*Fetch membership amount*/
    $MembershipID=$_REQUEST['MembershipID']; 
    $_SESSION['MembershipID']=$MembershipID;
    $selectMemberPlan="select * from tblMembership where MembershipID='".$MembershipID."'";
    $Exe_MP=mysqli_query($con,$selectMemberPlan) or die(mysqli_error($con));
    $FetchMP=mysqli_fetch_array($Exe_MP);
    /*Count Last date of Membership*/


/*Fetch membership amount*/

  /*
   *  @author   Gopal Joshi
   *  @wesite   www.sgeek.org
   *  @about    PayUMoney Payment Gateway integration in PHP
   */
  //$merchant_key  = "6itBpfwk";
    //$salt          = "YjjSWOnny3";
  //$merchant_id   = 4951382;
    
  $merchant_key  = "gtKFFx";//"gtKFFx";
    $salt          = "eCwWELxi";
    $payu_base_url = "https://test.payu.in"; // For Test environment
    $action        = '';
    $currentDir    = 'http://localhost/NestSeekers/';
    $posted = array();
    if(!empty($_POST)) {
      foreach($_POST as $key => $value) {    
        $posted[$key] = $value; 
      }
    }
    //print_r($posted["productinfo"]); 
    //$posted["productinfo"] = array()
    $formError = 0;
    if(empty($posted['txnid'])) {
      $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
    } else {
      $txnid = $posted['txnid'];
    }

    $hash         = '';
    $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

    if(empty($posted['hash']) && sizeof($posted) > 0) {
      if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
      ){
        $formError = 1;

      } else {
        $hashVarsSeq = explode('|', $hashSequence);
        $hash_string = '';  
        foreach($hashVarsSeq as $hash_var) {
          $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
          $hash_string .= '|';
        }
        $hash_string .= $salt;
        $hash = strtolower(hash('sha512', $hash_string));
        $action = $payu_base_url . '/_payment';
      }
    } elseif(!empty($posted['hash'])) {
      $hash = $posted['hash'];
      $action = $payu_base_url . '/_payment';
    }
?>
<!-- <html>
  <head>
 
  </head>
  <body onload="submitPayuForm()">
    <h2>PayU Form</h2>
    <br/>
    <?php if($formError) { ?>
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $merchant_key ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <table>
        <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td>Amount <span class="mand">*</span>: </td>
          <td><input name="amount" type="number" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" /></td>
          <td>First Name <span class="mand">*</span>: </td>
          <td><input type="text" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" /></td>
        </tr>
        <tr>
          <td>Email <span class="mand">*</span>: </td>
          <td><input type="email" name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
          <td>Phone <span class="mand">*</span>: </td>
          <td><input type="text" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
        </tr>
        <tr>
          <td>Product Info <span class="mand">*</span>: </td>
          <td colspan="3"><textarea name="productinfo"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea></td>
        </tr>
        <tr>
          <td>Success URL <span class="mand">*</span>: </td>
          <td colspan="3"><input type="text" name="surl" value="<?php echo (empty($posted['surl'])) ? $currentDir.'success.php' : $posted['surl'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td>Failure URL <span class="mand">*</span>: </td>
          <td colspan="3"><input type="text" name="furl" value="<?php echo (empty($posted['furl'])) ? $currentDir.'failure.php' : $posted['furl'] ?>" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="" size="64" /></td>
        </tr>

        <tr>
          <td><b>Optional Parameters</b></td>
        </tr>
        <tr>
          <td>Last Name: </td>
          <td><input type="text" name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" /></td>
          <td>Cancel URI: </td>
          <td><input type="text" name="curl" value="" /></td>
        </tr>
        <tr>
          <td>Address1: </td>
          <td><input type="text" name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" /></td>
          <td>Address2: </td>
          <td><input type="text" name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" /></td>
        </tr>
        <tr>
          <td>City: </td>
          <td><input type="text" name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" /></td>
          <td>State: </td>
          <td><input type="text" name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" /></td>
        </tr>
        <tr>
          <td>Country: </td>
          <td><input type="text" name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" /></td>
          <td>Zipcode: </td>
          <td><input type="text" name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF1: </td>
          <td><input type="text" name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /></td>
          <td>UDF2: </td>
          <td><input type="text" name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF3: </td>
          <td><input type="text" name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /></td>
          <td>UDF4: </td>
          <td><input type="text" name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF5: </td>
          <td><input type="text" name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" /></td>
          <td>PG: </td>
          <td><input type="text" name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" /></td>
        </tr>
        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Submit" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
  </body>
</html>
 -->
<!--  -->

<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:25:20 GMT -->
<head>
    <?php include_once("LoadFile1.php");?>

     <script>
        var hash = '<?php echo $hash ?>';
        function submitPayuForm() {
          if(hash == '') {
            return;
          }
          var payuForm = document.forms.payuForm;
          payuForm.submit();
        }
      </script>
</head>

<body onload="submitPayuForm()">
     <?php include_once("PageLoader.php");?>

<!-- Main header start -->
    <?php include_once("Menu.php");?>    
<!-- Main header end -->

<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Membership Payment</h1>
            <ul class="breadcrumbs">
                <li><a href="index.php">Home</a></li>
                <li class="active">Membership Payment</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->



   <!--  <h2>PayU Form</h2>
    <br/> -->
    <!-- <?php if($formError) { ?>
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?> -->
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $merchant_key ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />

        <div class="row">
            <div class="col-lg-10 offset-lg-1" style="padding: 100px;">
                <div class="contact-2">

                    <h3 class="heading-2">Membership Payment</h3>
                    <form action="#" method="GET" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group name">
                                    <input type="text" name="txtName" class="form-control" placeholder="Name" style="border-left-width: 3px;border-left-color: #ff214f;" value="<?php echo $_SESSION['AgentFnam']." ".$_SESSION['AgentLnam'];?>" readonly="">
                                </div>
                                <div class="form-group email">
                                    <input type="email" name="txtEmail" class="form-control" placeholder="Email" style="border-left-width: 3px;border-left-color: #ff214f;" value="<?php echo $_SESSION['AgentEmail'];?>" readonly="">
                                </div>
                                <div class="form-group number">
                                    <input type="text" name="txtContactNo" class="form-control" placeholder="Number" value="<?php echo $_SESSION['AgentContact'];?>" style="border-left-width: 3px;border-left-color: #ff214f;" readonly="">
                                </div>
                                <div class="form-group number">
                                    <input type="number" name="amount" class="form-control" placeholder="Amount" value="<?php echo $FetchMP['Price'];?>" style="border-left-width: 3px;border-left-color: #ff214f;" readonly="">
                                </div>
                               <!--  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">                   -->
                                    <div class="send-btn">
                                         <?php if(!$hash) { ?>
                                        <button type="submit" class="btn btn-md button-theme" value="">Confirm Payment</button>
                                        <?php } ?>
                                    </div>
                                <!-- </div> -->
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group ">
                                    <h3 class="heading-2">Selected Plan</h3>
                                    <!-- Plan -->
                                     <!-- select Membership data -->
                                        <div class="col-xl-8 col-lg-8 col-md-12">
                                            <div class="pricing-1 plan">
                                                <div class="plan-header">
                                                    <h5><?php echo $FetchMP['Title'];?> Plan</h5>
                                                    <p>Plan short description</p>
                                                    <div class="plan-price"><sup>₹</sup><?php echo $FetchMP['Price'];?><!-- <span>/6 month</span> --> </div>
                                                </div>
                                                <div class="plan-list">
                                                    <ul>
                                                        <li><i class="fa fa-globe"></i><?php echo $FetchMP['Days'];?> Days Member</li>
                                                        <!-- <li><i class="fa fa-thumbs-up"></i>Unlimited Storage</li>
                                                        <li><i class="fa fa-signal"></i>Unlimited Bandwidth</li>
                                                        <li><i class="flaticon-people"></i>1000 Email Addresses</li>
                                                        <li><i class="fa fa-star"></i>Free domain with annual plan</li>
                                                        <li><i class="fa fa-rocket"></i>4X Processing Power</li>
                                                        <li><i class="fa fa-server"></i>Premium DNS</li> -->
                                                    </ul>
                                                  <!--   <div class="plan-button text-center">
                                                        <a href="MembershipPayment.php?MembershipID=<?php echo $fetchMembership['MembershipID'];?> " class="btn btn-outline pricing-btn">Get Started</a>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Plan -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

               <!--  <div style="margin-top: 100px;margin-left: 400px;">
        
                    <div class="form-group">
                         <input type="text" name="txtFirstName" class="input-text" placeholder="First Name" style="border-left-width: 3px;border-left-color: #ff214f;width: 700px;">
                       
                    </div>
                    <div class="form-group">
                        <input type="email" name="txtEmail" class="input-text" placeholder="Email Address" style="border-left-width: 3px;border-left-color: #ff214f;">
                    </div>
                    <div class="form-group">
                        <input type="password" name="txtPassword" class="input-text" placeholder="Password" style="border-left-width: 3px;border-left-color: #ff214f;">
                    </div>
                    <div class="form-group">
                        <input type="password" name="txtConfirmPassword" class="input-text" placeholder="Confirm Password" style="border-left-width: 3px;border-left-color: #ff214f;">
                    </div>
                     <div class="form-group">
                        <input type="text" name="txtContactNo" class="input-text" placeholder="ContactNo" style="border-left-width: 3px;border-left-color: #ff214f;">
                    </div>
                  </div> -->

                    <table>
                       <!--  <tr>
                          <td><b>Mandatory Parameters</b></td>
                        </tr> -->
                       <!--  <tr>
                          <td>Amount <span class="mand">*</span>: </td>
                          <td><input name="amount" type="hidden" value="<?php echo $FetchMP['Price'];?>" readonly="" /></td>
                        </tr> -->
                          <!-- <td>First Name <span class="mand">*</span>: </td>
                          <td> --><input type="hidden" name="firstname" id="firstname" value="hello" /><!-- </td>
                        </tr>
                        <tr>
                          <td>Email <span class="mand">*</span>: </td>
                          <td> --><input type="hidden" name="email" id="email" value="NestSeekers@gmail.com" /><!-- </td>
                          <td>Phone <span class="mand">*</span>: </td>
                          <td> --><input type="hidden" name="phone" value="1234567891" /><!-- </td>
                        </tr>
                        <tr>
                          <td>Product Info <span class="mand">*</span>: </td>
                          <td colspan="3"> --><textarea name="productinfo" hidden="hidden">RealEstate</textarea><!-- </td>
                        </tr>
                        <tr>
                          <td>Success URL <span class="mand">*</span>: </td>
                          <td colspan="3"> --><input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? $currentDir.'success.php' : $posted['surl'] ?>" size="64" /><!-- </td>
                        </tr>
                        <tr>
                          <td>Failure URL <span class="mand">*</span>: </td>
                          <td colspan="3"> --><input type="hidden" name="furl" value="<?php echo (empty($posted['furl'])) ? $currentDir.'failure.php' : $posted['furl'] ?>" size="64" /><!-- </td>
                        </tr>

                        <tr>
                          <td colspan="3"><input type="hidden" name="service_provider" value="" size="64" /></td>
                        </tr>

                        <tr>
                          <td><b>Optional Parameters</b></td>
                        </tr>
                        <tr>
                          <td>Last Name: </td>
                          <td><input type="text" name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" /></td>
                          <td>Cancel URI: </td>
                          <td><input type="text" name="curl" value="" /></td>
                        </tr>
                        <tr>
                          <td>Address1: </td>
                          <td><input type="text" name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" /></td>
                          <td>Address2: </td>
                          <td><input type="text" name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" /></td>
                        </tr>
                        <tr>
                          <td>City: </td>
                          <td><input type="text" name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" /></td>
                          <td>State: </td>
                          <td><input type="text" name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" /></td>
                        </tr>
                        <tr>
                          <td>Country: </td>
                          <td><input type="text" name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" /></td>
                          <td>Zipcode: </td>
                          <td><input type="text" name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" /></td>
                        </tr>
                        <tr>
                          <td>UDF1: </td>
                          <td><input type="text" name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /></td>
                          <td>UDF2: </td>
                          <td><input type="text" name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /></td>
                        </tr>
                        <tr>
                          <td>UDF3: </td>
                          <td><input type="text" name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /></td>
                          <td>UDF4: </td>
                          <td><input type="text" name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" /></td>
                        </tr>
                        <tr>
                          <td>UDF5: </td>
                          <td><input type="text" name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" /></td>
                          <td>PG: </td>
                          <td><input type="text" name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" /></td>
                        </tr> -->
                        <!-- <tr>
                          <?php if(!$hash) { ?>
                            <td colspan="4"><input type="submit" value="Submit" /></td>
                          <?php } ?>
                        </tr> -->
                    </table>
                </div>
            </div>
</form>

    <!-- Sub footer start -->
    <?php include_once("SubFooter.php");?>
    <!-- Sub footer end -->

    <!-- Full Page Search -->
    <?php //include_once("FullPageSearch.php");?>

    <?php include_once("LoadJS.php");?>

</body>

<!-- Mirrored from storage.googleapis.com/themevessel-products/neer/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 12:28:17 GMT -->
</html>