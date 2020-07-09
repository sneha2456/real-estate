<?php include_once("Connection.php");?>
<!-- PHP Code -->
<?php
	//echo $flag;
    /* Update Perform on IsActive OF Category field Start*/
    if(isset($_REQUEST['UpdateCategoryID']))
    {
        $up="update tblCategory set IsActive='".$_REQUEST['Active']."' where CategoryID='".$_REQUEST['UpdateCategoryID']."'";
        mysqli_query($con,$up) or die(mysqli_error($con));
    }
/* Update Perform on IsActive OF Category field End*/
/* Update Perform on IsActive OF Category field Start*/
    if(isset($_REQUEST['UpdatePropertyTypeID']))
    {
        $up="update tblpropertytype set IsActive='".$_REQUEST['Active']."' where PropertyTypeID='".$_REQUEST['UpdatePropertyTypeID']."'";
        mysqli_query($con,$up) or die(mysqli_error($con));
    }
/* Update Perform on IsActive OF Category field End*/
    
    if(isset($_REQUEST['btnAddCategory']))
    {
        /*$name=$_REQUEST['txtCategoryName'];
        if($name!="")
        {*/
        $insert_Query="insert into tblCategory values(null,'".$_REQUEST['txtCategoryName']."',now(),0)";
        $Execute_insert_Query=mysqli_query($con,$insert_Query) or die(mysqli_error($con));
       // echo $insert_Query;
        ?>  
                <div class="alert alert-success" role="alert" style="margin-top: 0px;margin-left: 300px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Well done!</strong> You successfully Add new Category.
                </div>
        <?php
        /*}
        else
        {
            echo ' <script>alert("Error !")</script>';
        }*/
    }
/*else
{
    $flag=0;
}*/
    if(isset($_REQUEST['btnAddSub-Category']))
    {
        $insert_Query="insert into tblpropertytype values(null,'".$_REQUEST['selectCategory']."','".$_REQUEST['txtSub-CategoryName']."',now(),0)";
        $Execute_insert_Query=mysqli_query($con,$insert_Query) or die(mysqli_error($con));
        //echo "____________________________________________________".$insert_Query;
?>
    <div class="alert alert-success" role="alert" style="margin-top: 0px;margin-left: 300px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Well done!</strong> You successfully Add new Sub-Category.
                </div>
<?php
    }
?>
<!-- PHP Code -->

<!doctype html>
<html lang="en">
<!-- Mirrored from demos.creative-tim.com/bs3/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 15:14:39 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <?php include_once("LoadFile1.php");?>
    <script type="text/javascript">
    	function validatecat()
		{
			var name = document.forms["myform"]["txtCategoryName"].value;
			var namepat=/^[A-Za-z]+$/;
			if(name=="")	
			{
				/*alert("Please enter your name !");*/
				document.getElementById('catname').innerHTML="Please enter Category name !";
				return false;
			}
			else if(!name.match(namepat))
			{
				document.getElementById('catname').innerHTML="Enter alphabets only !";
				/*alert("Enter alphabets only !");*/
				return false;
			}
			return true;
			/*var flag=0;*/
		}
		function validatesubcat()
		{
			var subcatname = document.forms["myformsubcat"]["txtSub-CategoryName"].value;
			var namepat=/^[A-Za-z]+$/;
			if(subcatname=="")
			{
				document.getElementById('subcat').innerHTML="Please enter Sub-Category name !";
				return false;
			}
			else if(!subcatname.match(namepat))
			{
				document.getElementById('subcat').innerHTML="Enter alphabets only !";
				/*alert("Enter alphabets only !");*/
				return false;
			}
			return true;
		}
    </script>
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
					<div class="container-fluid">
					   <div class="col-md-12">

                           <!-- New Category Management  -->  
                            <div class="card">
                                        <form method="post" name="myform" class="form-horizontal">
                                            <div class="card-header card-header-text" data-background-color="rose">
                                                <h4 class="card-title">Add New Category</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <label class="col-sm-2 label-on-left">Category Name</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-group label-floating is-empty">
                                                                <label class="control-label"></label>
                                                                <input type="text" name="txtCategoryName" class="form-control" placeholder="Enter Category">
                                                                <span id="catname" class="text-danger" style="font-size:15px;"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="submit" name="btnAddCategory" onclick=" return validatecat();" class="btn btn-fill btn-rose">Add</button>
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
                                        <h4 class="card-title">Category List</h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>Category</th>
                                                        <th>Date</th>
                                                        <th>Active</th>
                                                        <!-- <th class="text-right">Salary</th> -->
                                                        <th class="text-right">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                            <!-- PHP CODE SELECT Category -->
                                <?php 
                                    $select_Category="select * from tblCategory";
                                    $Execute_select_Category=mysqli_query($con,$select_Category)or die(mysqli_error($con));
                                    while($fetch_category=mysqli_fetch_array($Execute_select_Category))
                                    {
                                ?>
                            <!-- PHP CODE SELECT Category -->

                                        <tr>
                                            <td class="text-center"><?php echo $fetch_category['CategoryID'];?></td>
                                            <td><?php echo $fetch_category['CategoryName'];?></td>
                                            <td>
                                                 <?php 
                                                    $date_Project=date('M d, Y',strtotime($fetch_category['CreatedOn']));
                                                        echo $date_Project;
                                                ?>  
                                               </td>
                                            <td>
                                                 <?php if($fetch_category['IsActive']==0)
                                                  {
                                                ?>
                                                    <a href="?UpdateCategoryID=<?php echo $fetch_category['CategoryID']; ?>&Active=1" class="btn btn-simple btn-danger btn-icon "><i class="material-icons" style="font-size: 25px;">close</i></a>                                      
                                                <?php
                                                    } 
                                                    else
                                                    {
                                                ?>
                                                    <a href="?UpdateCategoryID=<?php echo $fetch_category['CategoryID']; ?>&Active=0" class="btn btn-simple btn-danger btn-icon "><i class="material-icons" style="color: green;font-size: 25px;">done</i></a>
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
                                        </tr>_
                             <!-- PHP CODE SELECT Category -->
                                <?php
                                    }
                                ?>
                              <!-- PHP CODE SELECT Category -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> 


                            <!-- New Category Management  --> 


                            <!-- Sub Category Management (Property Type) -->  

                            

                                    <div class="card">
                                        <form method="post" name="myformsubcat" class="form-horizontal">
                                            
                                            <div class="card-header card-header-text" data-background-color="rose">
                                                <h4 class="card-title">Add New Property Type (Sub-Category)</h4>
                                            </div>

                                            <div class="card-content">
                                                <div class="row">
                                                 
                                                        <label class="col-sm-2 label-on-left">Sub-Category Name</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-group label-floating is-empty">
                                                                <label class="control-label"></label>
                                                                <input type="text" name="txtSub-CategoryName" class="form-control" placeholder="Enter Sub-Category">
                                                                <span id="subcat" class="text-danger" style="font-size:15px;"></span>
                                                            </div>
                                                        </div>
                                                    
                                                </div>                                          
                                            </div>
                                             <!-- Dropdown -->

                                            <div class="col-md-12" style="padding-bottom: 0px;margin-left: 40px;">
                                               <!--  <legend>Add Property Type(Sub Category)</legend> -->
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-6 col-sm-3">
                                                        <select class="selectpicker" data-style="btn btn-primary btn-round" title="Single Select" data-size="7" name="selectCategory">
                                                            <option disabled selected>Choose Category</option>
                                                            <!-- php for loop -->
                                                            <?php
                                                                 $select_Category2="select * from tblCategory";
                                                                $Execute_select_Category2=mysqli_query($con,$select_Category)or die(mysqli_error($con));
                                                                while($fetch_category2=mysqli_fetch_array($Execute_select_Category2))
                                                                {
                                                            ?>
                                                            <!-- php for loop -->
                                                            <option value="<?php echo $fetch_category2['CategoryID'];?>" ><?php echo $fetch_category2['CategoryName'];?></option>
                                                            <!-- php for loop -->
                                                            <?php
                                                                }
                                                            ?>
                                                            <!-- php for loop -->
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><br><br><br>
                                            <button type="submit" name="btnAddSub-Category" onclick=" return validatesubcat();" class="btn btn-fill btn-rose" style="margin-left: 80px;">Add</button>
                                            <!-- Dropdown -->
                                        </form>
                                    </div>
                            
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-icon" data-background-color="rose">
                                        <i class="material-icons">assignment</i>
                                    </div>

                                    <div class="card-content">
                                        <h4 class="card-title">Property Type(Sub-Category) List</h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>Sub-Category</th>
                                                        <th>Date</th>
                                                        <th>Active</th>
                                                        <th class="text-right">Type</th>
                                                        <th class="text-right">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                            <!-- PHP CODE SELECT Category -->
                                <?php 
                                    $select_propertyType="select * from tblpropertytype";
                                    $Execute_select_propertyType=mysqli_query($con,$select_propertyType)or die(mysqli_error($con));
                                    while($fetch_PropertyType=mysqli_fetch_array($Execute_select_propertyType))
                                    {
                                ?>
                            <!-- PHP CODE SELECT Category -->

                                                    <tr>
                                                        <td class="text-center"><?php echo $fetch_PropertyType['PropertyTypeID'];?></td>
                                                        <td><?php echo $fetch_PropertyType['PropertyName'];?></td>
                                                        <td>
                                                             <?php 
                                                                $date_Project=date('M d, Y',strtotime($fetch_PropertyType['CreatedOn']));
                                                                    echo $date_Project;
                                                            ?>  
                                                        </td>
                                                        <td>
                                                             <?php if($fetch_PropertyType['IsActive']==0)
                                                              {
                                                            ?>
                                                                <a href="?UpdatePropertyTypeID=<?php echo $fetch_PropertyType['PropertyTypeID']; ?>&Active=1" class="btn btn-simple btn-danger btn-icon "><i class="material-icons" style="font-size: 25px;">close</i></a>                                      
                                                            <?php
                                                                } 
                                                                else
                                                                {
                                                            ?>
                                                                <a href="?UpdatePropertyTypeID=<?php echo $fetch_PropertyType['PropertyTypeID']; ?>&Active=0" class="btn btn-simple btn-danger btn-icon "><i class="material-icons" style="color: green;font-size: 25px;">done</i></a>
                                                            <?php
                                                                }
                                                            ?>      
                                                        </td>
                                                        <td class="text-right">
                                                            <?php 
                                                                $select_Category_type="select * from tblCategory where CategoryID='".$fetch_PropertyType['CategoryID']."'";
                                                                $Execute_select_Category_type=mysqli_query($con,$select_Category_type) or die(mysqli_error($con));
                                                                $Fetch_Category_type=mysqli_fetch_array($Execute_select_Category_type);
                                                                echo $Fetch_Category_type['CategoryName'];

                                                            ?>





                                                        </td>
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
                             <!-- PHP CODE SELECT Category -->
                                <?php
                                    }
                                ?>
                              <!-- PHP CODE SELECT Category -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> 




                            <!-- Sub Category Management (Property Type) -->  




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