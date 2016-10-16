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
     <style type="text/css">
.dropdown:hover .dropdown-menu {
    display: block;
    margin-top: 0;
 }
    </style>
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
            <li>
              <a href="materials.php">
                <i class="fa fa-building-o"></i> <span>Materials</span>
              </a>
            </li>
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-users"></i> <span>Users</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="./users.php"><i class="fa fa-circle-o"></i> Head/Admin</a></li>
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
            Head/Admin
            <small>List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Head/Admin</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> 
  <a href="./profile/adduser.php" class="btn btn-default" id="adduserdrop">
    <i class="fa fa-user-plus"></i> Add Users</a>
                  
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <?php
                            $sql = mysql_query("SELECT * FROM `profiles` as prof JOIN `office` as o JOIN `positions` as pos WHERE prof.officeid=o.officeid AND prof.positionid = pos.positionid ORDER BY `datecreated` DESC") or die(mysql_error());
                            $result = mysql_num_rows($sql);

                            $num = '1';

                            if($result == '0'){
                            echo "<br>No Users<br>";
                            }else{

                                ?>
                  <table id="reqtable" class="table table-striped table-bordered table-hover dataTable no-footer">
                  
                  <thead>
                      <tr>
                        <th>Date Created</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php
    while($row = mysql_fetch_array($sql)){
      extract($row);
        $date= strtotime($datecreated);
        ?>
        <tr>
            <td><?php echo date("F d, Y h:i:s a", $date); ?></td>
            <td><?php echo ucfirst($fname); ?></td>
            <td><?php echo ucfirst($lname); ?></td>
            <td><?php echo ucfirst($position); ?></td>
            <td><?php echo ucfirst($officename); ?></td>
            <td>
            <a href ="./profile/profileview.php?profid=<?php echo $profileid; ?>" ><i class="fa fa-mail-forward"> View</i></a>
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
          <div id="addPos" class="modal fade" role="dialog">
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
        <th>office</th>
        <th>Position</th>
        <th></th>
      </tr>
      <!-- This is our clonable table line -->
      <tr class="hide">
        <td><select class="form-control" name="roomofc[]" id="roomofc">
        <?php

                              $rsql ="SELECT * FROM office";
                              $res = mysql_query($rsql);
                              while($rowr = mysql_fetch_array($res)){
                              extract($rowr);

                              echo "<option value=".$locationid.">".ucfirst($locationname)."</option>";
                            }
          
                            ?>
              </select></td>
        <td><input type="text" width="100%" class="form-control" name="posname[]"></td>
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
            $dateasd = date('m/d/Y h:i:s');
if(isset($_POST['addassetnow'])){
    extract($_POST);
    $N = count($assetcateg);
    for($i=1; $i < $N; $i++)
    {

  $itemtotal[$i] = $purchprice[$i] * $qtyitem[$i];
$insert = mysql_query("INSERT INTO `positions`(`officeid`, `position`, `positionpriv`) VALUES ('$invidsy', '$userid', '".addslashes($bldgloc[$i])."', '".addslashes($roomofc[$i])."','".addslashes($assetcateg[$i])."', '".addslashes($namedasset[$i])."', '".addslashes($itemtype[$i])."', '".addslashes($descitem[$i])."', '".addslashes($modelitem[$i])."', '".addslashes($serialitem[$i])."', '".addslashes($purchdate[$i])."', '".addslashes($suppitem[$i])."', '".addslashes($purchprice[$i])."', '".addslashes($qtyitem[$i])."', '".addslashes($itemtotal[$i])."', '".addslashes($itemremark[$i])."','$dateasd')") or die("Verification Error: " . mysql_error());

}
 if($insert)
          {
?>


<script type='text/javascript'>alert('Asset Added Successfully.'); window.location.href = 'invsystem.php?invsyid=<?php echo $invidsy; ?>';</script>
        <?php
        
            
        
    }
           else{
    echo "<script type='text/javascript'>alert('Record Already Exist!')</script>";
}

      }  

    ?>
  </div>
</div>
            </div><!-- /.col -->
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