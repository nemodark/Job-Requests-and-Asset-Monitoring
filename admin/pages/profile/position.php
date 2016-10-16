<?php
include "../../../connection/connection.php";
$qry = 'SELECT * FROM `positions` WHERE officeid='.$_POST['id'];
print_r($qry);
$sql = mysql_query($qry);
while($row = mysql_fetch_array($sql)){
?>
	<option value="<?php echo $row['positionid']; ?>"><?php echo $row['position']; ?></option>
<?php } 

if ($_POST['syfromid']) {
	$s = $_POST['syfromid'];
$sytoid = $s + '1';

?>

<option><?php echo $sytoid; ?></option>
<?php 
}
?>