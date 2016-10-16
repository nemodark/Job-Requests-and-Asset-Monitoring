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
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-table"></i> <span>Inventory</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="inv.php"><i class="fa fa-circle-o"></i> All Assets</a></li>
                <li class="active"><a href="locations.php"><i class="fa fa-circle-o"></i> Buildings</a></li>
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
            Office/Department/Areas
            <small>List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Offices/Departments/Areas</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                  <br><b>Location:</b> <?php
                  $schoolbldgid = $_GET['schoolbldgid'];
                  $locationsql = mysql_query("SELECT * FROM `schoolbldg` WHERE schoolbldgid = '$schoolbldgid'") or die(mysql_error());
                            while($locrow = mysql_fetch_array($locationsql)){
                              echo $locrow['schoolbldgname'];

                            }
                   ?>
                  </h3>
                  <h3 class="box-title pull-right">
                  <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addOffice"><i class="fa fa-building-o"></i> Add Office/Dept</a>
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <?php
                  
                        date_default_timezone_set('Singapore');
                        $date = date('Y');

                        $syto >= $date;
                            $sql = mysql_query("SELECT * FROM `invlocation` WHERE schoolbldgid = '$schoolbldgid'") or die(mysql_error());
                            $result = mysql_num_rows($sql);

                            $num = '1';

                            if($result == '0'){
                            echo "<br>No Data<br>";
                            }else{

                                ?>
                  <table id="areatable" class="table table-striped table-bordered table-hover dataTable no-footer">
                  
                  <thead>
                      <tr>
                        <th>Name</th>
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
            <td><?php echo ucfirst($locationname); ?></td>
            <td>
            <a href ="./areainv.php?locationid=<?php echo $locationid; ?>" ><i class="fa fa-mail-forward"> View</i></a>
            </td>
        <?php
        $num++;
    }
}       
?>
                      </tr>
                    </tbody>
                  </table>


  <div id="addOffice" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Office/Area</h4>
      </div>
      <form role="form" method="post" action="">
      <div class="modal-body">
  <div id="tableadd" class="table-editable">
    <span class="table-add glyphicon glyphicon-plus"></span>
    <table class="table">
      <tr>
        <th>Bldg/Location</th>
        <th>Office/Area Name</th>
      </tr>
      <!-- This is our clonable table line -->
      <tr class="hide">
      <td>
        <?php
          $bldgqry = mysql_query("SELECT * FROM schoolbldg WHERE schoolbldgid = '$schoolbldgid'");
          while ($rowbldg = mysql_fetch_array($bldgqry)) {
            echo $rowbldg['schoolbldgname'];
            # code...
          }
         ?></td>
        <td><input type="text" width="100%" class="form-control" name="locationname[]"></td>
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
date_default_timezone_set('Singapore');
            $date = date('m/d/Y h:i:s');
if(isset($_POST['addareanow'])){
    $c = 1;
    $schoolbldgidnew = $_GET['schoolbldgid'];
    extract($_POST);

    
 While($c<sizeof($locationname))
 {
$insertarea = mysql_query("INSERT INTO `invlocation`(`schoolbldgid`, `locationname`) VALUES ('".addslashes($schoolbldgidnew)."','".addslashes($locationname[$c])."')") or die("Verification Error: " . mysql_error());

 $c++;
}
 if($insertarea)
          {
?>
        <script type='text/javascript'>alert('Office successfully added.'); window.location.href = './areas.php?schoolbldgid=<?php echo $schoolbldgid; ?>';</script>
        
            
       <?php 
    }
           else{
    echo "<script type='text/javascript'>alert('Building Already Exist!')</script>";
}

      }  

    ?>
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
        $('#areatable').DataTable(

          );

    });
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