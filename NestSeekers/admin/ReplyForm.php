<?php include_once("Connection.php");
  
  if (isset($_REQUEST['btnsend'])) 
  {
    $ContactID = $_REQUEST['ContactID'];
   
    $Update="update tblcontactus set Answer='".$_REQUEST['txtmsg']."', IsReplied=1, RepliedOn=now() where ContactID =".$ContactID;
    mysqli_query($con,$Update) or die(mysqli_error($con));

    header("location:ManageContactUs.php");
  }

?>
<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <?php include_once("LoadFile1.php");?>

<style type="text/css">
    /*body { 
  font-family: Arial, sans-serif;
  background: url(http://www.shukatsu-note.com/wp-content/uploads/2014/12/computer-564136_1280.jpg) no-repeat;
  background-size: cover;
  height: 100vh;*/
}

h1 {
  text-align: center;
  font-family: Tahoma, Arial, sans-serif;
  color: #06D85F;
  margin: 80px 0;
}

/*.box {
  width: 40%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
}
*/
/*.button {
  font-size: 1em;
  padding: 10px;
  color: #fff;
  border: 2px solid #06D85F;
  border-radius: 20px/50px;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.3s ease-out;
}
.button:hover {
  background: #06D85F;
}*/

/*.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}*/

.box {
  margin-left: 300px;
  padding: 20px;
  background: white;
  border-radius: 5px;
  width: 50%;
  position: relative;
  transition: all 5s ease-in-out;
}

.box h3 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
/*.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}*/
/*.popup .close:hover {
  color: #06D85F;
}*/
.box .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}
</style>
    
</head>
<!-- PHP Code -->

<!-- <?php
    
    if(isset($_REQUEST['btnAddBedRoom']))
    {
        $insert_bedRoomQuery="insert into tblBedroom values(null,'".$_REQUEST['txtBedRoom']."',now(),0)";
        $Execute_bedRoom_Query=mysqli_query($con,$insert_bedRoomQuery) or die(mysqli_error($con));
        //echo $insert_bedRoomQuery;
?>
                <div class="alert alert-success" role="alert" style="margin-top: 0px;margin-left: 300px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Well done!</strong> You successfully Add new BedRoom.
                </div>
<?php
    }
?> -->
   
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

                          <form method="post" enctype="multipart/form-data">
                            <div class="box">
                                <h3>Message</h3>
                                <?php                  
                                  $ContactID = $_REQUEST['ContactID'];
                                  $select_ContactUs="select * from tblcontactus where ContactID = $ContactID";
                                  $Execute_select_ContactUS=mysqli_query($con,$select_ContactUs)or die(mysqli_error($con));
                                  $fetch_ContactUs=mysqli_fetch_array($Execute_select_ContactUS);
                                ?>
                                
                                <div class="content">
                                  <div style="background-color:#062659; padding: 10px; border-radius: 5px; color: white;">
                                    <?php echo $fetch_ContactUs['Message'];?>
                                  </div>
                                
                                 <br>
                                  <br>
                                  <h3>Reply</h3>
                                  <textarea style="height: 100px; width:540px; border-radius:5px;" name="txtmsg" placeholder="Write a Message"></textarea>
                                </div>
                                <center>
                                <button type="submit" name="btnsend" class="btn btn-md button-theme" style="background-color: #ff214f;">
                                  Reply
                                </button>
                                </center>
                            </div>
                          </form>

              </div>

					</div>
			</div>
			
            <?php include_once("Footer.php"); ?>
			
		</div>
	</div>

</body>
  
 <?php include_once("LoadJS.php");?>

<!-- Mirrored from demos.creative-tim.com/bs3/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 15:15:15 GMT -->
</html>
