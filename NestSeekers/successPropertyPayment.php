<head>
   <?php include_once("LoadFile1.php");
   include_once("admin/Connection.php");

   ?>
</head>
<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
<body>
 <?php //include_once("PageLoader.php");?>

<!-- Main header start -->
    <?php //include_once("Menu.php");?>    
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
<?php

if (isset($_REQUEST['btnindex'])) 
{
   
     
      $PID=$_SESSION['NewPropertyID'];
       unset($_SESSION["NewPropertyID"]);
    header("location:my-properties.php?PID=$PID");
}




    
  $status      =$_POST["status"];
  $firstname   =$_POST["firstname"];
  $amount      =$_POST["amount"];
  $txnid       =$_POST["txnid"];
  $posted_hash =$_POST["hash"];
  $key         =$_POST["key"];
  $productinfo =$_POST["productinfo"];
  $email       =$_POST["email"];
  $salt        ="eCwWELxi";

  if (isset($_POST["additionalCharges"])) {
    $additionalCharges =$_POST["additionalCharges"];
    $retHashSeq        = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
          
  } else {
    $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  }

  $hash = hash("sha512", $retHashSeq);
  if ($hash != $posted_hash) {
    echo "Invalid Transaction. Please try again";

  } else {
    ?>
    <br><br>
    <center>
    <img src="img/thankU.gif" style="height: 100px;width: 200px;"></center>
    <?php
    echo "<center><h3 ><br> Your Property Post is Live On NestSeekers Website
    .</h3></center>";
   
   /*$_SESSION['AgentLnam']=$_REQUEST['Lnam'];
    $_SESSION['AgentFnam']=$_REQUEST['Fnam'];
    $_SESSION['AgentEmail']=$_REQUEST['Email'];
    $_SESSION['AgentPass']=$_REQUEST['Pass'];
    $_SESSION['AgentContact']=$_REQUEST['Contact'];
    $_SESSION['AgentUserTyp']=$_REQUEST['UserTyp'];*/
    //echo $_SESSION['MembershipID'];

    $select_PropertyPlan="SELECT tblProperty.*, tblPackage.*,tblUser.FirstName,tblUser.ContactNo,tblUser.Email,
                tblUser.lastname
                 FROM tblProperty 
                 INNER JOIN tblUser ON tblUser.UserID=tblProperty.UserID
                 INNER JOIN tblPackage ON tblProperty.PackageID=tblPackage.PackageID
                 WHERE PropertyID='".$_SESSION['NewPropertyID']."'";
    $ExecutePropertyPlan=mysqli_query($con,$select_PropertyPlan) or die(mysqli_error($con));
    $fetchPropertyPlan=mysqli_fetch_array($ExecutePropertyPlan);
  // echo "pass".$_SESSION['AgentPass']."<br>";
   //echo "pass".base64_encode($_SESSION['AgentPass'])."<br>";

  $UpdateProperty="UPDATE tblProperty SET IsPayment=1 WHERE PropertyID=".$_SESSION['NewPropertyID'];
  //echo $InsertUser;
  mysqli_query($con,$UpdateProperty)or die(mysqli_error($con));
  $PropertyID=$_SESSION['NewPropertyID'];

  /*insert into tblInvoice*/
  $inserPropertyInvoice="insert into tblPropertyInvoice values(null,'".$fetchPropertyPlan['UserID']."','".$fetchPropertyPlan['PackageID']."','".$amount."','".$fetchPropertyPlan['Day']."',null,now())";
    //$insert_invoice1="insert into tblMemberShipInvoice values(null,'$lastUserID',".$_SESSION['MembershipID']."','$amount','".$fetchPlan['Days']."',null,now())";
    //echo $insert_invoice; 
    
    mysqli_query($con,$inserPropertyInvoice) or die(mysqli_error($con));
    $lastinvoiceid=mysqli_insert_id($con);
  /*insert into tblInvoice*/
  
  
  }         
?> 
  <center>
    <?php
      $select="select * from tblPropertyInvoice where InvoiceID=".$lastinvoiceid;
      $selectqry=mysqli_query($con,$select) or die(mysqli_error($con));
      $Fetch_Data=mysqli_fetch_array($selectqry);
      //echo $Fetch_Data['InvoiceID'];
    ?>
    <br>


    <div class="col-xs-12">
      <form method="post">
        <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="img/logos/bl.png" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                Invoice #: <?php echo $Fetch_Data['InvoiceID'];?><br>
                                Date: <?php echo $Fetch_Data['CreatedOn'];?><br>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information" >
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                NestSeekers.co.in, Inc.<br>
                                H.NO 123 Citylight<br>
                                Surat, Gujarat 395005
                            </td>
                            
                            <td>
                                <?php echo $fetchPropertyPlan['FirstName']." ".$fetchPropertyPlan['lastname'];?><br>
                                <?php echo $fetchPropertyPlan['ContactNo'];?><br>
                                <?php echo $fetchPropertyPlan['Email'];?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="" style="background-color: #ff214f;">
                <td>
                    Payment Method
                </td>
                
                <td>
                    Amount #
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Online
                </td>
                
                <td>
                    <?php echo $amount;?>
                </td>
            </tr>
            
            <tr class="" style="background-color: #ff214f;">
                <td>
                    Membership Plan
                </td>
                
                <td>
                    Total Amount
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    <?php echo $fetchPropertyPlan['PackageName']." (".$fetchPropertyPlan['Day']. " Days) ";?>
                </td>
                
                <td>
                    <?php echo $amount;?> 
                </td>
            </tr>            
            
            
            
        </table>
    </div>
    
    <br>
    
      <button type="submit" class="hvr-float-shadow" name="btnMyPropertis" style="background-color: #ff214f;color:white;height: 50px;width: 100px;">Back</button>
      <form method="post">
      <!-- <a target="#" href="Paymentstatament.php?TID=<?php echo $lastinvoiceid;?>"  >download</a> -->
      </form>
    </div>
  </center>
   <!-- Sub footer start -->
    <?php include_once("SubFooter.php");?>
    <!-- Sub footer end -->
  </body> 
