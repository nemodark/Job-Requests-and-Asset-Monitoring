        <?php
            date_default_timezone_set('Singapore');
            $date = date('m/d/Y h:i:s');
        error_reporting(0);
        extract($_POST);
        $image = addslashes (file_get_contents($_FILES['image']['tmp_name']));
        $imageta = getimagesize($_FILES['image']['tmp_name']);//to know about image type etc
        $imagetype = $imageta['mime'];
        $syfrom = date('Y');
        $syto = $syfrom + 1;
        $slquery = mysql_query("SELECT * FROM users WHERE username='$username'");
        if(mysql_num_rows($slquery)==0){
        if(isset($push)){
         $result = mysql_query("INSERT INTO `users`(`username`, `password`, `privilege`) VALUES('$username','$position','personnel')") or die("Verification Error: ".mysql_error());     
          if($result)
          {
            $a = mysql_query("SELECT * from `users` WHERE username = '$username'")or die("Verification Error: ".mysql_error());
            $aa = mysql_fetch_array($a);

          if($a)
          {
          $aaa = $aa['userid'];
          $profilesql = mysql_query("INSERT INTO `maintenanceprofile`(`userid`, `officeid`, `fname`, `lname`, `birthdate`,`cellphone`, `gender`, `address`, `dateadded`) VALUES ('$aaa','1','$fname','$lname','$bdate','$contact','$gender', '$address' ,'$date')") or die("Verification Error: " . mysql_error());
          if($profilesql){
            $b = mysql_query("SELECT * from `users` WHERE username = '$username'")or die("Verification Error: ".mysql_error());
            $bb = mysql_fetch_array($b);
            if($b)
            {
              $bbb = $bb['userid'];
              $personnelsql = mysql_query("INSERT INTO `personnel`(`userid`, `personneltype`, `personnelstatus`) VALUES ('$bbb', '$position','available')");
              echo "<script type='text/javascript'>alert('User successfully added.'); window.location.href = '../personnel.php';</script>";
            }
          }
          }
            
        
    }
      else{
        echo "<script type='text/javascript'>alert('Record Already Exist!')</script>";
      }
  }
        }
        

        
  ?>