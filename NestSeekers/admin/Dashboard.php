<!doctype html>
<html lang="en">

<!-- Mirrored from demos.creative-tim.com/bs3/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 15:14:39 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <?php include_once("LoadFile1.php");?>
    <?php include_once("FusionCharts.php");?>
    <?php include_once("Connection.php");?>
</head>


<body >
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

	<div class="wrapper">

	    <!-- SideMenu -->
            <?php include_once("SideBarMenu.php");?>

        <!-- SideMenu -->
	    <div class="main-panel">
			<?php include_once("NavBar.php");?>

			<div class="content">
					<div class="container-fluid"><a href="">Dashboard/</a><hr>
                        <div class="row">
                        	<div class="col-lg-3 col-md-6 col-sm-6">
                        		<div class="card card-stats">
                        			<div class="card-header" data-background-color="orange">
                        				<i class="material-icons">weekend</i>
                        			</div>
                        			<div class="card-content">
                        				<p class="category">Properties</p>
                        				<?php
					                        $SalePropertyCount="Select count(*) as TotalProperty from tblProperty";
					                        $ExeSalePropertyCount=mysqli_query($con,$SalePropertyCount) or die(mysqli_error($con));
					                        $FetchSalePropertyCount=mysqli_fetch_array($ExeSalePropertyCount);
                    					?>
                        				<h3 class="card-title"><?php echo $FetchSalePropertyCount['TotalProperty'];?></h3>
                        			</div>
                        			<div class="card-footer">
                        				<div class="stats">
                        					<i class="material-icons text-danger">warning</i> <a href="#pablo">Get More Space...</a>
                        				</div>
                        			</div>
                        		</div>
                        	</div>

                        	<div class="col-lg-3 col-md-6 col-sm-6">
                        		<div class="card card-stats">
                        			<div class="card-header" data-background-color="rose">
                        				<i class="material-icons">equalizer</i>
                        			</div>
                        			<div class="card-content">
                        				<p class="category">Visitors</p>
                        				<h3 class="card-title">75.521</h3>
                        			</div>
                        			<div class="card-footer">
                        				<div class="stats">
                        					<i class="material-icons">local_offer</i> Tracked from Google Analytics
                        				</div>
                        			</div>
                        		</div>
                        	</div>


                        	<div class="col-lg-3 col-md-6 col-sm-6">
                        		<div class="card card-stats">
                        			<div class="card-header" data-background-color="green">
                        				<i class="material-icons">store</i>
                        			</div>
                        			<div class="card-content">
                        				<p class="category">Live Property</p>
                        				<?php
					                        $SalePropertyCount="Select count(*) as LiveProperty from tblProperty where IsActive=1";
					                        $ExeSalePropertyCount=mysqli_query($con,$SalePropertyCount) or die(mysqli_error($con));
					                        $FetchSalePropertyCount=mysqli_fetch_array($ExeSalePropertyCount);
                    					?>
                        				<h3 class="card-title"><?php echo $FetchSalePropertyCount['LiveProperty'];?></h3>
                        			</div>
                        			<div class="card-footer">
                        				<div class="stats">
                        					<i class="material-icons">date_range</i> Last 24 Hours
                        				</div>
                        			</div>
                        		</div>
                        	</div>

                        	<div class="col-lg-3 col-md-6 col-sm-6">
                        		<div class="card card-stats">
                        			<div class="card-header" data-background-color="blue">
                        				<i class="fa fa-twitter"></i>
                        			</div>
                        			<div class="card-content">
                        				<p class="category">Users</p>
                        				<?php
					                        $SalePropertyCount="Select count(*) as Users from tbluser";
					                        $ExeSalePropertyCount=mysqli_query($con,$SalePropertyCount) or die(mysqli_error($con));
					                        $FetchSalePropertyCount=mysqli_fetch_array($ExeSalePropertyCount);
                    					?>
                        				<h3 class="card-title"><?php echo $FetchSalePropertyCount['Users'];?></h3>
                        			</div>
                        			<div class="card-footer">
                        				<div class="stats">
                        					<i class="material-icons">update</i> Just Updated
                        				</div>
                        			</div>
                        		</div>
                        	</div>
                        </div>

                        <h3>Manage Listings</h3>
                        <br>
                        <div class="row">
<!--                         	<div class="col-md-4">
                        		<div class="card card-product">
                        			<div class="card-image" data-header-animation="true">
                        				<a href="#pablo">
                        					<img class="img" src="assets/img/card-2.jpg">
                        				</a>
                        			</div>

                        			<div class="card-content">
                        				<div class="card-actions">
                        					<button type="button" class="btn btn-danger btn-simple fix-broken-card">
                        						<i class="material-icons">build</i> Fix Header!
                        					</button>

                        					<button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">
                        						<i class="material-icons">art_track</i>
                        					</button>
                        					<button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
                        						<i class="material-icons">edit</i>
                        					</button>
                        					<button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">
                        						<i class="material-icons">close</i>
                        					</button>
                        				</div>

                        				<h4 class="card-title">
                        					<a href="#pablo">Cozy 5 Stars Apartment</a>
                        				</h4>
                        				<div class="card-description">
                        					The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
                        				</div>
                        			</div>
                        			<div class="card-footer">
                        				<div class="price">
                        					<h4>$899/night</h4>
                        				</div>
                        				<div class="stats pull-right">
                        					<p class="category"><i class="material-icons">place</i> Barcelona, Spain</p>
                        				</div>
                        			</div>
                        		</div>
                        	</div> -->

<!--                         	<div class="col-md-4">
                        		<div class="card card-product">
                        			<div class="card-image" data-header-animation="true">
                        				<a href="#pablo">
                        					<img class="img" src="assets/img/card-3.jpg">
                        				</a>
                        			</div>

                        			<div class="card-content">
                        				<div class="card-actions">
                        					<button type="button" class="btn btn-danger btn-simple fix-broken-card">
                        						<i class="material-icons">build</i> Fix Header!
                        					</button>

                        					<button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">
                        						<i class="material-icons">art_track</i>
                        					</button>
                        					<button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
                        						<i class="material-icons">edit</i>
                        					</button>
                        					<button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">
                        						<i class="material-icons">close</i>
                        					</button>
                        				</div>

                        				<h4 class="card-title">
                        					<a href="#pablo">Office Studio</a>
                        				</h4>
                        				<div class="card-description">
                        					The place is close to Metro Station and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the night life in London, UK.
                        				</div>
                        			</div>
                        			<div class="card-footer">
                        				<div class="price">
                        					<h4>$1.119/night</h4>
                        				</div>
                        				<div class="stats pull-right">
                        					<p class="category"><i class="material-icons">place</i> London, UK</p>
                        				</div>
                        			</div>
                        		</div>
                        	</div> -->

<!--                         	<div class="col-md-4">
                        		<div class="card card-product">
                        			<div class="card-image" data-header-animation="true">
                        				<a href="#pablo">
                        					<img class="img" src="assets/img/card-1.jpg">
                        				</a>
                        			</div>

                        			<div class="card-content">
                        				<div class="card-actions">
                        					<button type="button" class="btn btn-danger btn-simple fix-broken-card">
                        						<i class="material-icons">build</i> Fix Header!
                        					</button>

                        					<button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">
                        						<i class="material-icons">art_track</i>
                        					</button>
                        					<button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
                        						<i class="material-icons">edit</i>
                        					</button>
                        					<button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">
                        						<i class="material-icons">close</i>
                        					</button>
                        				</div>

                        				<h4 class="card-title">
                        					<a href="#pablo">Beautiful Castle</a>
                        				</h4>
                        				<div class="card-description">
                        					The place is close to Metro Station and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Milan.
                        				</div>
                        			</div>
                        			<div class="card-footer">
                        				<div class="price">
                        					<h4>$459/night</h4>
                        				</div>
                        				<div class="stats pull-right">
                        					<p class="category"><i class="material-icons">place</i> Milan, Italy</p>
                        				</div>
                        			</div>
                        		</div>
                        	</div> -->
                              <!-- Column3D Chart Star  -->
  <form action="" method="post">    
    <div class="full_w" style="margin-top:20px;">
      <div class="h_title">Monthly User Column3D Chart</div>
        <!-- <h2>Monthly User Column3D Chart</h2> -->
        <div class="sep"></div>
        <?php
          $str="select distinct year(CreatedOn) as Year from tblUser order by CreatedOn ";
          //echo $str;exit;
          $rs=mysqli_query($con,$str) or die(mysqli_error($con));
        ?>

        <?php 
          $month=array();
          for($i=1;$i<=12;$i++)
          { 
            $query="SELECT count(*) as CNT FROM tblUser where month(CreatedOn)=".$i."";
            //echo "<br>".$query;
            $result=mysqli_query($con,$query) or die(mysqli_error($con));
            while($obj=mysqli_fetch_object($result))
            {
              $month[$i]=$obj->CNT;
            }
          }
        ?>

        <div id="" style="min-width: 350px; height: 350px; margin: 0 auto; padding:12px; ">
          <?php
            $strXML  = "<chart caption='User Statistics' xAxisName='Month' yAxisName='User' showValues='0' formatNumberScale='0' >";        
            for($i=1;$i<=12;$i++)
            {
              $strXML .= "<set label='".date("M",mktime(0,0,0,$i,1,2013))."' value='".$month[$i]."' />";        
            }     
            $strXML .= "</chart>";  
            echo renderChartHTML("FusionCharts/Column3D.swf", "", $strXML, "myNext", 600, 350, false);
          ?>
          <center><label><b><font ><?php if(isset ($val)) echo $val;?></font></b></label> </center>
        </div>
    </div>
  </form>
  <!-- Column3D Chart end -->

  <!-- Pie3D Chart Star  -->
  <form action="" method="post">    
    <div class="full_w" style="margin-top:20px;">
      <div class="h_title">Monthly Property Pie3D Chart</div>
        <!-- <h2>Monthly User Column3D Chart</h2> -->
        <div class="sep"></div>
        <?php
          $str="select distinct year(CreatedOn) as Year from tblproperty order by CreatedOn ";
          //echo $str;exit;
          $rs=mysqli_query($con,$str) or die(mysqli_error($con));
        ?>

        <?php 
          $month=array();
          for($i=1;$i<=12;$i++)
          { 
            $query="SELECT count(*) as CNT FROM tblproperty where month(CreatedOn)=".$i."";
            //echo "<br>".$query;
            $result=mysqli_query($con,$query) or die(mysqli_error($con));
            while($obj=mysqli_fetch_object($result))
            {
              $month[$i]=$obj->CNT;
            }
          }
        ?>

        <div id="" style="min-width: 350px; height: 350px; margin: 0 auto; padding:12px; ">
          <?php
            $strXML  = "<chart caption='Property Statistics' xAxisName='Month' yAxisName='Properties' showValues='0' formatNumberScale='0' >";        
            for($i=1;$i<=12;$i++)
            {
              $strXML .= "<set label='".date("M",mktime(0,0,0,$i,1,2013))."' value='".$month[$i]."' />";        
            }     
            $strXML .= "</chart>";  
            echo renderChartHTML("FusionCharts/Pie3D.swf", "", $strXML, "myNext", 600, 350, false);
          ?>
          <center><label><b><font ><?php if(isset ($val)) echo $val;?></font></b></label> </center>
        </div>
    </div>
  </form>
  <!-- Pie3D Chart end -->

  <!-- Doughnut3D Chart Star  -->
  <form action="" method="post">    
    <div class="full_w" style="margin-top:20px;">
      <div class="h_title">Monthly Agent Column3D Chart</div>
        <!-- <h2>Monthly User Column3D Chart</h2> -->
        <div class="sep"></div>
        <?php
          $str="select distinct year(CreatedOn) as Year, tblUser.UserType from tblUser where UserType='A' order by CreatedOn ";
          //echo $str;exit;
          $rs=mysqli_query($con,$str) or die(mysqli_error($con));
        ?>

        <?php 
          $month=array();
          for($i=1;$i<=12;$i++)
          { 
            $query="SELECT count(*) as CNT FROM tblUser where month(CreatedOn)=".$i."";
            //echo "<br>".$query;
            $result=mysqli_query($con,$query) or die(mysqli_error($con));
            while($obj=mysqli_fetch_object($result))
            {
              $month[$i]=$obj->CNT;
            }
          }
        ?>

        <div id="" style="min-width: 350px; height: 350px; margin: 0 auto; padding:12px; ">
          <?php
            $strXML  = "<chart caption='Agent Statistics' xAxisName='Month' yAxisName='Agent' showValues='0' formatNumberScale='0' >";        
            for($i=1;$i<=12;$i++)
            {
              $strXML .= "<set label='".date("M",mktime(0,0,0,$i,1,2013))."' value='".$month[$i]."' />";        
            }     
            $strXML .= "</chart>";  
            echo renderChartHTML("FusionCharts/Doughnut3D.swf", "", $strXML, "myNext", 600, 350, false);
          ?>
          <center><label><b><font ><?php if(isset ($val)) echo $val;?></font></b></label> </center>
        </div>
    </div>
  </form>
  <!-- Doughnut3D Chart end -->
                        </div>

					</div>
			</div>
			
            <?php include_once("Footer.php"); ?>
			
		</div>
	</div>
	<!-- fixed Plugin -->
    <!-- fixed plugin -->

</body>
  
 <?php include_once("LoadJS.php");?>

<!-- Mirrored from demos.creative-tim.com/bs3/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 15:15:15 GMT -->
</html>
