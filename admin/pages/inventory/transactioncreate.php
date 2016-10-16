  <?php
            date_default_timezone_set('Singapore');
            $datetransferred = date('m/d/Y h:i:s');
        error_reporting(0);


if(isset($_POST['transactnow'])){
  $idedit = $_POST['idasset'];
$N = count($idedit);
for($ct=0; $ct < $N; $ct++)
{
$assetidadd = addslashes($_POST['idasset'][$ct]);
$atfnumb = addslashes($_POST['atfnumber']);
$assettransactiontype = addslashes($_POST['transactiontypeselect']);
$quantity = addslashes($_POST['qtyunit'][$ct]);
$purchasecost = addslashes($_POST['hiddencost'][$ct]);
$costtotal = addslashes($_POST['totalcost'][$ct]);
$transactreason = addslashes($_POST['transactionreason'][$ct]);
$uniquenow = addslashes($_POST['uniquenum'][$ct]);
//transfer
$transferfrom = addslashes($_POST['transferfromwho']);
$transissuedby = addslashes($_POST['transissuedbywho']);
$transissuedto = addslashes($_POST['transissuedtowho']);
$transrequestedby = addslashes($_POST['transrequestedbywho']);

//release
$releaserequestby = addslashes($_POST['releaserequestby'][$ct]);
$releaseauthorizeby = addslashes($_POST['releaseauthorizeby'][$ct]);
$releaseguard = addslashes($_POST['releaseguard'][$ct]);

//pullout
$office = addslashes($_POST['office'][$ct]);
$pulloutrequestby = addslashes($_POST['pulloutrequestby'][$ct]);
$pulloutauthorizeby = addslashes($_POST['pulloutauthorizeby'][$ct]);
$pulloutreceivedby = addslashes($_POST['pulloutreceivedby'][$ct]);

//dispose
$disposaltype = addslashes($_POST['disposaltype'][$ct]);
$disposaltypedesc = addslashes($_POST['disposaltypedesc'][$ct]);
$disposefaci = addslashes($_POST['disposefaci'][$ct]);


         $result = mysql_query("INSERT INTO `assettransaction`(`assetid`, `userid`, `assetformsid`, `transactionnumber`, `transactiondate`, `transactionqty`, `transactionunitcost`, `transactionunittotal`, `transactionpurpose`, `uniquenumber`) 
          VALUES ('".$assetidadd."', '".$userid."', '".$assettransactiontype."', '".$atfnumb."', '".$datetransferred."', '".$quantity."', '".$purchasecost."', '".$costtotal."', '".$transactionreason."', '".$uniquenow."')")or die("Verification Error: ".mysql_error());    
        if($result){
          $transferselect  = mysql_query("SELECT * FROM assettransaction WHERE uniquenumber = '".$uniquenow."'");
          $aa = mysql_fetch_array($transferselect);
          if($transferselect)
          {
          $aaa[] = $aa['assettransactionid'];
          $transactid = addslashes($aaa[$ct]);
          $transferinsert = mysql_query("INSERT INTO `assettransfer`(`assettransactionid`, `transferfrom`, `transferissuedby`, `transferissuedto`, `trasferrequestedby`) 
            VALUES ('".$transactid."','".$transferfrom."','".$transissuedby."','".$transissuedto."','".$transrequestedby."')")or die("sss Error: ".mysql_error());
          }
          ?>
            
          <?php
      }
    }
if($transferinsert){
  ?>
<script type='text/javascript'>alert('Success! Transfer is now pending for approval'); window.location.href = 'invsystem.php?invsyid=<?php echo $invsyid; ?>';</script>

  <?php
  }
}
        
  ?>