                <?php
            date_default_timezone_set('Singapore');
            $date = date('m/d/Y h:i:s');
        error_reporting(0);
        extract($_POST);
        $image = addslashes (file_get_contents($_FILES['image']['tmp_name']));
        $imageta = getimagesize($_FILES['image']['tmp_name']);//to know about image type etc
        $imagetype = $imageta['mime'];

        if(isset($push)){
      $checker = mysql_query("SELECT * FROM positions WHERE positionid = $pos");
      $checka = mysql_fetch_array($checker);
      if($checker){
        $checkb = $checka['positionpriv'];
         $result = mysql_query("INSERT INTO `users`(`username`, `password`, `privilege`,`userstatus`) VALUES('$username','$password','$checkb','active')") or die("Verification Error: ".mysql_error());     
          if($result)
          {
            $a = mysql_query("SELECT * from `users` WHERE username = '$username'")or die("Verification Error: ".mysql_error());
            $aa = mysql_fetch_array($a);

          if($a)
          {
          $aaa = $aa['userid'];
          $profilesql = mysql_query("INSERT INTO `profiles`(`userid`, `officeid`,`positionid`, `fname`, `lname`, `birthdate`, `email`, `phone`, `address`, `gender`, `syfrom`, `syto`, `image`, `imagetype`, `datecreated`) VALUES ('$aaa','$office','$pos','$fname','$lname','$bdate','$emailad','$contact','$address','$gender','$syfrom','$syto','$image','$imagetype','$date' )") or die("Verification Error: " . mysql_error());

          echo "<script type='text/javascript'>alert('User successfully added.'); window.location.href = '../users.php';</script>";
          }
            
        
    }
      else{
        echo "error";
      }
    }
  }

        
  ?>