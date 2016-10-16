<?php
//Open a new connection to the MySQL server
date_default_timezone_set('Singapore');
            $date = date('m/d/Y h:i:s');
if(isset($_POST['addareanow'])){
    $c = 1;
    extract($_POST);

    
 while($c<sizeof($ofcsel))
 {
$insertarea = mysql_query("INSERT INTO `deptarea`(`officeid`, `schoolbldgid`, `areaname`) VALUES ('".addslashes($ofcsel[$c])."','".addslashes($schoolbldgid)."','".addslashes($areaname[$c])."')") or die("Verification Error: " . mysql_error());

 $c++;
}
 if($insertarea)
          {

        echo "<script type='text/javascript'>alert('Area Successfully added.'); window.location.href = 'areas.php?schoolbldgid='".$schoolbldgid."';</script>";
        
            
        
    }
           else{
    echo "<script type='text/javascript'>alert('Building Already Exist!')</script>";
}

      }  

    ?>
    <?php
            date_default_timezone_set('Singapore');
            $date = date('m/d/Y h:i:s');
        error_reporting(0);
        extract($_POST);
        
        
        if($addofficenow){
          $slquery = mysql_query("SELECT * FROM office WHERE officename = '$officename'");
          if(mysql_num_rows($slquery)==0){
         $result = mysql_query("INSERT INTO `office`(`schoolbldgid`, `officename`, `officedescription`) VALUES ('$schoolbldgid','$officename','$officedesc')") or die("Verification Error: ".mysql_error());     
          if($result)
          {
          echo "<script type='text/javascript'>alert('Office successfully added.'); window.location.href = '../offices.php';</script>";
          }
            
        
    }
      else{
        echo "<script type='text/javascript'>alert('Office already exist!');</script>";
      }
  }

        
  ?>