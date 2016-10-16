<?php include "../../../connection/connection.php"; ?>
<?php include "../../../session.php"; ?>
<?php
$key = $_GET['key'];
date_default_timezone_set('Singapore');
            $deldate = date('Y/m/d h:i:s a', time());
$get = mysql_query("SELECT * FROM `materials` WHERE `materialid`='$key'") or die(mysql_error());
$row = mysql_fetch_array($get);
$var = $row['materialname'];
$rep = $username." deleted ".ucfirst($row['materialname'])." from material records";
$sql = mysql_query("DELETE FROM `materials` WHERE `materialid`='$key'") or die(mysql_error());

?>
<script>
alert("<?php echo $var; ?>"+" is deleted from material records");
window.location.href = "../materials.php";
</script>
<?php
?>