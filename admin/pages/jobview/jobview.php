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
      <?php 


          $jobid = $_GET['jobid'];
                  $logid = $userid;
          $jobquery = mysql_query("SELECT * FROM `jobrequest` as job JOIN `profiles` as prof JOIN `office` as o WHERE job.profileid=prof.profileid and prof.officeid=o.officeid and job.jobid=$jobid ")or die(mysql_error());
          while($row = mysql_fetch_array($jobquery)){
        extract ($row);
                $status=$reqstatus;
                $requestfname  = $fname;
                $requestlname = $lname;
          ?>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="col-md-11">
        <section class="content-header">
         
        </section>
        </div>
        <section class="content">
        <div class="row">
        

          <!-- title row -->
          <div class="col-xs-12">
          <div class="box box-solid">
          <div class="box-header">
          <div class="col-md-9">

            <p class="lead"><b>  Description </b>
              <?php
              switch ($status) {
                                        case "pending":
                                        echo "<small class='label label-warning pull-right'>Pending</small>";
                                        break;
                                        case "personnel":
                                        echo "<small class='label label-info pull-right'>Under Evaluation</small>";
                                        break;
                                        case "work":
                                        echo "<small class='label label-success pull-right'>".$evaluationcode."</small>";
                                        break;
                                        case "materials":
                                        echo "<small class='label label-warning pull-right'>Materials Request</small>";
                                        break;
                                        case "purchase":
                                        echo "<small class='label label-primary pull-right'>Processing Materials</small>";
                                        break;
                                        case "ready":
                                        echo "<small class='label label-warning pull-right'>Materials Ready</small>";
                                        break;
                                        case "charged":
                                        echo "<small class='label label-success pull-right'>".$evaluationcode."</small>";
                                        break;
                                        case "charged":
                                        echo "<small class='label label-success pull-right'>".$evaluationcode."</small>";
                                        break;
                                        }
                ?></p>

                <hr>
                <h4><p> <?php echo $jobdesc; ?> </p></h4>
                <hr>
                <h4><p><b>Purpose:</b> <?php echo $jobpurpose; ?> </p></h4>
                </div>

                <div class="col-md-3">
                <?php switch ($status) {
                                        case "pending":
                                        echo "<button class='btn btn-block btn-success btn-flat pull-right' data-toggle='modal' data-target='#assignmodal'>Assign Personnel for Evaluation</button>";
                                        break;
                                        case "personnel":
                                        echo "<button class='btn btn-block btn-primary btn-flat pull-right' data-toggle='modal' data-target='#assignjob'>Select Job Type</button>";
                                        break;
                                        case "work":
                                          echo "<button class='btn btn-block btn-success btn-flat pull-right' data-toggle='modal' data-target='#addmats'>Add Materials for Job</button>";
                                          break;
                                        case "purchase":
                                        echo "<button class='btn btn-block btn-warning btn-flat pull-right'disabled>Processing</button>";
                                        break;
                                        case "ready":
                                        echo "<button class='btn btn-block btn-warning btn-flat pull-right'disabled>Working</button>";
                                        break;
                                        case "charged":
                                        ?>
                  <CENTER>
                  <button data-toggle='modal' data-target='#addsched' class="btn btn-danger btn-flat" id="schedule" name="schedule"><i class="fa fa-clock-o"></i> Set Schedule</button>
                  </CENTER>

                  <?php
                  break;
                                   case "begin":
                  ?>
                  <p class="lead">Schedule:<br>
                  <?php
                  $schedsql=mysql_query("SELECT * FROM jobschedule WHERE jobid=$jobid");
                  while($rownew = mysql_fetch_array($schedsql)){
                    extract($rownew);
                    $startsched = strtotime($startschedule);
                    $estimatefinish = strtotime($estimatefinishsched);
                    echo date("m/d/Y", $startsched)." - ".date("m/d/Y", $estimatefinish);
                  }
                  ?></p>


                  <CENTER>
                   <form role="form" method="post" action="">
                  <button type="submit" class="btn btn-success btn-flat" id="finjob" name="finjob"><i class="fa fa-check"></i> Finish Job</button>
                  </form>
                  </CENTER>
                  <?php
                  break;
                case "forpersonevaluation":
                  ?>
                  <p class="lead">Date Started/Finished:<br>
                  <?php
                  $schedsql=mysql_query("SELECT * FROM jobschedule WHERE jobid=$jobid");
                  while($rownew = mysql_fetch_array($schedsql)){
                    extract($rownew);
                    $startsched = strtotime($startschedule);
                    $findate = strtotime($finishdate);
                    $estimatefinish = strtotime($estimatefinishsched);
                    echo date("m/d/Y", $startsched)." - ".date("m/d/Y", $findate)."<br>";
                    $diff = $estimatefinish - $findate;
                    $days = floor($diff/(3600*24));
                    echo "The job was finished ".$days." days earlier";
                  }
                  ?>
                  <CENTER>
                  <button data-toggle='modal' data-target='#evaluatecode' class="btn btn-info btn-flat" id="schedule" name="schedule"><i class="fa fa-edit"></i> Evaluate Task</button>
                  </CENTER>
                  <?php
                  break;
                   ?></p>
                                        <?php
                                        case "work":
                                        switch($jobtype) {
                                          case "heavyrep":
                                          ?>
                                          <a href="#" class="btn btn-block btn-success btn-flat pull-right" data-toggle="modal" data-target="#addMats">Add Materials</a>
                                          <?php
                                          break;
                                          case "repminimum":
                                          echo "<button class='btn btn-block btn-primary btn-flat pull-right'disabled>Working</button>";
                                          break;
                                          case "construct":
                                          ?>
                                          <a href="#" class="btn btn-block btn-success btn-flat pull-right" data-toggle="modal" data-target="#addMats">Add Materials</a>
                                          <?php
                                          break;
                                  

                                        }
                                        break;

                                        }
                ?>
          
          </div>
          <div class="col-md-3 pull-right">
          <br>
          <CENTER>
                            <p><b>Assigned to:</b>
                  <?php 
                  $personquery = mysql_query("SELECT * FROM `personnel` JOIN maintenanceprofile as profiles JOIN jobassign WHERE profiles.userid = jobassign.userid AND personnel.userid = profiles.userid AND jobassign.jobid='$jobid'")or die(mysql_error());
                  $numrowsperson = mysql_num_rows($personquery);
                  if($numrowsperson == '0'){
                            echo "No Assigned Personnel";
                            }
                  else{
                    while($rowperson = mysql_fetch_array($personquery)){
                    extract ($rowperson);
                    $maintrequest = $userid;
                    echo ucfirst($fname)." ".ucfirst($lname)." (".ucfirst($personneltype).")";
                  }
                }
                  
                   ?>
                   </p>
                   <p><b>Job Type:</b>
                  <?php 
                  $jobtypequery = mysql_query("SELECT * FROM `jobrequest` WHERE jobid='$jobid'")or die(mysql_error());
                  $numrowjobtype = mysql_num_rows($jobtypequery);
                  if($numrowjobtype == '0'){
                            echo "Job Type not selected.";
                            }
                  else{
                    while($newjobtype = mysql_fetch_array($jobtypequery)){
                    extract ($newjobtype);
                    $maintrequest = $userid;
                    switch ($jobtype) {
                      case 'repminimum':
                        echo "Minimum Repair";
                        break;
                      case 'heavyrep':
                        echo "Heavy Repair";
                        break;
                        case 'construct':
                        echo "Construction";
                        break;
                      default:
                        # code...
                        break;
                    }
                  }
                }
                  
                   ?></p>
                   </CENTER>
          </div>
            </div>
             <div class="box-body">
              <div class="col-md-9">
              <hr>
                  
                  <p><b>Requested By:</b> <?php echo ucfirst($requestfname)." ".ucfirst($requestlname); ?></p>
                  <p><b>Dep't/Office:</b> <?php echo $officedescription; ?></p>
<p><b>Approved by:</b> <?php
                  $approvesql = mysql_query("SELECT * FROM `jobapprove` JOIN `profiles` JOIN `users` WHERE users.userid = jobapprove.userid AND profiles.userid = jobapprove.userid AND jobapprove.jobid = '$jobid'");
                  
                  while ($rowapprove = mysql_fetch_array($approvesql)){

                   echo "Fr. ".$rowapprove['fname']." ".$rowapprove['lname'].", OSA"; 
                   }?></p>
                   </div>
                   <div class="box-header with-border">
                   </div>
                       <?php 
                      switch($jobtype) {
                                          case "heavyrep":
                                          ?>

                <div class="box-header with-border">
                  <h3 class="box-title">Materials Needed </h3>
                                    <?php 
                   $authenticate = mysql_query("SELECT * FROM `materials` WHERE jobid = $jobid LIMIT 1")or die(mysql_error());
          while($row = mysql_fetch_assoc($authenticate)){
           extract ($row);
                           
                   switch ($materialstatus) {
                  case "request":
                                        ?>
                  <form role="form" method="post" action="">
                  <input type="submit" class="btn btn-primary btn-flat pull-right" id="heavyauth" name="heavyauth" value="Authorize Purchase Request">
                  </form>
                  <?php
                  break;
                  
                                        ?>
                  <?php

                }
              }
                  ?>
                </div><!-- /.box-header -->
                  <?php
                            $mats = mysql_query("SELECT * FROM `materials` WHERE jobid = $jobid") or die(mysql_error());
                            $result = mysql_num_rows($mats);

                            $num = '1';

                            if($result == '0'){
                            echo "<br>No Materials<br>";
                            }else{

                                ?>
                  <table id="reqtable" class="table table-striped no-footer">
                  
                  <thead>
                      <tr>
                        <th>Date Requested</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Qty/Unit</th>
                        <th>Cost</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php
    while($row = mysql_fetch_array($mats)){
      extract($row);
        $reldat= strtotime($materialreqdate);
        $need= strtotime($dateneeded);
        ?>
        <tr>
            <td><?php echo date("F d, Y h:i:s a", $reldat); ?></td>
            <td><?php echo ucfirst($materialname); ?></td>
            <td><?php echo ucfirst($materialdesc); ?></td>
            <td><?php echo $materialqty." ".$qtyunit; ?></td>
            <td><?php 
            if ($materialcost == 0){
              echo "Not Set";
            }
            else{
            echo "₱".number_format((float)$materialcost, 2, '.', ',');
            } ?></td>
            <td><?php 
            if ($materialcost == 0){
              echo "Not Set";
            }
            else{
            echo "₱".number_format((float)$subtotal, 2, '.', ',');
            } ?></td>
            
        <?php
        $num++;
    }
}       
?>
                      </tr>
                    </tbody>
                  </table>
                  <div class="col-xs-3">
              <p><b>Requested by:</b>
               <?php 
                  $personquery = mysql_query("SELECT * FROM `materials` JOIN users JOIN maintenanceprofile WHERE materials.userid = users.userid AND maintenanceprofile.userid = users.userid AND materials.jobid='$jobid' LIMIT 1")or die(mysql_error());
                  $numrowsperson = mysql_num_rows($personquery);
                  if($numrowsperson == '0'){
                            echo "No Assigned Personnel";
                            }
                  else{
                    while($rowperson = mysql_fetch_array($personquery)){
                    extract ($rowperson);
                    $maintrequest = $userid;
                    echo ucfirst($fname)." ".ucfirst($lname);
                  }
                }
                  
                   ?>
                            </p>
            </div><!-- /.col -->
                  <div class="col-xs-3">
              <p><b>Authorized by:</b>
               <?php $authorizenow = mysql_query("SELECT * FROM `matauth` JOIN profiles as prof ON matauth.userid = prof.userid WHERE jobid = $jobid") or die(mysql_error());
                            while($row = mysql_fetch_array($authorizenow)){
                            extract($row);
                              echo ucfirst($fname)." ".ucfirst($lname);
                            }  ?>
                            </p>
            </div><!-- /.col -->
            <div class="col-xs-3">
              <p><b>Approved by:</b>
               <?php $approveheavy = mysql_query("SELECT * FROM `matapprove` JOIN profiles as prof ON matapprove.userid = prof.userid WHERE jobid = $jobid") or die(mysql_error());
                            while($rowheavy = mysql_fetch_array($approveheavy)){
                              echo ucfirst($rowheavy['fname'])." ".ucfirst($rowheavy['lname']);
                            }  ?>
              </p>
            </div><!-- /.col -->
            <div class="col-xs-3 pull-right">
              <p>Total: 
                <?php 
                $abcd = mysql_query("SELECT ROUND(SUM(subtotal), 2) as total from materials WHERE jobid=$jobid");
                while($row = mysql_fetch_array($abcd)){
                  extract($row);
                  echo "₱".number_format((float)$total, 2, '.', ','); 
                }


                ?>
                </p>
              
            </div><!-- /.col -->

                                          <?php
                                          break;
                                          case "construct":
                                         ?>
<div class="box-header with-border">
                  <h3 class="box-title">Materials Needed</h3>

                   <?php 
                   $authenticate = mysql_query("SELECT * FROM `materials` WHERE jobid = $jobid LIMIT 1")or die(mysql_error());
          while($row = mysql_fetch_assoc($authenticate)){
           extract ($row);
                           
                   switch ($materialstatus) {
                  case "request":
                                        ?>
                  <form role="form" method="post" action="">
                  <input type="submit" class="btn btn-primary btn-flat pull-right" id="auth" name="auth" value="Authorize Purchase Request">
                  </form>
                  <?php
                  break;
                  
                  

                }
              }
                  ?>
                </div><!-- /.box-header -->
                  <?php
                            $mats = mysql_query("SELECT * FROM `materials` WHERE jobid = $jobid") or die(mysql_error());
                            $result = mysql_num_rows($mats);

                            $num = '1';

                            if($result == '0'){
                            echo "<br>No Materials<br>";
                            }else{

                                ?>
                  <table id="reqtable" class="table table-striped no-footer">
                  
                  <thead>
                      <tr>
                        <th>Date Requested</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Cost</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php
    while($row = mysql_fetch_array($mats)){
      extract($row);
        $reldat= strtotime($materialreqdate);
        $need= strtotime($dateneeded);
        ?>
        <tr>
            <td><?php echo date("F d, Y h:i:s a", $reldat); ?></td>
            <td><?php echo ucfirst($materialname); ?></td>
            <td><?php echo ucfirst($materialdesc); ?></td>
            <td><?php echo $materialqty; ?></td>
            <td><?php echo "₱".number_format((float)$materialcost, 2, '.', ','); ?></td>
            <td><?php echo "₱".number_format((float)$subtotal, 2, '.', ','); ?></td>
            
        <?php
        $num++;
    }
}       
?>
                      </tr>
                    </tbody>
                  </table>
                  <div class="col-xs-3">
              <p><b>Requested by:</b>
               <?php 
                 $personquery = mysql_query("SELECT * FROM `materials` JOIN users JOIN maintenanceprofile WHERE materials.userid = users.userid AND maintenanceprofile.userid = users.userid AND materials.jobid='$jobid' LIMIT 1")or die(mysql_error());
                  $numrowsperson = mysql_num_rows($personquery);
                  if($numrowsperson == '0'){
                            echo "No Assigned Personnel";
                            }
                  else{
                    while($rowperson = mysql_fetch_array($personquery)){
                    extract ($rowperson);
                    $maintrequest = $userid;
                    echo ucfirst($fname)." ".ucfirst($lname);
                  }
                }
                  
                   ?>
                            </p>
            </div><!-- /.col -->
                  <div class="col-xs-3">
              <p><b>Authorized by:</b>
               <?php $authorizenow = mysql_query("SELECT * FROM `matauth` JOIN profiles as prof ON matauth.userid = prof.userid WHERE jobid = $jobid") or die(mysql_error());
                            while($row = mysql_fetch_array($authorizenow)){
                            extract($row);
                              echo ucfirst($fname)." ".ucfirst($lname);
                            }  ?>
                            </p>
            </div><!-- /.col -->
            <div class="col-xs-3">
              <p><b>Approved by:</b>
               <?php $approveheavy = mysql_query("SELECT * FROM `matapprove` JOIN profiles as prof ON matapprove.userid = prof.userid WHERE jobid = $jobid") or die(mysql_error());
                            while($rowheavy = mysql_fetch_array($approveheavy)){
                              echo ucfirst($rowheavy['fname'])." ".ucfirst($rowheavy['lname']);
                            }  ?>
              </p>
            </div><!-- /.col -->
            <div class="col-xs-3 pull-right">
              <p>Total: 
                <?php 
                $abcd = mysql_query("SELECT ROUND(SUM(subtotal), 2) as total from materials WHERE jobid=$jobid");
                while($row = mysql_fetch_array($abcd)){
                  extract($row);
                  echo "₱".number_format((float)$total, 2, '.', ','); 
                }


                ?>
                </p>
              
            </div><!-- /.col -->
                                         <?php
                                          break;
              

                                        }
                ?>
            
                
            <!-- accepted payments column -->

          </div>

          </div>
       </div>
                          <div id="evaluatecode" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form role="form" method="post" action="">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Evaluation</h4>
      </div>
      <div class="modal-body">
                        <div class="form-group">
                      <label>Enter Code</label>
                      <input type="text" class="form-control" name="evalcode" id="evalcode">
                    </div>
            
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" id="starteval" name="starteval" value="Submit">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>
  <div id="assignjob" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form role="form" method="post" action="">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Job Type</h4>
      </div>
      <div class="modal-body">
                        <div class="form-group">
                      <label>Select Job Type</label>

                            <select class="form-control" name="jobtype">
                            <option></option>
                            <option value="repminimum">Minimum Repair</option>
                            <option value="heavyrep">Heavy Repair(need materials)</option>
                            <option value="construct">Construction</option>
                      </select>
                    </div>
            
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" id="subjob" name="subjob" value="Submit">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>

            <div id="addsched" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form role="form" method="post" action="">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Set Schedule</h4>
      </div>
      <div class="modal-body">
                        <div class="form-group">
                      <label>Start Date</label>
                      <input type="date" class="form-control" name="startdate">
                    </div>
                    <div class="form-group">
                      <label>Estimated Finish Date</label>
                      <input type="date" class="form-control" name="enddate">
                    </div>
            
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" id="setsched" name="setsched" value="Start Job!">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>
  <div id="assignmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form role="form" method="post" action="">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Assign Personnel</h4>
      </div>
      <div class="modal-body">
                        <div class="form-group">
                      <label>Select Personnel</label>

                            <select class="form-control" name="personnel">
                            <?php

                              $saql ="SELECT * FROM maintenanceprofile as prof JOIN personnel as pers WHERE pers.userid=prof.userid AND pers.personnelstatus='available'";
                              $result = mysql_query($saql);
                              echo "<option></option>";
                              while($row = mysql_fetch_array($result)){

                              echo "<option value=".$row['userid'].">".ucfirst($row['fname'])." ".ucfirst($row['lname'])." (".ucfirst($row['personneltype']).")"."</option>";
                            }
          
                            ?>
                      </select>
                    </div>
            
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" id="push" name="push" value="Submit">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>

<div id="addMats" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Request Materials</h4>
      </div>
      <form role="form" name="syform" method="post" action="">
      <div class="modal-body">
        
        <div id="tableadd" class="table-editable">
    <span class="table-add glyphicon glyphicon-plus"></span>
    <table class="table">
      <tr>
        <th>Qty</th>
        <th>Unit</th>
        <th>Material Name</th>
        <th>Description</th>
        <th></th>
      </tr>
      <!-- This is our clonable table line -->
      <tr class="hide">
        <td><input type="text" width="100%" class="form-control" name="matqty[]"></td>
        <td><input type="text" width="100%" class="form-control" name="matunit[]"></td>
        <td><input type="text" width="100%" class="form-control" name="matname[]"></td>
        <td><input type="text" width="100%" class="form-control" name="matdesc[]"></td>
        <td>
          <span class="table-remove glyphicon glyphicon-remove"></span>
        </td>
      </tr>
    </table>
  </div>         
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="reqmaterialsnow"><i class="fa fa-check"></i> Submit</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-close" ></i> Cancel</button>
      </div>
      </form>
    </div>
<?php
//Open a new connection to the MySQL server
$jobidmatreq= $_GET['jobid'];
date_default_timezone_set('Singapore');
            $date = date('m/d/Y h:i:s');
if(isset($_POST['reqmaterialsnow'])){
    $i = 1;
    extract($_POST);
    
 While($i<sizeof($matqty))
 {
$insert = mysql_query("INSERT INTO materials (userid, jobid, materialname, materialdesc, materialqty, qtyunit, materialreqdate, materialstatus) VALUES ('$userid', '$jobidmatreq', '".addslashes($matname[$i])."', '".addslashes($matdesc[$i])."', '".addslashes($matqty[$i])."', '".addslashes($matunit[$i])."', '".addslashes($date)."', 'request')") or die("Verification Error: " . mysql_error());

 $i++;
}
 if($insert)
          {

        echo "<script type='text/javascript'>alert('Materials Request Submitted.'); window.location.href = 'jobview.php?jobid=$jobidmatreq';</script>";
        
            
        
    }
           else{
    echo "<script type='text/javascript'>alert('Record Already Exist!')</script>";
}

      }  

    ?>
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
        <?php 
        }
            ?>
       </div>
        <?php 
          include "assignjob.php";
        ?>

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
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="../../../plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <script src="../../../plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../../../plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
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