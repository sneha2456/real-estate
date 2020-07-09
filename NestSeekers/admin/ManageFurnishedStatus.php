   <?php include_once("Connection.php");?>
<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <?php include_once("LoadFile1.php");?>
    <script type="text/javascript">
        function validate()
        {
            var val = document.forms["myform"]["txtFS"].value;
            var namepat=/^[A-Za-z]+$/;
            if(val=="")    
            {
                /*alert("Please enter your name !");*/
                document.getElementById('fstatus').innerHTML="Please enter FurnishedStatus value !";
                return false;
            }
            else if(!val.match(namepat))
            {
                document.getElementById('fstatus').innerHTML="Enter alphabets only !";
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
    /* Update Perform on IsActive OF FurnishedStatus field Start*/
    if(isset($_REQUEST['UpdateFurnishedStatusID']))
    {
        $up="update tblfurnishedstatus set IsActive='".$_REQUEST['Active']."' where FurnishedStatusID='".$_REQUEST['UpdateFurnishedStatusID']."'";
        mysqli_query($con,$up) or die(mysqli_error($con));
    }
/* Update Perform on IsActive OF FurnishedStatus field End*/
    if(isset($_REQUEST['btnAddFS']))
    {
        $insert_FS_Query="insert into tblFurnishedStatus values(null,'".$_REQUEST['txtFS']."',now(),0)";
        $Execute_FS_Query=mysqli_query($con,$insert_FS_Query) or die(mysqli_error($con));
        //echo $insert_FS_Query;
?>
                <div class="alert alert-success" role="alert" style="margin-top: 0px;margin-left: 300px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Well done!</strong> You successfully Add new FurnishedStatus.
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

                           <!-- New FS Management  -->  
                            <div class="card">
                                        <form method="post" name="myform" class="form-horizontal">
                                            <div class="card-header card-header-text" data-background-color="rose">
                                                <h4 class="card-title">FurnishedStatus Manage</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <label class="col-sm-2 label-on-left">FurnishedStatus</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-group label-floating is-empty">
                                                                <label class="control-label"></label>
                                                                <input type="text" name="txtFS" class="form-control" placeholder="Enter FurnishedStatus">
                                                                <span id="fstatus" class="text-danger" style="font-size:15px;"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="submit" name="btnAddFS" onclick=" return validate();" class="btn btn-fill btn-rose" >Add</button>
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
                                        <h4 class="card-title">FurnishedStatus List</h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>FurnishedStatus</th>
                                                        <th>Date</th>
                                                        <th>Active</th>
                                                        <!-- <th class="text-right">Salary</th> -->
                                                        <th class="text-right">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                            <!-- PHP CODE SELECT FS -->
                                <?php 
                                    $select_FS="select * from tblFurnishedStatus";
                                    $Execute_select_FS=mysqli_query($con,$select_FS)or die(mysqli_error($con));
                                    while($fetch_FS=mysqli_fetch_array($Execute_select_FS))
                                    {
                                ?>
                            <!-- PHP CODE SELECT FS -->

                                                    <tr>
                                                        <td class="text-center"><?php echo $fetch_FS['FurnishedStatusID'];?></td>
                                                        <td><?php echo $fetch_FS['FurnishedStatusType'];?></td>
                                                        <td><?php echo $fetch_FS['CreatedOn'];?></td>
                                                        <td>
                                                            <?php if($fetch_FS['IsActive']==0)
                                                              {
                                                            ?>
                                                                <a href="?UpdateFurnishedStatusID=<?php echo $fetch_FS['FurnishedStatusID']; ?>&Active=1" class="btn btn-simple btn-danger btn-icon "><i class="material-icons" style="font-size: 25px;">close</i></a>                                      
                                                            <?php
                                                                } 
                                                                else
                                                                {
                                                            ?>
                                                                <a href="?UpdateFurnishedStatusID=<?php echo $fetch_FS['FurnishedStatusID']; ?>&Active=0" class="btn btn-simple btn-danger btn-icon "><i class="material-icons" style="color: green;font-size: 25px;">done</i></a>
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
                             <!-- PHP CODE SELECT FS -->
                                <?php
                                    }
                                ?>
                              <!-- PHP CODE SELECT FS -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> 


                            <!-- New FS Management  --> 


                            




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
