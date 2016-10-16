<?php
include "../../session.php";
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
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="../../bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="../../bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="../../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../../plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../../plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../../plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="../../plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
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
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-briefcase"></i> <span>Jobs</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu active">
                <li><a href="./requestform.php"><i class="fa fa-circle-o"></i> Request for Service</a></li>
                <li class="active"><a href="./jobrequests.php"><i class="fa fa-circle-o"></i> View All Jobs</a></li>
              </ul>
            </li>
            <li>
              <a href="inv.php">
                <i class="fa fa-table"></i> <span>Inventory</span>
              </a>
            </li>
            <li>
              <a href="offices.php">
                <i class="fa fa-coffee"></i> <span>Dept/Offices</span>
              </a>
            </li>
            <li>
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
      <?php 
          $jobid = $_GET['jobid'];
          $jobquery = mysql_query("SELECT * FROM `jobrequest` as job JOIN `profiles` as prof JOIN `office` as o WHERE job.profileid=prof.profileid and prof.officeid=o.officeid and job.jobid=$jobid ")or die(mysql_error());
          while($row = mysql_fetch_array($jobquery)){
        extract ($row);
                $status=$reqstatus;
                
                    
        
          ?>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="col-md-11">
        <section class="content-header">
        
          <h1>
            <?php echo ucfirst($jobname); 
             ?>
            
          </h1>

          <h4><small><i class="fa fa-clock-o"></i> Posted 
          <?php
          include "timeago.php";
            echo time_ago($jobdatereq);
         ?></small>

         </h4>
         
        </section>
        </div>

        <section class="content">
        
        

          <!-- title row -->
          <div class="col-lg-8">
          <div class="box box-solid">
          <div class="box-header with-border">
          <h4>
              Details
              <?php
              switch ($status) {
                                        case "pending":
                                        echo "<small class='label label-warning pull-right'>Pending</small>";
                                        break;
                                        case "approved":
                                        echo "<small class='label label-success pull-right'>Approved</small>";
                                        break;
                                        }
                ?>
              </h4>
            </div>
             <div class="box-body">
              <p> <?php echo $jobdesc; ?> </p>
              </div>

         
            <div class="box-header with-border">
            </div>
            <div class="box-header with-border">
            hello
            </div>
          </div>
       </div>
       <div class="col-md-3">
        <div class="box box-solid">
                <div class="box-header with-border">
                  <h4 class="box-title">
                  <button class="btn btn-block btn-success btn-flat pull-right">Assign Personnel</button>
          <button class="btn btn-block btn-info btn-flat pull-right">Update Request</button>
          <button class="btn btn-block btn-danger btn-flat pull-right">Delete Request</button></h4>
                </div>
                <div class="box-body">
                  <!-- the events -->
                  <h4>About the Office</h4><br>
                  
                  <p><?php echo $officedescription; ?></p>

                </div>
              </div>

          </div>
       </section>

          <?php 
        }
            ?>
          
        </div>

       </div>
          

    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>

    <script src="../../dist/js/timeago.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js" type="text/javascript"></script>
  
    </body>
</html>