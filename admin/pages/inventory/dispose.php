<?php
include "../../../connection/connection.php";
$qry = 'SELECT * FROM `assetdisposaltype` WHERE disposaltypeid='.$_POST['disposaltypeid'];
$sql = mysql_query($qry) or die($myQuery."<br/><br/>".mysql_error());
while($row = mysql_fetch_array($sql)){
extract($row);
		?>
		<label><?php echo $disposaltypedescription ?></label>
		<input type="text" class="form-control" name="disposaltypedesc">
		<?php 
	}
		?>