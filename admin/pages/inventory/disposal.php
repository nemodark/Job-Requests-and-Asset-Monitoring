<?php
include "../../../connection/connection.php";
$qry = 'SELECT * FROM `dispositiontype` WHERE dispositiontypeid='.$_POST['dispositionid'];
$sql = mysql_query($qry) or die($myQuery."<br/><br/>".mysql_error());
while($row = mysql_fetch_array($sql)){

	if ($_POST['dispositionid'] == '3') {
		?>
	<input class="form-control" name="dispositiondetailsnow" id="dispositiondetailsnow" value="<?php echo $row['dispositiondetails']; ?>" readonly>
		<?php
	}

			elseif ($_POST['dispositionid'] == '4') {
		?>
	<input class="form-control" name="dispositiondetailsnow" id="dispositiondetailsnow" value="<?php echo $row['dispositiondetails']; ?>" readonly>
		<?php
	}
		else{
?>
	<label><?php echo $row['dispositiondetails']; ?></label>
    <input class="form-control" name="dispositiondetailsnow" id="dispositiondetailsnow" placeholder="<?php echo $row['dispositiondetails']; ?>">
<?php } 
}

?>