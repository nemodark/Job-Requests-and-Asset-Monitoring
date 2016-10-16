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
          <div class="user-panel">
            <div class="pull-left image">
              <img src="image.php?userid=<?php echo $userid ?>" alt="Image not found" onError="this.onerror=null;this.src='../images/csab.png';" />
            </div>
            <div class="pull-left info">
              <p><?php
                          echo ucfirst($fname)." ".ucfirst($lname);
                       ?></p>
             <small> <i class="fa fa-circle text-success"></i> <?php
             $pos = mysql_query("SELECT * FROM positions WHERE positionid = $positionid");
             while ($row = mysql_fetch_array($pos)) {
               # code...
              extract($row);
              echo ucfirst($position);
              }?></small>

            </div>
          </div>
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
            <li><a href="./profile/profile.php"><i class="fa fa-user"></i> <span>Profile</span></a></li>
            <li><a href="jobrequests.php"><i class="fa fa-briefcase"></i> <span>Jobs</span></a></li>
            <li class="active"><a href=""><i class="fa fa-users"></i> <span>Personnel</span></a></li>
            <li><a href="materials.php"><i class="fa fa-building"></i> <span>Materials</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Maintenance
            <small>Personnel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Personnel</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> 
                  <a href="./profile/addpersonnel.php" class="btn btn-primary" type="button"><i class="fa fa-user-plus"></i> Add Personnel</a>
                  
                  
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <?php
                            $sql = mysql_query("SELECT * FROM `maintenanceprofile` as prof JOIN `personnel` as o  WHERE prof.userid=o.userid ORDER BY `dateadded` DESC") or die(mysql_error());
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
                        <th>Status</th>
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
            <td><?php echo date("F d, Y", $date); ?></td>
            <td><?php echo ucfirst($fname); ?></td>
            <td><?php echo ucfirst($lname); ?></td>
            <td><?php echo ucfirst($personneltype); ?></td>
            <td><?php 
            switch ($personnelstatus) {
                                        case "available":
                                        echo "<small class='label label-success'>Available</small>";
                                        break;
                                        case "working":
                                        echo "<small class='label label-info'>Working</small>";
                                        break;
                                        case "absent":
                                        echo "<small class='label label-success'>Not Available</small>";
                                        break;
                                        }

            ?></td>
            <td>
            <a href ="./profile/personnelview.php?profid=<?php echo $userid; ?>" ><i class="fa fa-mail-forward"> View</i></a>
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