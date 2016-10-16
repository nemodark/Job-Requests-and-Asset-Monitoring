        <?php
            date_default_timezone_set('Singapore');
            $date = date('m/d/Y h:i:s');
        error_reporting(0);
        extract($_POST);
        $upup = $_GET['invsyid'];
        if(isset($update)){
          $reqsql= "UPDATE `inventory` SET `assetcat`='$updatecategory',`assetname`='$updatename',`assettype`='$updatetype',`assetdesc`='$updatedescription',`assetmodel`='$updatemodel',`serialno`='$updateserial',`datepurchase`='$updatedatepurchased',`supplier`='$updatesupplier',`purchaseprice`='$priceupdate',`assetqty`='$qtyupdate',`assettotal`='$totalcostupdate',`remarks`='$updateremarks',`dateupdated`='$date' WHERE assetid = '$assetupdateid'";
          $result = mysql_query($reqsql) or die("Verification Error: " . mysql_error());
          
          if($result)
          {
?>
<script type='text/javascript'>alert('Asset Update.'); window.location.href = 'invsystem.php?invsyid=<?php echo $updateinvid ?>';</script>
        
 <?php           
        
    }
           else{
    echo "<script type='text/javascript'>alert('Record Already Exist!')</script>";
}
        }
  ?>