<?php
include "../../../session.php";
$_SESSION['username'] = $username; // Must be already set
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CSA-B General Services Office | Home</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="../../../bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="../../../bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="../../../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="../../../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">

.first-column {
  width: 40%;
  float: left;
}

.second-column {
  width: 40%;
  float: right;
}
.table-editable {
  position: relative;
  
  .glyphicon {
    font-size: 20px;
  }
}

.table-remove {
  color: #700;
  cursor: pointer;
  
  &:hover {
    color: #f00;
  }
}

.table-up, .table-down {
  color: #007;
  cursor: pointer;
  
  &:hover {
    color: #00f;
  }
}
@media screen and (min-width: 768px) {
  
  #addsymod .modal-dialog  {width:1250px;}

}
@import "compass/css3";

.table-editable {
  position: relative;
  
  .glyphicon {
    font-size: 20px;
  }
}

.table-remove {
  color: #700;
  cursor: pointer;
  
  &:hover {
    color: #f00;
  }
}

.table-up, .table-down {
  color: #007;
  cursor: pointer;
  
  &:hover {
    color: #00f;
  }
}

.table-add {
  color: #070;
  cursor: pointer;
  position: absolute;
  top: 8px;
  right: 0;
  
  &:hover {
    color: #0b0;
  }
}
}</style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <?php
    include "../../../connection/connection.php";

    ?>
    <div class="wrapper">

      <?php include "nav.php"; ?>


      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..." />
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="../../home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-briefcase"></i> <span>Jobs</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../requestform.php"><i class="fa fa-circle-o"></i> Request for Service</a></li>
                <li><a href="../jobrequests.php"><i class="fa fa-circle-o"></i> Job Requests</a></li>
              </ul>
            </li>
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-table"></i> <span>Inventory</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../inv.php"><i class="fa fa-circle-o"></i> All Assets</a></li>
                <li class="active"><a href="../locations.php"><i class="fa fa-circle-o"></i> Buildings</a></li>
              </ul>
            </li>
            <li>
              <a href="../offices.php">
                <i class="fa fa-coffee"></i> <span>Dept/Offices</span>
              </a>
            </li>
            <li>
              <a href="../materials.php">
                <i class="fa fa-building-o"></i> <span>Materials</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Users</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../users.php"><i class="fa fa-circle-o"></i> Head/Admin</a></li>
                <li><a href="../personnel.php"><i class="fa fa-circle-o"></i> Personnel</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Asset Inventory List
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Asset Inventory List</li>
          </ol>
        </section>
<?php
$invsyid= $_GET['invsyid'];
$locationinvid= $_GET['locationid'];
 ?>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><b>Department/Office:</b>
                  <?php  

                  $deptsql = mysql_query("SELECT * FROM invlocation JOIN schoolbldg WHERE schoolbldg.schoolbldgid = invlocation.schoolbldgid AND invlocation.locationid = '$locationinvid'");
                  while ($deptrow = mysql_fetch_array($deptsql)){
                    $locname = $deptrow['locationname'];
                    $locid = $deptrow['locationid'];
                    $bldgid = $deptrow['schoolbldgid'];
                    echo $deptrow['locationname'];
?>
                  </br><b>Location:</b> <?php echo $deptrow['schoolbldgname']; ?>
                  <?php
                                    }
                   ?>
                  </h3>
                  <h3 class="box-title pull-right">
                  <a href="#" class="btn btn-block btn-primary pull-right" data-toggle="modal" data-target="#addsymod">Add Asset</a>

                  </h3>

                </div><!-- /.box-header -->
                <div class="box-body">



    <table id="tablenew" class="table table-striped table-bordered table-hover dataTable no-footer">
    <thead>
      <tr>
        <th>Date Updated</th>
        <th>Room & Location</th>
        <th>Asset Category</th>
        <th>Asset Name</th>
        <th>Purchase Price</th>
        <th>Lot/Qty</th>
        <th>Total</th>
        <th></th>
      </tr>
      </thead>
      <tbody>
      <h6>
            </h6>

    <?php
                            $sql = mysql_query("SELECT * FROM `inventory` JOIN `schoolbldg` JOIN `invlocation` WHERE schoolbldg.schoolbldgid = inventory.schoolbldgid AND invlocation.locationid = inventory.locationid AND invsyid = $invsyid AND invlocation.locationid = $locationinvid") or die(mysql_error());
                            $result = mysql_num_rows($sql);

                            $num = '1';

                            if($result != '0'){

                                ?>
       <?php
    while($row = mysql_fetch_array($sql)){
      extract($row);
        ?>

      <tr>
        <td><?php echo $dateupdated; ?></td>
        <td><?php echo $locationname. " & ".$schoolbldgname; ?></td>
        <td><?php echo $assetcat; ?></td>
        <td><?php echo $assetname; ?></td>
        <td><?php echo "₱".number_format((float)$purchaseprice, 2, '.', ','); ?></td>
        <td><?php echo $assetqty; ?></td>
        <td><?php echo "₱".number_format((float)$assettotal, 2, '.', ','); ?></td>
        <td>
        <a href="#editModal<?php echo$num?>" data-sfid='"<?php echo $row['assetid'];?>"' data-toggle="modal"><i class="fa fa-forward"></i> View</a>
        <a href ="#delModal<?php echo$num?>" data-sfid='"<?php echo $row['assetid'];?>"' data-toggle="modal"><i class="fa fa-trash-o"> Delete</i></a></td>
      </tr>
<div id="editModal<?php echo $num; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
 <div class="modal-dialog" role="document">
    <div class="modal-content">
                             <div class="modal-header">
                                <a class="close" data-dismiss="modal">×</a>
                                <h3>Asset Details</h3>
                            </div>
                                <div class="modal-body row">
                                    <?php $asset_id = $row['assetid'];
                                    ?>
              <div class="col-md-6">
              <p><b>Room</b></p>
              <p class="lead"><?php echo $locationname; ?></p>
              <p><b>Location</b></p>
              <p class="lead"><?php echo $schoolbldgname; ?></p>
              <p><b>Asset Category</b></p>
              <p class="lead">  <?php echo $assetcat; ?></p>
              <p><b>Asset Name</b></p>
              <p class="lead">  <?php echo $assetname; ?></p>
              <p><b>Item Type</b></p>
              <p class="lead">  <?php echo $assettype; ?></p>
              <p><b>Item Description</b></p>
              <p class="lead">  <?php echo $assetdesc; ?></p>
              <p><b>Model</b></p>
              <p class="lead"><?php 
              echo $assetmodel;
              ?></p>
              <p><b>Serial Number</b></p>
              <p class="lead">
              <?php
              echo $serialno;
              ?></p>
              </div>
              <div class="col-md-6">
              <p><b>Date purchased</b></p>
              <p class="lead"><?php
               echo $datepurchase;?></p>
              <p><b>Supplier</b></p>
              <p class="lead"><?php echo $supplier; ?></p>
              <p><b>Purchase Price</b></p>
              <p class="lead"><?php echo "₱".number_format((float)$purchaseprice, 2, '.', ','); ?></p>
              <p><b>Lot/Qty</b></p>
              <p class="lead"><?php echo $assetqty; ?></p>
               <p><b>Total</b></p>
              <p class="lead"><?php echo "₱".number_format((float)$assettotal, 2, '.', ','); ?></p>
              <p><b>Remarks</b></p>
              <p class="lead"><?php
               echo $remarks;?></p>
              </div>
                                 </div>
                                 <div class="modal-footer">
                    <a href="#updateModal<?php echo$assetid?>" data-sfid='"<?php echo $row['assetid'];?>"' data-toggle="modal" class="btn btn-primary">Update Asset</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

                            </div>
                            </div>
                            </div>

      <div id="delModal<?php echo $num; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role=document>
        <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                </div>
            
                <div class="modal-body">
                    <p>You are about to delete one asset, this procedure is irreversible.</p>
                    <p>Do you want to proceed?</p>
                </div>
                
                <div class="modal-footer">
                <form role="form" name="syform" method="post" action="">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="delconfirm" class="btn btn-danger btn-ok">Confirm</button>
                    </form>
                </div>
        </div>
    </div>
</div>
      <div id="updateModal<?php echo $assetid; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role=document>
        <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Edit Asset</h4>
                </div>
            
                <form role="form" name="updateform" method="post" action="">
              <div class="modal-body row">
             <?php $updateinvid= $_GET['invsyid']; ?>
              <input type="text" name ="assetupdateid" value ="<?php echo $assetid; ?>" hidden>
              <div class="col-md-6">
              <div class="form-group">
              <?php $sassetid = $assetid; ?>
              <label>Location/Bldg</label>
              <select class="form-control" name="bldgloc" id="bldgloc">
                            <?php

                              $saql ="SELECT * FROM schoolbldg";
                              $result = mysql_query($saql);
                              while($row = mysql_fetch_array($result)){
                              extract($row);

                              echo "<option value=".$schoolbldgid.">".ucfirst($schoolbldgname)."</option>";
                            }
          
                            ?>
              </select>
              </div>
              <div class="form-group">
              <label>Room</label>
              <select class="form-control" name="roomofc" id="roomofc">
              </select>
              </div>
              
              <div class="form-group">
              <label>Asset Category</label>
              <input type="text" class="form-control" name="updatecategory" value="<?php echo $assetcat; ?>">
              </div>
              <div class="form-group">
              <label>Asset Name</label>
              <input type="text" class="form-control" name="updatename" value="<?php echo $assetname; ?>">
              </div>
              <div class="form-group">
              <label>Item Type</label>
              <input type="text" class="form-control" name="updatetype" value="<?php echo $assettype; ?>">
              </div>
              <div class="form-group">
              <label>Item Description</label>
              <input type="text" class="form-control" name="updatedescription" value="<?php echo $assetdesc; ?>">
              </div>
              <div class="form-group">
              <label>Model</label>
              <input type="text" class="form-control" name="updatemodel" value="<?php echo $assetmodel; ?>">
              </div>
              <div class="form-group">
              <label>Serial Number</label>
              <input type="text" class="form-control" name="updateserial" value="<?php echo $serialno; ?>">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
              <label>Date purchased</label>
              <input type="text" class="form-control" name="updatedatepurchased" value="<?php echo $datepurchase; ?>">
              </div>
              <div class="form-group">
              <label>Supplier</label>
              <input type="text" class="form-control" name="updatesupplier" value="<?php echo $supplier; ?>">
              </div>
              <div class="form-group">
              <label>Purchase Price</label>
              <input type="text" class="form-control" name="priceupdate" id="priceupdate<?php echo $assetid; ?>" onkeyup="calculate(<?php echo $assetid; ?>)" value="<?php echo $purchaseprice; ?>">
              </div>
              <div class="form-group">
              <label>Lot/Qty</label>
              <input type="text" class="form-control" name="qtyupdate" id="qtyupdate<?php echo $assetid; ?>" onkeyup="calculate(<?php echo $assetid; ?>)" value="<?php echo $assetqty; ?>">
              </div>
              <div class="form-group">
              <label>Total</label>
              <input type="text" class="form-control" id="totalcostupdate<?php echo $assetid; ?>" name="totalcostupdate" value="<?php echo $assettotal; ?>">
              </div>
              <div class="form-group">
              <label>Remarks</label>
              <input type="text" class="form-control" name="updateremarks" value="<?php echo $remarks; ?>">
              </div>
                            </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="update" class="btn btn-danger btn-ok">Confirm</button>
                    </form>
                </div>

        
        </div>
    </div>
</div>

                
      <?php

                          $num++;

                            }
                          }

                            require "areaupdate.php";        
                      ?>
      <!-- This is our clonable table line -->
      </tbody>
    </table>
              <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
            </div><!-- /.col -->
            <div class="col-xs-6">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Total Value of all Items:</th>
                    <td><?php 
                    $abcd = mysql_query("SELECT ROUND(SUM(assettotal)) as total from inventory WHERE invsyid=$invsyid AND locationid  = $locid");
                while($row = mysql_fetch_array($abcd)){
                  extract($row);
                  echo "₱".number_format((float)$total, 2, '.', ',');} ?></td>
                  </tr>
                </table>
              </div>
            </div><!-- /.col -->
          </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
<div id="addsymod" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Asset</h4>
      </div>
      <form role="form" method="post" action="">
      <div class="modal-body">
        
        <div id="tableadd" class="table-editable">
    <span class="table-add glyphicon glyphicon-plus"></span>
    <table class="table">
      <tr>
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
        <th>Total</th>
        <th>Remarks</th>
        <th></th>
      </tr>
      <!-- This is our clonable table line -->
      <tr class="hide">
        <td><input type="text" width="100%" class="form-control" name="assetcateg[]"></td>
        <td><input type="text" width="100%" class="form-control" name="namedasset[]"></td>
        <td><input type="text" width="100%" class="form-control" name="itemtype[]"></td>
        <td><input type="text" width="100%" class="form-control" name="descitem[]"></td>
        <td><input type="text" width="100%" class="form-control" name="modelitem[]"></td>
        <td><input type="text" width="100%" class="form-control" name="serialitem[]"></td>
        <td><input type="text" width="100%" class="form-control" name="purchdate[]"></td>
        <td><input type="text" width="100%" class="form-control" name="suppitem[]"></td>
        <td><input type="text" width="100%" class="form-control" id="hiddencost" onkeyup="calc()" name="purchprice[]"></td>
        <td><input type="text" width="100%" class="form-control" id="qtyunit" onkeyup="calc()" name="qtyitem[]"></td>
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

  </div>
</div>
<?php
//Open a new connection to the MySQL server
$invidsy= $_GET['invsyid'];
$locid = $locid;
$bldgid = $bldgid;
date_default_timezone_set('Singapore');
            $dateasd = date('m/d/Y h:i:s');
if(isset($_POST['addassetnow'])){
    extract($_POST);
    $N = count($assetcateg);
    for($i=1; $i < $N; $i++)
    {

  $itemtotal[$i] = $purchprice[$i] * $qtyitem[$i];
$insert = mysql_query("INSERT INTO `inventory`(`invsyid`, `userid`, `schoolbldgid`, `locationid`,`assetcat`, `assetname`, `assettype`, `assetdesc`, `assetmodel`, `serialno`, `datepurchase`, `supplier`, `purchaseprice`, `assetqty`, `assettotal`, `remarks`,`dateupdated`) VALUES ('$invidsy', '$userid', '$bldgid', '$locid','".addslashes($assetcateg[$i])."', '".addslashes($namedasset[$i])."', '".addslashes($itemtype[$i])."', '".addslashes($descitem[$i])."', '".addslashes($modelitem[$i])."', '".addslashes($serialitem[$i])."', '".addslashes($purchdate[$i])."', '".addslashes($suppitem[$i])."', '".addslashes($purchprice[$i])."', '".addslashes($qtyitem[$i])."', '".addslashes($itemtotal[$i])."', '".addslashes($itemremark[$i])."','$dateasd')") or die("Verification Error: " . mysql_error());

}
 if($insert)
          {
?>


<script type='text/javascript'>alert('Asset Added Successfully.'); window.location.href = 'areainvsystem.php?invsyid=<?php echo $invidsy; ?>&&locationid=<?php echo $locid; ?>';</script>
        <?php
        
            
        
    }
           else{
    echo "<script type='text/javascript'>alert('Record Already Exist!')</script>";
}

      }  

    ?>
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.2.0
        </div>
        <strong>Copyright &copy; 2015-Present <a href="http://csab.edu.ph">Colegio San Agustin - Bacolod</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
        <script src="../../../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->

    <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Select2 -->
    <script src="../../../plugins/select2/select2.full.min.js" type="text/javascript"></script>
    <!-- InputMask -->
    <script src="../../../plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="../../../plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="../../../plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
    <!-- date-range-picker -->

    <script src="../../../plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../../../plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="../../../plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- bootstrap color picker -->
    <script src="../../../plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <!-- bootstrap time picker -->
    <script src="../../../plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- iCheck 1.0.1 -->
    <script src="../../../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="../../../plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->
    <script type="text/javascript">
<!-- 

<!-- Begin
function Check(chk)
{
if(document.myform.Check_ctr.checked==true){
for (i = 0; i < chk.length; i++)
chk[i].checked = true ;
}else{

for (i = 0; i < chk.length; i++)
chk[i].checked = false ;
}
}

// End -->
</script>
            <script type="text/javascript">
function calculate(id){
var quantity = document.getElementById('qtyupdate'+id).value;
var price = document.getElementById('priceupdate'+id).value;
var sum = parseFloat(quantity).toFixed(2)*parseFloat(price).toFixed(2);
document.getElementById('totalcostupdate'+id).value = sum;
}
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
    $('#tablenew').DataTable( {
        "order": [[ 1, "desc" ]]
    } );
} );
    </script>
    <script>
$(document).ready(function(){
  $('#bldgloc').change(function(){
    var bldglocid = $('#bldgloc').val();
    if(bldglocid != 0)
    {
      $.ajax({
        type:'post',
        url:'bldgloc.php',
        data:{id:bldglocid},
        cache:false,
        success: function(returndata){
          $('#roomofc').html(returndata);
        }
      });
    }
  })
})
</script>

    <script type="text/javascript">
var $TABLE = $('#tableadd');
var $BTN = $('#test_btn');
var $EXPORT = $('#export');

$('.table-add').click(function () {
  var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
  $TABLE.find('table').append($clone);
});

$('.table-remove').click(function () {
  $(this).parents('tr').detach();
});

$('.table-up').click(function () {
  var $row = $(this).parents('tr');
  if ($row.index() === 1) return; // Don't go above the header
  $row.prev().before($row.get(0));
});

$('.table-down').click(function () {
  var $row = $(this).parents('tr');
  $row.next().after($row.get(0));
});

// A few jQuery helpers for exporting only
jQuery.fn.pop = [].pop;
jQuery.fn.shift = [].shift;

$BTN.click(function () {
  var $rows = $TABLE.find('tr:not(:hidden)');
  var headers = [];
  var newmeta = [];
  
  // Get the headers (add special header logic here)
  $($rows.shift()).find('th:not(:empty)').each(function () {
    headers.push($(this).text().toLowerCase());
  });
  
  // Turn all existing rows into a loopable array
  $rows.each(function () {
    var $td = $(this).find('td');
    var h = {};
    
    // Use the headers from earlier to name our hash keys
    headers.forEach(function (header, i) {
      h[header] = $td.eq(i).text();   
    });
    
    newmeta.push(h);
  });
});
</script>
  </body>
</html>