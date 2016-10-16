<?php
include "../../../connection/connection.php";
$qry = 'SELECT * FROM `invlocation` WHERE schoolbldgid='.$_POST['id'];
print_r($qry);
$sql = mysql_query($qry);
while($rowloc = mysql_fetch_array($sql)){
?>
	<option value="<?php echo $rowloc['locationid']; ?>"><?php echo $rowloc['locationname']; ?></option>
<?php } 

?>