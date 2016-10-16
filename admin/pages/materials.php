<?php
include "../../session.php";
$_SESSION['username'] = $username; // Must be already set
date_default_timezone_set('Singapore');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CSA-B General Services Office | Home</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="../../bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="../../bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="../../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="../../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

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
    include "../../connection/connection.php";

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
            <li><a href="../home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-briefcase"></i> <span>Jobs</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="./requestform.php"><i class="fa fa-circle-o"></i> Request for Service</a></li>
                <li><a href="./jobrequests.php"><i class="fa fa-circle-o"></i> View All Jobs</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Inventory</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="inv.php"><i class="fa fa-circle-o"></i> All Assets</a></li>
                <li><a href="locations.php"><i class="fa fa-circle-o"></i> Buildings</a></li>
              </ul>
            </li>
            <li>
              <a href="offices.php">
                <i class="fa fa-coffee"></i> <span>Dept/Offices</span>
              </a>
            </li>
            <li class="active">
              <a href="materials.php">
                <i class="fa fa-building-o"></i> <span>Materials</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Users</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="./users.php"><i class="fa fa-circle-o"></i> Head/Admin</a></li>
                <li><a href="./personnel.php"><i class="fa fa-circle-o"></i> Personnel</a></li>
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
            Material Request
            <small>List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Offices/Departments</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title pull-right">
                  <a type="button" class="btn btn-primary" href="./mats/addmats.php"><i class="fa fa-briefcase"></i> Add Materials</a>
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <?php
                        date_default_timezone_set('Singapore');
                        $date = date('Y');

                        $syto >= $date;
                            $sql = mysql_query("SELECT * FROM `materials` as mats JOIN maintenanceprofile as maintprof ON mats.userid = maintprof.userid JOIN jobrequest as job ON mats.jobid = job.jobid
                                                JOIN profiles as prof ON job.profileid=prof.profileid JOIN office ON prof.officeid=office.officeid") or die(mysql_error());
                            $result = mysql_num_rows($sql);

                            $num = '1';

                            if($result == '0'){
                            echo "<br>No Materials<br>";
                            }else{

                                ?>
                  <table id="reqtable" class="table table-striped table-bordered table-hover dataTable no-footer">
                  
                  <thead>
                      <tr>
                        <th>Date Requested</th>
                        <th>Material Name</th>
                        <th>Requested by</th>
                        <th>Quantity/Unit</th>
                        <th>Cost</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php
    while($row = mysql_fetch_array($sql)){
      extract($row);
        $date= strtotime($materialreqdate);
        $newdate = strtotime($dateneeded);
        ?>
        <tr>
            <td><?php echo date("F d,Y h:i:s a", $date); ?></td>
            <td><?php echo ucfirst($materialname); ?></td>
            <td><?php echo ucfirst($fname)." ".ucfirst($lname); ?></td>
            <td><?php echo $materialqty." ".$qtyunit; ?></td>
            <td><?php  echo "₱".number_format((float)$materialcost, 2, '.', ',');  ?></td>
            <td><?php echo "₱".number_format((float)$subtotal, 2, '.', ',');  ?></td>
           
            <td>
            <a href="jobview/matsedit.php?key=<?php echo $materialid; ?>"><i class="fa fa-pencil-square-o"> Edit</i></a>
            <a href="mats/delete.php?key=<?php echo $materialid; ?>"  onclick="return Con()"><i class="fa fa-trash-o"> Delete</i></a></td>
            </td>

        <?php
        $num++;
    }
}       
?>
                      </tr>
                    </tbody>
                  </table>

  <div id="jobreqmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="something">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
      
        <div id="reqcontent"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </div>
  </div>
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

          <script src="../../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
          <script>
    function Con(){
        var con = confirm("Are you sure you want to Delete this record?");

        if(con){
            return true;
        }else{
            return false;
        }
    }
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->

             <script type="text/javascript">
    $(function() {
        $('#reqtable').DataTable(

          );

    });
    </script>

    <!--<script>
      function reqmodal(id){
        var datastring = 'requestid=' + id + '&action=getContent';
        $('#jobreqmodal').modal('show');
        $.ajax({
          type: 'POST',
          data: datastring,
          url: 'crud.php',
          sucess: function(result){
            alert('asdas');
          }
        });
      }
      </script>-->
 
  </body>
</html>