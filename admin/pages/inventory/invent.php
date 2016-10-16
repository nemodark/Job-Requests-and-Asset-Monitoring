<?php
include "../../../session.php";
$_SESSION['username'] = $username; // Must be already set
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CSA-B General Services Office | Home</title>
    	<link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    	<link href="../../../bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    	<link href="../../../bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />

		<link href="../../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    	<link href="../../../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/dt/jqc-1.11.3,moment-2.10.6,dt-1.10.10,b-1.1.0,se-1.1.0/datatables.min.css">
		<link rel="stylesheet" type="text/css" href="css/generator-base.css">
		<link rel="stylesheet" type="text/css" href="css/editor.dataTables.min.css">

	</head>
	<body class="skin-blue sidebar-mini">
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

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><b>Department:</b> Property/Stock Custodian
                  <br><b>Location:</b> Engineering Bldg
                  <br><b>Phone:</b> 126
                  <input type="text" value="<?php echo $userid; ?>" id="userid">
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
			
			<table cellpadding="0" cellspacing="0" border="0" class="display" id="inventory" width="100%">
				<thead>
					<tr>
						<th>Room/Location</th>
						<th>Asset Category</th>
						<th>Asset Name</th>
						<th>Type</th>
						<th>Description</th>
						<th>Model</th>
						<th>Serial No.</th>
						<th>Date Purchase</th>
						<th>Supplier</th>
						<th>Purchase Price</th>
						<th>Lot/Qty</th>
						<th>Total</th>
						<th>Remarks</th>
						<th>Form #</th>
					</tr>
				</thead>
        <tbody>
          
        </tbody>
			</table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
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

	</body>
	    <script src="../../../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    	<script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/s/dt/jqc-1.11.3,moment-2.10.6,dt-1.10.10,b-1.1.0,se-1.1.0/datatables.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/dataTables.editor.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/table.inventory.js"></script>
		 <script src="../../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="../../../plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../dist/js/demo.js" type="text/javascript"></script>
</html>
