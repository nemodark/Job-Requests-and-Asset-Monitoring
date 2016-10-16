<div id="addsymod" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Asset</h4>
      </div>
      <form role="form" name="syform" method="post" action="">
      <div class="modal-body">
        
        <div id="tableadd" class="table-editable">
    <span class="table-add glyphicon glyphicon-plus"></span>
    <table class="table">
      <tr>
        <th>Room/Location</th>
        <th>Asset Category</th>
        <th>Asset Name</th>
        <th>Item Type</th>
        <th>Item Description</th>
        <th>Model</th>
        <th>Serial #</th>
        <th>Date purchased</th>
        <th>Supplier</th>
        <th>Purchase price</th>
        <th>Lot/Qty</th>
        <th>Remarks</th>
        <th></th>
      </tr>
      <!-- This is our clonable table line -->
      <tr class="hide">
        <td><input type="text" width="100%" class="form-control" name="assetroom[]"></td>
        <td><input type="text" width="100%" class="form-control" name="assetcateg[]"></td>
        <td><input type="text" width="100%" class="form-control" name="namedasset[]"></td>
        <td><input type="text" width="100%" class="form-control" name="itemtype[]"></td>
        <td><input type="text" width="100%" class="form-control" name="descitem[]"></td>
        <td><input type="text" width="100%" class="form-control" name="modelitem[]"></td>
        <td><input type="text" width="100%" class="form-control" name="serialitem[]"></td>
        <td><input type="text" width="100%" class="form-control" name="purchdate[]"></td>
        <td><input type="text" width="100%" class="form-control" name="suppitem[]"></td>
        <td><input type="text" width="100%" class="form-control" name="purchprice[]"></td>
        <td><input type="text" width="100%" class="form-control" name="qtyitem[]"></td>
        <td><input type="text" width="100%" class="form-control" name="itemremark[]"></td>
        <td>
          <span class="table-remove glyphicon glyphicon-remove"></span>
        </td>
      </tr>
    </table>
  </div>         
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="addassetnow"><i class="fa fa-check"></i> Submit</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-close" ></i> Cancel</button>
      </div>
      </form>
    </div>
<?php
//Open a new connection to the MySQL server
$invidsy= $_GET['invsyid'];
date_default_timezone_set('Singapore');
            $date = date('m/d/Y h:i:s');
if(isset($_POST['addassetnow'])){
    $i = 1;
    extract($_POST);
    
 While($i<sizeof($assetroom))
 {
  $itemtotal = $purchprice[$i] * $qtyitem[$i];
$insert = mysql_query("INSERT INTO `inventory`(`invsyid`, `userid`, `assetloc`, `assetcat`, `assetname`, `assettype`, `assetdesc`, `assetmodel`, `serialno`, `datepurchase`, `supplier`, `purchaseprice`, `assetqty`, `assettotal`, `remarks`) VALUES ('$invidsy', '$userid', '".addslashes($assetroom[$i])."', '".addslashes($assetcateg[$i])."', '".addslashes($namedasset[$i])."', '".addslashes($itemtype[$i])."', '".addslashes($descitem[$i])."', '".addslashes($modelitem[$i])."', '".addslashes($serialitem[$i])."', '".addslashes($purchdate[$i])."', '".addslashes($suppitem[$i])."', '".addslashes($purchprice[$i])."', '".addslashes($qtyitem[$i])."', '$itemtotal', '".addslashes($itemremark[$i])."')") or die("Verification Error: " . mysql_error());

 $i++;
}
 if($insert)
          {

        echo "<script type='text/javascript'>alert('Request for Service Submitted.'); window.location.href = 'invsystem.php?invsyid=$invidsy';</script>";
        
            
        
    }
           else{
    echo "<script type='text/javascript'>alert('Record Already Exist!')</script>";
}

      }  

    ?>
  </div>
</div>