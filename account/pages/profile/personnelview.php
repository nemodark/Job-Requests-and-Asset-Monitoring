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
            <li><a href="../../home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="profile.php"><i class="fa fa-user"></i> <span>Profile</span></a></li>
            <li><a href="../jobrequests.php"><i class="fa fa-briefcase"></i> <span>Jobs</span></a></li>
            <li class="active"><a href="../personnel.php"><i class="fa fa-users"></i> <span>Personnel</span></a></li>
            <li><a href="../materials.php"><i class="fa fa-building"></i> <span>Materials</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <?php 
          $profid = $_GET['profid'];
         $sql = mysql_query("SELECT * FROM `maintenanceprofile` as prof JOIN `office` as o JOIN personnel as person ON prof.officeid=o.officeid AND person.userid=prof.userid WHERE prof.userid = $profid") or die(mysql_error());
          while($row = mysql_fetch_array($sql)){
        extract ($row);

          $bdate = strtotime($birthdate);
          
        
          ?>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content">
        <div class="row">
        
        

          <!-- title row -->
          <div class="col-xs-12">
          <div class="box box-solid">
          <div class="box-header with-border">
          <div class="col-xs-8">
          <h2>
              
              <?php
              echo "<img src='image.php?userid=$userid' class='img' WIDTH='144' HEIGHT='144' alt='No Image to Display'  /> ";

                ?>
                </h2>
                </div>
                <div class="col-xs-3">
                <h2>
                <img src='../../../images/csab.png' class='img pull-right' WIDTH='144' HEIGHT='144' alt='No Image to Display'  /> 

                </h2>
                <h5 class="pull-right">
        <?php 
        echo $officedescription;
        ?>
        </h5>
                </div>
        <div class="col-xs-9" style="margin-top: -10px;">
        <h2>
        <?php
        echo ucfirst($fname)." ".ucfirst($lname); 
        ?>
        </h2>
        </div>
        <div class="col-xs-3" style="margin-top:30px;">
        <div class="form-inline">
        </div>
        </div>
                            
            

              </div>
            
         
            
          </div>
          </div>

       
       <div class="col-xs-12">
          <div class="box box-solid">
          <div class="box-header with-border">
          <div class="col-sm-4">
          <h3>
             User Info
              </h3>
          </div>
            </div>
             <div class="box-body"> 
              <div class="col-sm-7">
              <p><b>Email Address</b></p>
              <p class="lead">  <?php echo $email; ?></p>
              <p><b>Phone #</b></p>
              <p class="lead">  <?php echo $phone; ?></p>
              </div>
              <div class="col-sm-5">
              <p><b>Birthdate</b></p>
              <p class="lead">  <?php echo date("F d, Y", $bdate); ?></p>
              <p><b>Gender</b></p>
              <p class="lead">  <?php echo $gender; ?></p>
              </div>
              </div>

         
            
          </div>
       </div>
       

          <div class="col-xs-12">
          <div class="box box-solid">

          <div class="box-header with-border">
           <ul class="nav nav-tabs">
                            <li class="active"><a  href="#taskassigned" data-toggle="tab">Task Assigned/Done</a></li>
                            <li><a href="#matsreq" data-toggle="tab">Materials Requested</a></li>
                            <li><a href="#evaluate" data-toggle="tab">Evaluation</a></li>
                        </ul>

            </div>
        <div class='tab-content'>
                        <div class='tab-pane fade in active' id='taskassigned'>                
          <div class="col-sm-4">
          <h3>
             Task Assigned/Done
              </h3>
          </div>
             <div class="box-body"> 
             <?php
                            $sql = mysql_query("SELECT * FROM `jobassign` JOIN `jobrequest` ON jobassign.jobid=jobrequest.jobid WHERE jobassign.userid='$profid'") or die(mysql_error());
                            $result = mysql_num_rows($sql);

                            $num = '1';

                            if($result == '0'){
                            echo "<br>No Assigned Task<br>";
                            }else{

                                ?>
                  <table id="reqtable" class="table table-striped table-bordered table-hover dataTable no-footer">
                  
                  <thead>
                      <tr>
                        <th>Date Assigned</th>
                        <th>Job Name</th>
                        <th>Finish Date</th>
                        <th>Job Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php
    while($row = mysql_fetch_array($sql)){
      extract($row);
        $date= strtotime($assigndate);
        $datefin = strtotime($finishdate)
        ?>
        <tr>
            <td><?php echo date("F d, Y", $date); ?></td>
            <td><?php echo ucfirst($jobname); ?></td>
            <td><?php echo date("F d, Y", $datefin); ?></td>
            <td><?php 
            switch ($reqstatus) {
                                        case "pending":
                                        echo "<small class='label label-warning'>Pending</small>";
                                        break;
                                        case "personnel":
                                        echo "<small class='label label-info'>Under Evaluation</small>";
                                        break;
                                        case "work":
                                        echo "<small class='label label-warning'>Working</small>";
                                        break;
                                        case "materials":
                                        echo "<small class='label label-warning'>Materials Request</small>";
                                        break;
                                        case "purchase":
                                        echo "<small class='label label-primary'>Processing Materials</small>";
                                        break;
                                        case "ready":
                                        echo "<small class='label label-info'>Materials Ready</small>";
                                        break;
                                        case "charged":
                                        echo "<small class='label label-warning'>Working</small>";
                                        break;
                                        case "done":
                                        echo "<small class='label label-success'>Accomplished</small>";
                                        break;
                                        }

            ?></td>
            <td>
            <a href ="../jobview/jobview.php?jobid=<?php echo $jobid; ?>" ><i class="fa fa-mail-forward"> View</i></a>
            </td>
        <?php
        $num++;
    }
}       
?>
                      </tr>
                    </tbody>
                  </table>
              </div>
              </div>
                        <div class='tab-pane fade in' id='matsreq'>                
          <div class="col-sm-4">
          <h3>
             Materials Requested
              </h3>
          </div>
             <div class="box-body"> 
             <?php
                            $sql = mysql_query("SELECT * FROM `materials` JOIN `jobrequest` ON materials.jobid=jobrequest.jobid WHERE materials.userid='$profid'") or die(mysql_error());
                            $result = mysql_num_rows($sql);

                            $num = '1';

                            if($result == '0'){
                            echo "<br>No Assigned Task<br>";
                            }else{

                                ?>
                  <table id="reqtable" class="table table-striped table-bordered table-hover dataTable no-footer">
                  
                  <thead>
                      <tr>
                        <th>Date Requested</th>
                        <th>Material Name</th>
                        <th>Qty/Unit</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php
    while($row = mysql_fetch_array($sql)){
      extract($row);
        $date= strtotime($materialreqdate);
        $datefin = strtotime($dateneeded)
        ?>
        <tr>
            <td><?php echo date("F d, Y", $date); ?></td>
            <td><?php echo ucfirst($materialname); ?></td>
            <td><?php echo $materialqty." ".$qtyunit; ?></td>
            <td><?php 
            switch ($materialstatus) {
                                        case "request":
                                        echo "<span class='label label-warning'>Pending Request</span>";
                                        break;
                                        case "authorize":
                                        echo "<span class='label label-info'>Authorized</span>";
                                        break;
                                        case "approve":
                                        echo "<span class='label label-success'>Approved</span>";
                                        break;
                                        case "process":
                                        echo "<span class='label label-primary'>Processing</span>";
                                        break;
                                        case "deliver":
                                        echo "<span class='label label-info'>Delivered</span>";
                                        break;
                                        }

            ?></td>
        <?php
        $num++;
    }
}       
?>
                      </tr>
                    </tbody>
                  </table>
              </div>
              </div>
              </div>

         
            
          </div>
       </div>


          
      <div id="profpic" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Profile Picture</h4>
      </div>        
      <form action="upload.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
      <img id="blah" WIDTH='144' HEIGHT='144' class="img" src="#" alt="your image"/>
      <br>
      <?php $newid=$profid; ?>
    <input type="file" class="btn" name="fileToUpload" id="fileToUpload">
    

      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn-success" value="Upload Image" name="submit">
      </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

       </div>
           </section>

        </div>

        
                           <?php 
        }
            ?>
                  <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2015-Present CSAB CSIT.</strong> All rights reserved.
      </footer>
            </div>



    <script src="../../../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#fileToUpload").change(function(){
    readURL(this);
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
  
    </body>
</html>