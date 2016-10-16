<?php 
	include "../../connection/connection.php";
	$action = $_POST['action'];
	switch ($action) {
		case 'getContent':
		$reqid = $_POST['requestid'];
			$query = mysql_query("SELECT * FROM jobrequest where requestid='$reqid' ");
			while($row = mysql_fetch_assoc($query)){
				 echo $row['reqdate'];
			}
			break;
		
		default:
			# code...
			break;
	}
?>