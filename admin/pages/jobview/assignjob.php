    <?php
    	include "../../../connection/connection.php";
      $key = $_GET['jobid'];
        date_default_timezone_set('Singapore');
        $date = date('m/d/Y h:i:s');
        error_reporting(0);
        extract($_POST);
        $get = mysql_query("SELECT * FROM `jobrequest` WHERE `jobid`='$key'") or die(mysql_error());
        $getit = mysql_fetch_array($get);
        if($push){
         $sql = mysql_query("UPDATE `jobrequest` SET `reqstatus` = 'personnel' WHERE `jobid`='$key'") or die(mysql_error());
         $result = mysql_query("INSERT INTO `jobassign`(`jobid`, `userid`, `assigndate`) VALUES('$jobid','$personnel','$date')") or die("Verification Error: ".mysql_error());     
          if($result)
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
      if($subjob){

        $sqltype = mysql_query("UPDATE `jobrequest` SET `jobtype` = '$jobtype', `reqstatus` = 'work' WHERE `jobid`='$key'") or die(mysql_error());
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
      if($submat){
        $qwe = mysql_query("UPDATE `jobrequest` SET `reqstatus` = 'materials' WHERE `jobid`='$key'") or die(mysql_error());
        $matsql = mysql_query("INSERT INTO `materials`(`userid`, `jobid`, `materialname`, `materialdesc`, `materialqty`, `qtyunit`, `materialreqdate`, `dateneeded`, `materialcost`, `materialstatus`,`subtotal`) VALUES ('$maintrequest','$key','$itemname','$itemdesc','$itemqty','$unit','$date','$dateneed','0.00','request','0.00') ") or die("Verification Error: ".mysql_error());
        if ($matsql)
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
     if($auth){
        $authorize = mysql_query("UPDATE `materials` SET `materialstatus` = 'authorize' WHERE `jobid`='$key'") or die(mysql_error());
        $authorizenew = mysql_query("UPDATE `jobrequest` SET `reqstatus` = 'purchase' WHERE `jobid`='$key'") or die(mysql_error());
        $authorizednow = mysql_query("INSERT INTO `matauth`(`userid`, `jobid`, `authorizedate`) VALUES ('$logid','$key','$date')");
        if ($authorizednow)
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
          if($heavyauth){
        $heavyauthorize = mysql_query("UPDATE `materials` SET `materialstatus` = 'authorize' WHERE `jobid`='$key'") or die(mysql_error());
        $heavyauthorizenew = mysql_query("UPDATE `jobrequest` SET `reqstatus` = 'purchase' WHERE `jobid`='$key'") or die(mysql_error());
        $heavyauthorizednow = mysql_query("INSERT INTO `matauth`(`userid`, `jobid`, `authorizedate`) VALUES ('$logid','$key','$date')");
        if ($heavyauthorizednow)
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
       <?php
       if($approve){
        $approve = mysql_query("UPDATE `materials` SET `materialstatus` = 'approve' WHERE `jobid`='$key'") or die(mysql_error());
        $approvenow = mysql_query("INSERT INTO `matapprove`(`userid`, `jobid`, `approvaldate`) VALUES ('$logid','$key','$date')");
        if ($approvenow)
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
            if($heavyapprove){
        $heavyapprove = mysql_query("UPDATE `materials` SET `materialstatus` = 'approve' WHERE `jobid`='$key'") or die(mysql_error());
        $heavyapprovenow = mysql_query("INSERT INTO `matapprove`(`userid`, `jobid`, `approvaldate`) VALUES ('$logid','$key','$date')");
        if ($heavyapprovenow)
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

       <?php
       if($deliver){
        $delevirednew = mysql_query("UPDATE `jobrequest` SET `reqstatus` = 'ready' WHERE `jobid`='$key'") or die(mysql_error());
        $delivered = mysql_query("UPDATE `materials` SET `materialstatus` = 'deliver' WHERE `jobid`='$key'") or die(mysql_error());
        if ($delivered)
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
            if($heavydeliver){
        $heavydelevirednew = mysql_query("UPDATE `jobrequest` SET `reqstatus` = 'ready' WHERE `jobid`='$key'") or die(mysql_error());
        $heavydelivered = mysql_query("UPDATE `materials` SET `materialstatus` = 'deliver' WHERE `jobid`='$key'") or die(mysql_error());
        if ($heavydelivered)
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

<?php
              date_default_timezone_set('Singapore');
        $chargedate = date('m/d/Y h:i:s');
       if($charge){
        $charge = mysql_query("UPDATE `jobrequest` SET `reqstatus` = 'charged' WHERE `jobid`='$key'") or die(mysql_error());
        $chargemat = mysql_query("UPDATE `materials` SET `materialstatus` = 'charged' WHERE `jobid`='$key'") or die(mysql_error());
        $officecharge = mysql_query("INSERT INTO `budgetcharge`(`officeid`, `jobid`, `userid`, `chargeamount`, `chargedate`) VALUES('$officenumber','$key','$logid','$total','$chargedate')") or die(mysql_error());
        if ($officecharge)
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
            if($heavycharge){
        $heavyheavycharge = mysql_query("UPDATE `jobrequest` SET `reqstatus` = 'charged' WHERE `jobid`='$key'") or die(mysql_error());
        $heavychargemat = mysql_query("UPDATE `materials` SET `materialstatus` = 'charged' WHERE `jobid`='$key'") or die(mysql_error());
        $heavyofficecharge = mysql_query("INSERT INTO `budgetcharge`(`officeid`, `jobid`, `userid`, `chargeamount`, `chargedate`) VALUES('$officenumberheavy','$key','$logid','$total','$chargedate')") or die(mysql_error());
        if ($heavyofficecharge)
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

       <?php
              date_default_timezone_set('Singapore');
        $chargedate = date('m/d/Y h:i:s');
       if($start){
        $start = mysql_query("UPDATE `jobrequest` SET `reqstatus` = 'start' WHERE `jobid`='$key'") or die(mysql_error());
        if ($startnew)
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

              <?php
       if($fin){
        $finnnow = mysql_query("UPDATE `jobrequest` SET `reqstatus` = 'fin' WHERE `jobid`='$key'") or die(mysql_error());
        $fin21 = mysql_query("UPDATE `materials` SET `materialstatus` = 'fin' WHERE `jobid`='$key'") or die(mysql_error());
        if ($finnnow)
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
          if(isset($setsched)){
        $schedupdate = mysql_query("UPDATE `jobrequest` SET `reqstatus` = 'begin' WHERE `jobid`='$key'") or die(mysql_error());
        $setnow = mysql_query("INSERT INTO `jobschedule`(`jobid`, `userid`, `startschedule`, `estimatefinishsched`) VALUES('$key','$logid','$startdate','$enddate')");
        if ($setnow)
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
      if(isset($finjob)){
        $sqltype = mysql_query("UPDATE `jobrequest` SET `reqstatus` = 'forpersonevaluation' WHERE `jobid`='$key'") or die(mysql_error());
        $sqltype = mysql_query("UPDATE `jobschedule` SET `finishdate` = '$date' WHERE `jobid`='$key'") or die(mysql_error());
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
      if(isset($starteval)){
        $geteval = mysql_query("SELECT * FROM `jobrequest` WHERE `jobid` = $key") or die(mysql_error());
        while($row = mysql_fetch_array($geteval)){
          extract($row);
        if($evalcode == $evaluationcode){
          ?>
          <script>
alert("Success!");
window.location.href = "evaluate.php?jobid=<?php echo $key; ?>";
</script>
          <?php
        }
        else{
          ?>
          <script>
alert("Invalid Code!");
</script>
          <?php
        }
      }
    }
       ?>