    <?php
    	include "../../../connection/connection.php";
      $key = $_GET['jobid'];
        date_default_timezone_set('Singapore');
        $date = date('m/d/Y h:i:s');
        error_reporting(0);
        extract($_POST);
        $get = mysql_query("SELECT * FROM `jobrequest` WHERE `jobid`='$key'") or die(mysql_error());
        $getit = mysql_fetch_array($get);
 if(isset($approve)){

        $sqltype = mysql_query("UPDATE `jobrequest` SET `reqstatus` = 'approved' WHERE `jobid`='$key'") or die(mysql_error());
        if($sqltype)
          {
          ?>
<script>
alert("Success!");
window.location.href = "jobview.php?jobid=<?php echo $key; ?>";
</script>
          <?php
          }
      }
  ?>


  <?php
$key=$_GET['jobid'];
  if(isset($push)){
        $ct=0;
        $sql = mysql_query("UPDATE `jobrequest` SET `reqstatus` = 'personnel' WHERE `jobid`='$key'") or die(mysql_error());

    foreach( $_POST['checkname'] as $k=> $value ){ // loop through array
        $checkname = addslashes( $value );  // set name based on value
        $update = mysql_query("UPDATE `personnel` SET `personnelstatus` = 'working' WHERE `userid`='$checkname'") or die(mysql_error());
        $insert = mysql_query("INSERT INTO `jobassign`(`jobid`, `userid`, `assigndate`) VALUES ('".$key."', '".$checkname."', '".$date."')");
        $ct++;
}
if($insert){
?>
           <script>
alert("Success!");
window.location.href = "jobview.php?jobid=<?php echo $key; ?>";
</script>
<?php
}
}
if(isset($order)){
        $authorize = mysql_query("UPDATE `materials` SET `materialstatus` = 'ordered' WHERE `jobid`='$key'") or die(mysql_error());
        $authorizenew = mysql_query("UPDATE `jobrequest` SET `reqstatus` = 'materialsordered' WHERE `jobid`='$key'") or die(mysql_error());
        if ($authorizenew)
        {

          ?>
       <script>
alert("Success!");
window.location.href = "jobview.php?jobid=<?php echo $key; ?>";
</script>   
          <?php
        }
        else{
        echo "error";
      }
     }

     if(isset($delivered)){
      $delivered = mysql_query("UPDATE `materials` SET `materialstatus` = 'delivered' WHERE `jobid`='$key'") or die(mysql_error());
        $deliverednow = mysql_query("UPDATE `jobrequest` SET `reqstatus` = 'materialsdelivered' WHERE `jobid`='$key'") or die(mysql_error());
        if ($deliverednow)
        {
       ?>
       <script>
alert("Success!");
window.location.href = "jobview.php?jobid=<?php echo $key; ?>";
</script> 
<?php
        }
        else{
        echo "error";
      }
     }
      if(isset($submitrcv)){
      $receivereport = mysql_query("UPDATE `materials` SET `materialstatus` = 'forbudgetcharge' WHERE `jobid`='$key'") or die(mysql_error());
        $rrNEW = mysql_query("UPDATE `jobrequest` SET `reqstatus` = 'forbudgetcharge' WHERE `jobid`='$key'") or die(mysql_error());
        $reportnews = mysql_query("INSERT INTO `receivingreport`(`userid`, `jobid`, `rcvfrom`, `refnumber`, `fromaddress`, `fromphone`, `fromemail`, `rcvdate`) VALUES ('$userid', '$key', '$rrcompany', '$rrnumber', '$rraddress','$contact','$rremail','$date')");
        if($reportnews)
        {
       ?>
       <script>
alert("Success!");
window.location.href = "jobview.php?jobid=<?php echo $key; ?>";
</script> 
<?php
        }
        else{
        echo "error";
      }
     }
     ?>

