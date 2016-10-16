  <?php
            date_default_timezone_set('Singapore');
            $datetransferred = date('m/d/Y h:i:s');
        error_reporting(0);
        extract($_POST);
        $image = addslashes (file_get_contents($_FILES['image']['tmp_name']));
        $imageta = getimagesize($_FILES['image']['tmp_name']);//to know about image type etc
        $imagetype = $imageta['mime'];

        if(isset($transfernow)){

         $result = mysql_query("INSERT INTO `assettransfer`(`invsyid`, `userid`, `assetid`, `officeid`, `atfnumber`, `datetransfer`,`assetreferences`, `transferqty`, `transfercost`, `transfertotalcost`, `transfervername`, `transferpickupname`, `transferto`, `requestedby`, `authorizationname`) VALUES ('$invsyid','$userid','$assetidnow','$office','$atfnumber','$datetransferred','$references','$qtyunit','$hiddencost','$totalcost','$transfername','$pickup','$transfertowho','$requestedby','$authorizationname')") or die("Verification Error: ".mysql_error());     
          if($result)
          {
           
          echo "<script type='text/javascript'>alert('Asset Transfer Form successfully submitted for approval.'); window.location.href = 'http://localhost/gso/admin/pages/inventory/invsystem.php?invsyid=1';</script>";
            
        
    }
  }

        
  ?>