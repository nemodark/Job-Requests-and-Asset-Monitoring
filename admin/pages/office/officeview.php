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
   <!-- Bootstrap 3.3.4 -->
    <link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="../../../bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="../../../bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
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
    </head>
    <body class="skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <?php
    include "../../../connection/connection.php";

    ?>
    <div class="wrapper">

      <?php include "nav.php"; ?>
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
                <li><a href="../jobrequests.php"><i class="fa fa-circle-o"></i> View All Jobs</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Inventory</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../inv.php"><i class="fa fa-circle-o"></i> All Assets</a></li>
                <li><a href="../locations.php"><i class="fa fa-circle-o"></i> Buildings</a></li>
              </ul>
            </li>
            <li class="active">
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
      <?php 
          $officeid = $_GET['officeid'];
         $sql = mysql_query("SELECT * FROM `office` WHERE officeid = '$officeid'") or die(mysql_error());
          while($row = mysql_fetch_array($sql)){
        extract ($row);

          $bdate = strtotime($birthdate);
          
        
          ?>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
                <section class="content-header">
          <h1>
            <?php
              echo ucfirst($officedescription);

                ?>
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Office</a></li>
            <li class="active"><?php echo $officename; ?></li>
          </ol>
        </section>
        <section class="content">
        <div class="row">

          <?php 
        }
            ?>
       
       <div class="col-xs-12">
          <div class="box box-solid">
          
          <div class="box-header">
          <h3>
             Details
              </h3>
               <div class="row no-print">
            <div class="col-xs-12">
              <a href="officeprint.php?officeid=<?php echo $officeid; ?>" target="_blank" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print</a>
            </div>
          </div>
            </div>

             <div class="box-body">
             <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
              <li class="active"><a href="#deptareas" role="tab" data-toggle="tab">Dept Areas</a></li>
              <li><a href="#expense" role="tab" data-toggle="tab">Expenses</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="deptareas">
                    <p class="lead"> 
             <b>
            Department Areas
            </b>
            <a href="#" class="btn btn-success pull-right" name="deptareaadd" data-toggle="modal" data-target="#addArea">Add Area</a>
            </p>
            <table id="reqtable" class="table table-bordered no-footer">
                  
                  <thead>
                      <tr>
                        <th>Area</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
            $deptareas = mysql_query("SELECT * FROM deptarea WHERE officeid='$officeid'") or die(mysql_error());
            $num = '1';
while($row = mysql_fetch_array($deptareas)){
            
              extract($row);
        ?>
        <tr>
            <td><?php echo $areaname; ?></td>
            <td><a href ="./areaview.php?deptareaid=<?php echo $deptareaid; ?>" ><i class="fa fa-mail-forward"> View</i></a></td>
            
        <?php
        $num++;
    }
?>
</tr>
</tbody>
</table>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="expense">
                         <p class="lead"> 
             <b>Expenses</b></p>
                                <table id="reqtable" class="table table-bordered no-footer">
                  
                  <thead>
                      <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
            $budgetnew = mysql_query("SELECT * FROM budgetcharge JOIN jobrequest ON budgetcharge.jobid=jobrequest.jobid WHERE budgetcharge.officeid='$officeid'") or die(mysql_error());
            $num = '1';

                            if($result == '0'){
                            echo "<br>No Record<br>";
                            }else{
            while($row = mysql_fetch_array($budgetnew)){
              extract($row);
              $datecharge = strtotime($chargedate);
        ?>
        <tr>
            <td><?php echo date("F d, Y", $datecharge); ?></td>
            <td><?php echo ucfirst($jobdesc); ?></td>
            <td><?php echo "₱".number_format((float)$chargeamount, 2, '.', ','); ?></td>
            
        <?php
        $num++;
    }
  }
?>
</tr>
</tbody>
</table>
                <?php 
                $abcd = mysql_query("SELECT ROUND(SUM(chargeamount), 2) as total from budgetcharge WHERE officeid=$officeid");
                while($row = mysql_fetch_array($abcd)){
                  extract($row);
                }


                ?>
                <table class="table">
                <?php 
                $abcd = mysql_query("SELECT ROUND(SUM(chargeamount), 2) as total from budgetcharge WHERE officeid=$officeid");
                while($row = mysql_fetch_array($abcd)){
                  extract($row);
                


                ?>
                  <tr>
                    <th style="width:50%">Total Expense:</th>
                    <td><?php echo "₱".number_format((float)$total, 2, '.', ','); ?></td>
                  </tr>
                  <?php
                }
                  ?>
                </table>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
              

  <div id="addArea" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Area</h4>
      </div>
      <form role="form" name="syform" method="post" action="">
      <div class="modal-body">
        
  <div id="tableadd" class="table-editable">
    <span class="table-add glyphicon glyphicon-plus"></span>
    <table class="table">
      <tr>
        <th>Bldg</th>
        <th>Area Name</th>
        <th></th>
      </tr>
      <!-- This is our clonable table line -->
      <tr class="hide">
      <td><select class="form-control" width="100%" name="bldgloc[]" id="bldgloc">
                            <?php

                              $saql ="SELECT * FROM schoolbldg";
                              $result = mysql_query($saql);
                              while($row = mysql_fetch_array($result)){
                              extract($row);

                              echo "<option value=".$schoolbldgid.">".ucfirst($schoolbldgname)."</option>";
                            }
          
                            ?>
              </select></td>
        <td><input type="text" width="100%" class="form-control" name="areanameadd[]"></td>
        <td>
          <span class="table-remove glyphicon glyphicon-remove"></span>
        </td>
      </tr>
    </table>
  </div>         
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="addareanow"><i class="fa fa-check"></i> Submit</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-close" ></i> Cancel</button>
      </div>
      </form>
    </div>
<?php
//Open a new connection to the MySQL server
$officeidnow= $_GET['officeid'];
date_default_timezone_set('Singapore');
            $dateasd = date('m/d/Y h:i:s');
if(isset($_POST['addareanow'])){
    extract($_POST);
    $N = count($areanameadd);
    for($i=1; $i < $N; $i++)
    {
$insert = mysql_query("INSERT INTO `deptarea`(`officeid`, `schoolbldgid`, `areaname`) VALUES ('$officeidnow','".addslashes($bldgloc[$i])."', '".addslashes($areanameadd[$i])."')") or die("Verification Error: " . mysql_error());

}
 if($insert)
          {
?>


<script type='text/javascript'>alert('Area Added Successfully.'); window.location.href = 'officeview.php?officeid=<?php echo $officeidnow; ?>';</script>
        <?php
        
            
        
    }
           else{
    echo "<script type='text/javascript'>alert('Record Already Exist!')</script>";
}

      }  

    ?>
  </div>
</div>
           
          </div>

       </div>
       
      

       </div>
           </section>

        </div>
<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2015-Present CSAB CSIT.</strong> All rights reserved.
      </footer>

      </div>

          
    <script src="../../../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    var maxLength = 200;
  $('#textareaChars').keyup(function() {
  var length = $(this).val().length;
  var length = maxLength-length;
  $('#chars').text(length+" characters remaining");
  if(length <= 10)
    {
        $("#chars").css("color","red");
    }
    else
    {
        $("#chars").css("color","green");
    }
});


    </script>
    <script src="../../../dist/js/timeago.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="../../../plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <script src="../../plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../dist/js/demo.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(function() {
        $('#reqtable').DataTable(

          );

    });
    </script>
  </script>
        <script type="text/javascript">
function calculate(){
var quantity = document.getElementById('qtyupdate').value;
var price = document.getElementById('priceupdate').value;
var sum = parseInt(quantity)*parseInt(price); 
document.getElementById('totalcostupdate').value = sum;
}
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