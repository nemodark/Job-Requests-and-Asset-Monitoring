<?php
include "../../../session.php";
$_SESSION['username'] = $username; // Must be already set
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CSA-B General Services Office</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="../../../bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="../../../bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="../../../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../../../plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../../../plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../../../plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="../../../plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../../../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="../../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
<style type="text/css">
    .goto .form-inline .form-group input {
      padding:10px;
    width:170px;
    margin:15px !important;
    }
    .goto .form-inline .form-group select {
    width:70px;
    margin:15px !important;
    }
       .go .form-inline .form-group select {
        width:350px;
    margin:10px !important;
    }
    .go .form-inline .form-group input {
      width:300px;
    margin:10px !important;
    }
</style>
  </head>
  <body class="skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <?php
    include "../../../connection/connection.php";

    ?>
    <div class="wrapper">

      <?php include "nav.php"; ?>

      <!-- =============================================== -->

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
            <li class="active">
              <a href="../inv.php">
                <i class="fa fa-table"></i> <span>Inventory</span>
              </a>
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

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Asset Transfer Form
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Inventory</a></li>
            <li class="active">Asset Transfer Form</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <?php
              $invsyid = $_GET['invsyid'];
              $assetidnow = $_GET['assetid'];
              date_default_timezone_set('Singapore');
            $date = date('m/d/Y');
            $atfnumsql = mysql_query("SELECT * FROM assettransfer ORDER BY transferid DESC LIMIT 1");
            while ($rowatf = mysql_fetch_array($atfnumsql)) {
              extract($rowatf);
              $atfnum = $atfnumber + 1;
            }
              $selecttranssql = mysql_query("SELECT * FROM inventory WHERE assetid ='$assetidnow'") or die(mysql_error());
              while ($rowtrans = mysql_fetch_array($selecttranssql)) {
                extract($rowtrans);
              ?>
              <div class="box box-primary">
               <form role="form" name="transferform" method="post" action="">
                <div class="box-body">
                <div class="form-group col-md-4 pull-right">
                      <label>Date</label>
                      <input class="form-control" name="datetransfer" id="datetransfer" value="<?php echo $date; ?>" readonly>
                      <label>A.T.F No.</label>
                      <input class="form-control" name="atfnumber" id="atfnumber" value="<?php echo sprintf("%05d", $atfnum); ?>" readonly>
                      </div>
                <div class="form-group col-md-8">
                <label>Asset Code/Name</label>
                      <input class="form-control" name="transfername" id="transfername" value="<?php echo $assetname; ?>" readonly>
                <label>Asset Serial Number</label>
                      <input class="form-control" name="transferserialno" id="transferserialno" value="<?php echo $serialno; ?>" readonly>
                      </div>
                      <br><br><br><br>
                
                <div class="form-group col-md-12">
                      <label>Asset Description</label>
                      <textarea class="form-control" name="transferserialdesc" id="transferserialdesc" rows="3" readonly><?php echo $assetdesc; ?></textarea>
                    </div>
                <div class="form-group pull-right">
                    <label>References: (RR, INV, OR)</label>
                      <input class="form-control" name="references" id="references" placeholder="">
                </div>
                <div class="col-md-12">
                <hr>
                </div>
                <CENTER>
                <div class="goto">
                <div class="form-inline col-md-12">
                <div class="form-group col-md-3">
                <label>Qty/Unit:</label>
                      <select class="form-control" name="qtyunit" id="qtyunit" onchange="calculate()"  required>
                      <option>----</option>
                      <?php
                      $qtyfirst = 1;
                    for($i = $qtyfirst ; $i <= $assetqty; $i++){
                       ?>
                      <option><?php echo $i; ?></option>
                      <?php
                    }
                         ?>
                         </select>
                </div>
                <div class="form-group col-md-4">
                <label>Unit Cost:</label>
                      <input class="form-control" name="unitcost" id="unitcost" value="<?php echo "₱".number_format((float)$purchaseprice, 2, '.', ','); ?>" readonly><input value = "<?php echo $purchaseprice; ?>" name="hiddencost" id="hiddencost" hidden>
                </div>
                <div class="form-group col-md-4">
                <label>Total:</label>
                      <input class="form-control" name="totalcost" id="totalcost" readonly>
                </div>
                </div>
                </div>
                </CENTER>
                <div class="go">
                <div class="form-group col-md-6">
                <label>Transferring Dept</label>
                <select class="form-control" name="office" id="ofc" required>
                      <option selected="selected">--Select Office--</option>
                            <?php

                              $saql ="SELECT * FROM office";
                              $result = mysql_query($saql);
                              while($row = mysql_fetch_array($result)){
                              extract($row);

                              echo "<option value=".$officeid.">".ucfirst($officedescription)."</option>";
                            }
          
                            ?>
                      </select>
                </div>
                <div class="form-group col-md-6">
                <label>To</label>
                <input class="form-control" name="transfertowho" id="transfertowho">
                </div>
                </div>
                <div class="form-group col-md-6">
                <label>VERIFICATION & AUTHORIZATION (TRANSFERRING DEPARTMENT)</label>
                                <hr>
                </div>

                <div class="form-group col-md-6">
                <label>REQUESTING/RECEIVING DEPARTMENT</label>
                                <hr>
                </div>

                <div class="form-group col-md-6">
                <label>Name</label>
                <input type="text" class="form-control" name="transfername" id="transfername">
                </div>
                <div class="form-group col-md-6">
                <label>Requested by</label>
                <input type="text" class="form-control" name="requestedby" id="requestedby">
                </div>
                <div class="form-group col-md-6">
                </div>
                <div class="form-group col-md-6">
                <label>VERIFICATION & AUTHORIZATION</label>
                </div>
                <div class="form-group col-md-6">
                <label>Pick up by (NAME)</label>
                <input type="text" class="form-control" name="pickup" id="pickup">
                </div>
                <div class="form-group col-md-6">
                <label>Name</label>
                <input type="text" class="form-control" name="authorizationname" id="authorizationname">
                </div>
                </div>
                  <div class="box-footer">
                  <input type="submit" class="btn btn-primary pull-right" name="transfernow" value="Submit">
                  </div>

                </form>
              </div><!-- /.box -->
              <?php 

              }
              ?>
              </div>
              </div>

              <?php require "transfercreate.php"; ?>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2015-Present CSAB CSIT.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../../plugins/jQuery/jquery-ui.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    function calculate() {
    var myBox1 = document.getElementById('qtyunit').value; 
    var myBox2 = document.getElementById('hiddencost').value;
    var result = document.getElementById('totalcost'); 
    var myResult = myBox1 * myBox2;
    result.value = myResult;
}
    </script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script type="text/javascript">
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../../../plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="../../../plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="../../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="../../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="../../../plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="../../../plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="../../../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="../../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="../../../plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../../../dist/js/pages/dashboard.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../dist/js/demo.js" type="text/javascript"></script>

  </body>
</html>
