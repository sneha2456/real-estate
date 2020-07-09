<?php include_once("Connection.php");?>
<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <?php include_once("LoadFile1.php");?>
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
          <div class="container-fluid"><a href="">Contact List /</a><hr>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">assignment</i>
                  </div>

                  <div class="card-content">
                    <h4 class="card-title">Contact List</h4>
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                      <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date </th>
                                    <th>Message</th>
                                    <th>Reply</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date </th>
                                    <th>Message</th>
                                    <th>Reply</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>                                
                                  <!-- PHP CODE SELECT ContactUs details -->
                                  <?php 
                                          $select_ContactUs="select * from tblcontactus ";
                                          $Execute_select_ContactUS=mysqli_query($con,$select_ContactUs)or die(mysqli_error($con));
                                          while($fetch_ContactUs=mysqli_fetch_array($Execute_select_ContactUS))
                                          {
                                  ?>
                                  <!-- PHP CODE SELECT ContactUs details -->
                                <tr>
                                    <td><?php echo $fetch_ContactUs['Name'];?></td>
                                    <td><?php echo $fetch_ContactUs['Email'];?></td>
                                    <td><?php echo $fetch_ContactUs['Date'];?></td>
                                    <td><?php echo $fetch_ContactUs['Message'];?></td>
                                    <td><?php echo $fetch_ContactUs['Answer'];?></td>                                
                                    <td class="text-right">
                                        <?php
                                          if($fetch_ContactUs['IsReplied']==1)
                                          {
                                            echo "<i class='fa fa-check' ></i>";
                                          }else
                                          {
                                        ?>
                                        <a href="ReplyForm.php?ContactID=<?php echo $fetch_ContactUs['ContactID']; ?>"><i class="fa fa-mail-reply " ></i></a>
                                        <?php
                                          }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>                               
                            </tbody>
                      </table>
                    </div>
                  </div><!-- end content-->
                </div><!--  end card  -->
              </div> <!-- end col-md-12 -->
            </div> <!-- end row -->

          </div>
        </div>
			
        <?php include_once("Footer.php"); ?>
			
		  </div>
	</div>
	
</body>
  
 <?php include_once("LoadJS.php");?>

<!-- Mirrored from demos.creative-tim.com/bs3/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 15:15:15 GMT -->
</html>
