        <?php
            date_default_timezone_set('Singapore');
            $date = date('m/d/Y h:i:s');
        error_reporting(0);
        extract($_POST);
        
        if(isset($req)){
          $reqsql= "UPDATE jobrequest SET jobname = '$itemname', jobdesc = '$reqdesc', jobdatereq ='$date', jobtype ='$jobtype' WHERE jobid ='$jobid' ";
          $result = mysql_query($reqsql) or die("Verification Error: " . mysql_error());
          
          if($result)
          {

        echo "<script type='text/javascript'>alert('Request for Service Updated.'); window.location.href = 'jobview.php?jobid=<?php echo $vara; ?>';</script>";
        
            
        
    }
           else{
    echo "<script type='text/javascript'>alert('Record Already Exist!')</script>";
}
        }
  ?>