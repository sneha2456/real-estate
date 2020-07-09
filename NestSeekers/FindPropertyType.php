
 
<?php
include_once("admin/Connection.php");


$PTID=$_REQUEST['PtID'];
if($PTID!=" ")
{

$query="SELECT * from tblPropertyType WHERE IsActive=1 AND CategoryID=".$PTID;
$result=mysqli_query($con,$query) or die(mysqli_error($con));


?>
<label>Property Type</label>
<select class="form-control" name="cmbPropertyType" >
    
    <option value="">Choose PropertyType</option>
    <?php 
        while($row=mysqli_fetch_array($result))
        { 
    ?>
            <option value="<?php echo $row['PropertyTypeID']; ?>"><?php echo $row['PropertyName']; ?></option>
    <?php 
        }
    ?>
</select>
<?php
    }
?>





                                            