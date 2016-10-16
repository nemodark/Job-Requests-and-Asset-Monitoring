<?php
	$con = mysqli_connect("localhost","root","","gso");
	
	if(isset($_GET['edit'])){
		$column = $_POST['column'];
		$id = $_POST['id'];
		$newValue = $_POST['newValue'];
		
		$query = mysqli_query($con, "UPDATE products SET `$column` = '$newValue' WHERE id = '$id'");
	
	}
?>