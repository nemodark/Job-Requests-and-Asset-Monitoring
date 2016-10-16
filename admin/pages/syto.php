<?php
include "../../../connection/connection.php";

if ($_POST['syfromid']) {
	$s = $_POST['syfromid'];
$sytoid = $s + '1';

?>

<option><?php echo $sytoid; ?></option>
<?php 
}
?>