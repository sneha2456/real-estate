   <?php include_once("Connection.php");?>
<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <?php include_once("LoadFile1.php");?>
    <script type="text/javascript">
        function validate()
        {
            var val = document.forms["myform"]["txtBathRoom"].value;
            var namepat=/^[0-9]+$/;
            if(val=="")    
            {
                /*alert("Please enter your name !");*/
                document.getElementById('bathroom').innerHTML="Please enter BathRoom value !";
                return false;
            }
            else if(!val.match(namepat))
            {
                document.getElementById('bathroom').innerHTML="Enter digits only !";
                /*alert("Enter alphabets only !");*/
                return false;
            }
            return true;
            /*var flag=0;*/
        }
    </script>
</head>
<!-- PHP Code -->

<?php
    /* Update Perform on IsActive OF Bathroom field Start*/
    if(isset($_REQUEST['UpdateBathRoomID']))
    {
        $up="update tblbathroom set IsActive='".$_REQUEST['Active']."' where BathRoomID='".$_REQUEST['UpdateBathRoomID']."'";
        mysqli_query($con,$up) or die(mysqli_error($con));
    }
/* Update Perform on IsActive OF Bathroom field End*/
    if(isset($_REQUEST['btnAddBathRoom']))
    {
        $insert_bathRoomQuery="insert into tblBathRoom values(null,'".$_REQUEST['txtBathRoom']."',now(),0)";
        $Execute_bathRoom_Query=mysqli_query($con,$insert_bathRoomQuery) or die(mysqli_error($con));
        //echo $insert_bathRoomQuery;
?>
                <div class="alert alert-success" role="alert" style="margin-top: 0px;margin-left: 300px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Well done!</strong> You successfully Add new BathRoom.
                </div>
<?php
    }
?>
   
<!-- PHP Code -->

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
					<div class="container-fluid">
					   <div class="col-md-12">

                           <!-- New BathRoom Management  -->  
                            <div class="card">
                                        <form method="post" name="myform" class="form-horizontal">
                                            <div class="card-header card-header-text" data-background-color="rose">
                                                <h4 class="card-title">BathRoom Manage</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <label class="col-sm-2 label-on-left">BathRoom</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-group label-floating is-empty">
                                                                <label class="control-label"></label>
                                                                <input type="text" name="txtBathRoom" class="form-control" placeholder="Enter BathRoom">
                                                                <span id="bathroom" class="text-danger" style="font-size:15px;"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="submit" name="btnAddBathRoom" onclick=" return validate();" class="btn btn-fill btn-rose" >Add</button>
                                                    </div>
                                                </div>                                          
                                            </div>
                                        </form>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-icon" data-background-color="rose">
                                        <i class="material-icons">assignment</i>
                                    </div>

                                    <div class="card-content">
                                        <h4 class="card-title">BathRoom List</h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>BathRoom</th>
                                                        <th>Date</th>
                                                        <th>Active</th>
                                                        <!-- <th class="text-right">Salary</th> -->
                                                        <th class="text-right">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                            <!-- PHP CODE SELECT BathRoom -->
                                <?php 
                                    $select_BathRoom="select * from tblBathRoom";
                                    $Execute_select_BathRoom=mysqli_query($con,$select_BathRoom)or die(mysqli_error($con));
                                    while($fetch_BathRoom=mysqli_fetch_array($Execute_select_BathRoom))
                                    {
                                ?>
                            <!-- PHP CODE SELECT BathRoom -->

                                                    <tr>
                                                        <td class="text-center"><?php echo $fetch_BathRoom['BathRoomID'];?></td>
                                                        <td><?php echo $fetch_BathRoom['BathRoomValue'];?></td>
                                                        <td><?php echo $fetch_BathRoom['CreatedOn'];?></td>
                                                        <td>
                                                            <?php if($fetch_BathRoom['IsActive']==0)
                                                              {
                                                            ?>
                                                                <a href="?UpdateBathRoomID=<?php echo $fetch_BathRoom['BathRoomID']; ?>&Active=1" class="btn btn-simple btn-danger btn-icon "><i class="material-icons" style="font-size: 25px;">close</i></a>                                      
                                                            <?php
                                                                } 
                                                                else
                                                                {
                                                            ?>
                                                                <a href="?UpdateBathRoomID=<?php echo $fetch_BathRoom['BathRoomID']; ?>&Active=0" class="btn btn-simple btn-danger btn-icon "><i class="material-icons" style="color: green;font-size: 25px;">done</i></a>
                                                            <?php
                                                                }
                                                            ?>
                                                        </td>
                                                        <!-- <td class="text-right">&euro; 99,225</td> -->
                                                         <td class="td-actions text-right">
                                                            <button type="button" rel="tooltip" class="btn btn-info btn-simple">
                                                                <i class="material-icons">person</i>
                                                            </button>
                                                            <button type="button" rel="tooltip" class="btn btn-success btn-simple">
                                                                <i class="material-icons">edit</i>
                                                            </button>
                                                            <button type="button" rel="tooltip" class="btn btn-danger btn-simple">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                        </td>
                                                    </tr>
                             <!-- PHP CODE SELECT BathRoom -->
                                <?php
                                    }
                                ?>
                              <!-- PHP CODE SELECT BathRoom -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> 


                            <!-- New BathRoom Management  --> 


                            




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
