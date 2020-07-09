
 
<?php
include_once("admin/Connection.php");


$State=$_REQUEST['StID'];
if($State!=" ")
{

$query="select * from tblcity WHERE StateID='".$State."'";
$result=mysqli_query($con,$query) or die(mysqli_error($con));


?>
	<label>City</label>

<select class="form-control" name="CmbCity" >
    <option value="">Choose City</option>
    <?php 
		while($row=mysqli_fetch_array($result))
 		{ 
 	?>
            <option value="<?php echo $row['CityID']; ?>"><?php echo $row['CityName']; ?></option>
    <?php 
		}
 	?>
</select>
<?php
	}
?>