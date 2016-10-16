<?php
include "../../../session.php";
$_SESSION['username'] = $username;// Must be already set
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
    <link href="../../../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
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
  
  #addMats .modal-dialog  {width:800px;}

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
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-briefcase"></i> <span>Jobs</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu active">
                <li><a href="../requestform.php"><i class="fa fa-circle-o"></i> Request for Service</a></li>
                <li class="active"><a href="../jobrequests.php"><i class="fa fa-circle-o"></i> View All Jobs</a></li>
              </ul>
            </li>
            <li>
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
            Performance Evaluation
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
              
<form name="frmMain" method="post" action="">
<div class="box-body">
<p><b>Performance Rating Definitions</b><br><br>

  <div class="col-xs-1"><b>5</b></div><b>Outstanding</b> - Performance is consistently superior<br>

  <div class="col-xs-1"><b>4</b></div><b>Exceeds Expectations</b> - Performance is routinely above job requirements<br>

  <div class="col-xs-1"><b>3</b></div><b>Meets Expectations</b> - Performance is regularly competent and dependable<br>

  <div class="col-xs-1"><b>2</b></div><b>Below Expectations</b> - Performance fails to meet job requirements on a frequent basis<br>

  <div class="col-xs-1"><b>1</b></div><b>Unsatisfactory</b> - Performance is consistently unacceptable
</p>
<hr>
<?php
$jobid = $_GET['jobid'];
$query = "SELECT * FROM `jobassign` JOIN maintenanceprofile as maintenance ON jobassign.userid=maintenance.userid WHERE jobassign.jobid = $jobid ORDER BY jobassign.userid ASC";  
$result = mysql_query($query) or die('Query error:'.mysql_error());   
$num=mysql_num_rows($result);
$change="";
$i =0;
while($post = mysql_fetch_array($result))
{
  $i = $i + 1;
  extract($post);

    $page = html_entity_decode($post['userid']);
    $output = stripslashes($page);
    if ($output != "") {

      ?>
      <div class="form-group">
      <h3><?php echo ucfirst($fname)." ".ucfirst($lname); ?></h3>
      <hr>
      </div>

      <input type="hidden" name="hdnuserid[]" size="5" value="<?php echo $userid;?>">
      <input type="hidden" name="hdnjobassignid[]" size="5" value="<?php echo $jobassignid;?>">
      <div class="form-group">
      <div class="col-xs-1">
      <label>Quality</label>
      </div>
      <div class="col-xs-3">
      <p class="text-muted">Level of satisfactory output
generated per unit of time.</p>

      </div>
      <div class="col-xs-3">
      <select class="form-control" name="qlty[]" id="qlty<?php echo $output; ?>" onchange="calculate(<?php echo $output; ?>)"  required>
      <option>0</option>
      <option value="5">5</option>
      <option value="4">4</option>
      <option value="3">3</option>
      <option value="2">2</option>
      <option value="1">1</option>
      </select>
      </div>
      </div>
      <div class="col-xs-12">
<br>
      <hr>
      </div>
      <div class="form-group">
      <div class="col-xs-1">
      <label>Accuracy</label>
      </div>
      <div class="col-xs-3">
      <p class="text-muted">Absence of errors.</p>

      </div>
      <div class="col-xs-3">
      <select class="form-control" name="accu[]" id="accu<?php echo $output; ?>" onchange="calculate(<?php echo $output; ?>)"  required>
      <option>0</option>
      <option value="5">5</option>
      <option value="4">4</option>
      <option value="3">3</option>
      <option value="2">2</option>
      <option value="1">1</option>
      </select>
      </div>
      </div>
      <div class="col-xs-12">
<br>
      <hr>
      </div>
      <div class="form-group">
      <div class="col-xs-1">
      <label>Reliability</label>
      </div>
      <div class="col-xs-3">
      <p class="text-muted">Dependability and
trustworthiness.</p>

      </div>
      <div class="col-xs-3">
      <select class="form-control" name="relyon[]" id="relyon<?php echo $output; ?>" onchange="calculate(<?php echo $output; ?>)"  required>
      <option>0</option>
      <option value="5">5</option>
      <option value="4">4</option>
      <option value="3">3</option>
      <option value="2">2</option>
      <option value="1">1</option>
      </select>
      </div>
      </div>
      <div class="col-xs-12">
<br>
      <hr>
      </div>
      <div class="form-group">
      <div class="col-xs-1">
      <label>Stability</label>
      </div>
      <div class="col-xs-3">
      <p class="text-muted">Even temperament.
Acceptance of unavoidable
tension and pressure.</p>

      </div>
            <div class="col-xs-3">
      <select class="form-control" name="stable[]" id="stable<?php echo $output; ?>" onchange="calculate(<?php echo $output; ?>)"  required>
      <option>0</option>
      <option value="5">5</option>
      <option value="4">4</option>
      <option value="3">3</option>
      <option value="2">2</option>
      <option value="1">1</option>
      </select>
      </div>
      </div>
      <div class="col-xs-12">
<br>
      <hr>
</div>
      <div class="form-inline">
      <div class="col-xs-2">
      <label>Overall Rating: </label>
      </div>
      <div class="col-md-4">
      <input class="form-control" name="totalrate[]" id="totalrate<?php echo $output; ?>" readonly>
      </div>
      </div>
      <div class="col-xs-12">
<br>
      <hr>
<div class="form-group">
                      <label>Comment</label>
                      <span id="chars" class="pull-right"></span>
                      <textarea class="form-control" name="evalcomment[]" maxlength="500" id="textareaChars" rows="3" placeholder=""></textarea>
                      <span id="chars"></span>
                      <input type="hidden" name="requser" value="<?php echo $profileid; ?>"
                    </div>
                    <div  id="counter"></div>
                  </div>
      <?php
           } //creates tables for each filled entry with a name corrsponing to its auto-increment id.

}

?>
      </div>
      </div>
<div class="box-footer">
                  
<input type="submit" class="btn btn-primary pull-right" name="transact" value="Submit">
<input type="hidden" name="hdnLine" value="<?php echo $i;?>"><!--submit button is called "Mod"-->
</div>
</div>
</form>
              </div><!-- /.box -->
              </div>
              </div>

        </section><!-- /.content -->
        <?php
            date_default_timezone_set('Singapore');
            $date = date('m/d/Y h:i:s');
        error_reporting(0);
   if(isset($_POST['transact']))
{

  $idedit = $output;
  $N = count($idedit);
    $strNOW = mysql_query("UPDATE jobrequest SET `reqstatus` = 'jobfinished' WHERE jobid=$jobid") or die(mysql_error());

for($ct=0; $ct < $N; $ct++)
{
$qltyqry = addslashes($_POST['qlty'][$ct]);
$accuqry = addslashes($_POST['accu'][$ct]);
$relyqry = addslashes($_POST['relyon'][$ct]);
$stableqry = addslashes($_POST['stable'][$ct]);
$evalqry = addslashes($_POST['evalcomment'][$ct]);
$hdnuserqry = addslashes($_POST['hdnuserid'][$ct]);
$hdnjobidqry = addslashes($_POST['hdnjobassignid'][$ct]);
$totalqry = addslashes($_POST['totalrate'][$ct]);
//insert
$strNEW = mysql_query("UPDATE personnel SET `personnelstatus` = 'available' WHERE userid='".$hdnuserqry."'") or die(mysql_error());
$strongsql = mysql_query("INSERT INTO `jobreqevaluate`(`jobassignid`, `userid`, `jobid`, `reqevaluatedate`, `quality`, `accuracy`, `reliability`, `stability`, `comment`, `totalrate`) 
  VALUES ('".$hdnjobidqry."','".$hdnuserqry."','".$jobid."','".$date."','".$qltyqry."','".$accuqry."','".$relyqry."','".$stableqry."','".$evalqry."','".$totalqry."') ") or die("sss Error: ".mysql_error());
}
if($strongsql){
?>
       <script>
alert("Success!");
window.location.href = "../jobrequests.php";
</script>  
<?php
}
else{
  die(mysql_error());
}
}     
  ?>
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
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../plugins/jQuery/jquery-ui.min.js" type="text/javascript"></script>
 
    <script type="text/javascript">
    var maxLength = 500;
  $('#textareaChars$i').keyup(function() {
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
        <script type="text/javascript">
function calculate(id){
var ratequality = document.getElementById('qlty'+id).value;
var rateaccu = document.getElementById('accu'+id).value;
var raterely = document.getElementById('relyon'+id).value;
var ratestable = document.getElementById('stable'+id).value;
var sum = parseInt(ratequality,10)+parseInt(rateaccu,10)+parseInt(raterely,10)+parseInt(ratestable,10); 
document.getElementById('totalrate'+id).value = sum;
}
    </script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script type="text/javascript">
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="../../../plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../dist/js/demo.js" type="text/javascript"></script>
    
  </body>
</html>
