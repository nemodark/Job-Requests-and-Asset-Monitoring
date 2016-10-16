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
    <!-- daterange picker -->
    <link href="../../../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="../../../plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Color Picker -->
    <link href="../../../plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap time Picker -->
    <link href="../../../plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Select2 -->
    <link href="../../../plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="../../../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

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
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-table"></i> <span>Inventory</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="../inv.php"><i class="fa fa-circle-o"></i> All Assets</a></li>
                <li><a href="../locations.php"><i class="fa fa-circle-o"></i> Buildings</a></li>
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

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <CENTER>
          <h1>
            Asset Transaction Form
          </h1>
          </CENTER>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <?php
              $invsyid = $_GET['invsyid'];
              date_default_timezone_set('Singapore');
            $date = date('m/d/Y');
            ?>

              <div class="box box-primary">
               <form role="form" name="transferform" method="post" action="">
                <div class="box-body">
                <div class="col-md-12">
                      <div class="form-group pull-right" name="atfnumform">
                      <label>A.T.F No.</label>
                      <?php
                      $atfnumsql = mysql_query("SELECT * FROM assettransaction ORDER BY assettransactionid DESC LIMIT 1");
                      while ($rowatf = mysql_fetch_array($atfnumsql)) {
                      extract($rowatf);
                      $atfnum = $transactionnumber + 1;
                      $uniqueasd = $uniquenumber +1;
            }

            ?>
                      <input class="form-control" name="atfnumber" id="atfnumber" value="<?php echo sprintf("%05d", $atfnum); ?>" readonly>
                      </div>
                      </div>
                      
                  <div class="form-group col-md-12">
                  <?php $assetformqry = mysql_query("SELECT * FROM assetforms");
                            while ($formrow = mysql_fetch_array($assetformqry)) {
                            extract($formrow);

                       ?>
                    <label>
                    <?php echo $assetformname; ?>
                      <input type="radio" name="transactiontypeselect" id="typeselect" value="<?php echo $assetformsid; ?>" class="flat-red" />

                    </label>

                  <?php } ?>
                  <button id="radio_submit" type="button" class="btn btn-primary">Select</button>
                  
                  <p class="pull-right"><b>Date: <?php echo $date; ?></b>

                </p>
                </div>
                      <br><br><br><br>
                      <table class="table table-bordered">
                      <thead>
                      <th>Asset Code</th>
                      <th>Asset Description</th>
                      <th>Serial Number</th>
                      <th>Qty/Unit</th>
                      <th>Unit Cost</th>
                      <th>Total</th>
                      </thead>
                      <tbody>

                            <?php 
                $edittable=$_POST['selector'];
$N = count($edittable);
for($i=0; $i < $N; $i++)
{
  $result = mysql_query("SELECT * FROM inventory where assetid='$edittable[$i]'");
  while($row = mysql_fetch_array($result))
    {
      extract($row);
      ?>      <tr>
              <td><input value = "<?php echo $assetid; ?>" name="idasset[]" hidden></td>
              
              <td><?php echo $assetdesc; ?>

              <input value = "<?php echo $assetdesc; ?>" name="hiddendesc[]" hidden>
              </td>
              <td><?php echo $serialno ?></td>
              <td><select class="form-control" name="qtyunit[]" id="qtyunit<?php echo $assetid; ?>" onchange="calculate(<?php echo $assetid; ?>)"  required>
                      <?php
                      $qtyfirst = 0;
                    for($new = $qtyfirst ; $new <= $assetqty; $new++){
                       ?>
                      <option><?php echo $new; ?></option>
                      <?php
                    }
                         ?>
                         </select></td>

              <td><?php echo "₱".number_format((float)$purchaseprice, 2, '.', ','); ?><input class="form-control" type="hidden" name="uniquenum[]" value="<?php echo $uniqueasd++; ?>"></td>
              <input value = "<?php echo $purchaseprice; ?>" name="hiddencost[]" id="hiddencost<?php echo $assetid; ?>" hidden>
              <td><input class="form-control" name="totalcost[]" id="totalcost<?php echo $assetid; ?>" readonly></td>
              </tr>
                <?php 
              }
            }
                ?>

                </tbody>
                </table>
                                <div class="form-group">
                <label>Purpose/Reason</label>
                <input class="form-control" name="transactionreason[]">
                </div>
                <hr>
                <div id="formdata">


                </div>
                </div>
                  <div class="box-footer">
                  <input type="submit" class="btn btn-primary pull-right" name="transactnow" value="Submit">
                  </div>
              <?php include "transactioncreate.php"; ?>
                </form>
              </div><!-- /.box -->
              </div>
              </div>



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
    <!-- Page script -->
    <script type="text/javascript">
function calculate(id){
var quantity = document.getElementById('qtyunit'+id).value;
var price = document.getElementById('hiddencost'+id).value;
var sum = parseFloat(quantity).toFixed(2)*parseFloat(price).toFixed(2); 
document.getElementById('totalcost'+id).value = sum;
}
    </script>
    <script type="text/javascript">
$(document).ready(function(){
  $('#radio_submit').click(function(){
    var transactiontype = $('input:radio[id=typeselect]:checked').val();

    if(transactiontype != 0)
    {
      $.ajax({
        type:'post',
        url:'transact.php',
        data:{transactionid:transactiontype},
        cache:false,
        success: function(returndata){
          $('#formdata').html(returndata);
        }
      });
    }
  })
})

    </script>

    <script type="text/javascript">
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                  ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                  },
                  startDate: moment().subtract(29, 'days'),
                  endDate: moment()
                },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
  </body>
</html>
