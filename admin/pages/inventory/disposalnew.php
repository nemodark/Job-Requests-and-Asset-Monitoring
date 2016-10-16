<?php
include "../../../connection/connection.php";
$newqry = 'SELECT * FROM `dispositiontype` WHERE dispositiontypeid='.$_POST['dispositionvalueid'];
$newsql = mysql_query($newqry) or die($myQuery."<br/><br/>".mysql_error());
while($newrow = mysql_fetch_array($newsql)){
?>
<label><?php echo $newrow['dispositionvalue']; ?></label>
<input class="form-control" name="dispositionvaluenow" id="dispositionvaluenow" readonly>
<?php
	}
?>