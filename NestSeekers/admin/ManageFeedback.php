<?php include_once("Connection.php");?>
<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <?php include_once("LoadFile1.php");?>
</head>
<?php
	if(isset($_REQUEST['Active']))
    {
        $up="update tblfeedback set IsActive='".$_REQUEST['Active']."' where FeedBackID='".$_REQUEST['FeedBackID']."'";
        mysqli_query($con,$up);
    }
?>
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
          <div class="container-fluid"><a href="">FeedBack List /</a><hr>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">assignment</i>
                  </div>

                  <div class="card-content">
                    <h4 class="card-title">FeedBack List</h4>
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                      <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Rating </th>
                                    <th>Topic</th>
                                    <th>Description</th>
                                    <th>CreatedOn</th>
                                    <th>IsActive</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Rating </th>
                                    <th>Topic</th>
                                    <th>Description</th>
                                    <th>CreatedOn</th>
                                    <th>IsActive</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>                                
                                  <!-- PHP CODE SELECT ContactUs details -->
                                  <?php 
                                          $select_Feedback="select * from tblfeedback ";
                                          $Execute_select_Feedback=mysqli_query($con,$select_Feedback)or die(mysqli_error($con));
                                          while($fetch_Feedback=mysqli_fetch_array($Execute_select_Feedback))
                                          {
                                  ?>
                                  <!-- PHP CODE SELECT ContactUs details -->
                                <tr>
                                    <td><?php echo $fetch_Feedback['FeedBackID'];?></td>
                                    <td><?php echo $fetch_Feedback['Name'];?></td>
                                    <td><?php echo $fetch_Feedback['Rating'];?></td>
                                    <td><?php echo $fetch_Feedback['Topic'];?></td>
                                    <td><?php echo $fetch_Feedback['Description'];?></td>                                
                                    <td><?php echo $fetch_Feedback['CreatedOn'];?></td>
                                    <td>
                                        <?php
                                          if($fetch_Feedback['IsActive']==1)
                                          {
                                          	?>
                                            <a href="?FeedBackID=<?php echo $fetch_Feedback['FeedBackID']; ?>&Active=0" class="btn btn-simple btn-danger btn-icon "><i class="material-icons" style="color: green;
                                           	font-size: 25px;">done</i></a>
                                            <?php
                                          }
                                          else
                                          {
                                        	?>
                                        	<a href="?FeedBackID=<?php echo $fetch_Feedback['FeedBackID']; ?>&Active=1" class="btn btn-simple btn-danger btn-icon "><i class="material-icons" style="font-size: 25px;">close</i></a>
                                        	<?php
                                          }
                                        ?>
                                    </td>
                                    <td class="text-right">
                                        <a href="#" class="btn btn-simple btn-info btn-icon like"><i class="material-icons">favorite</i></a>
                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i></a>
                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
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
