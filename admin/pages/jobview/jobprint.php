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
    <body onload="window.print();">
    <!-- Site wrapper -->
    <?php
    include "../../../connection/connection.php";

    ?>
    <div class="wrapper">

      <?php include "nav.php"; ?>
      <?php 
          $jobid = $_GET['jobid'];
          $jobquery = mysql_query("SELECT * FROM `jobrequest` as job JOIN `profiles` as prof JOIN `office` as o WHERE job.profileid=prof.profileid and prof.officeid=o.officeid and job.jobid=$jobid ")or die(mysql_error());
          while($row = mysql_fetch_array($jobquery)){
        extract ($row);
                $status=$reqstatus;
                
                    
        
          ?>
        <!-- Content Header (Page header) -->
        <div class="col-md-11">
        
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
         
        </div>
        <div class="row">
        

          <!-- title row -->
          <div class="col-xs-12">
          <div class="box box-solid">
          <div class="box-header">
          <h4>
          
             <div class="box-body">
             <div class="col-xs-9">
              Details
                <h5><p> <?php echo $jobdesc; ?> </p></h5>
              </div>
              <div class="col-xs-3">
              <h5>Requested by</h5>
                  
                  <p><b><?php echo $officedescription; ?></b></p>
                  <h5>Assigned to</h5>
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
                    echo "<p><b>".ucfirst($fname)." ".ucfirst($lname)."</b> (".ucfirst($personneltype).")</p>";
                  }
                }
                  
                   ?>
                   <h5>Job Type</h5>
                  <?php 
                  $personquery = mysql_query("SELECT * FROM `jobrequest` WHERE jobid='$jobid'")or die(mysql_error());
                  $numrowsperson = mysql_num_rows($personquery);
                  if($numrowsperson == '0'){
                            echo "Job Type not selected.";
                            }
                  else{
                    while($rowperson = mysql_fetch_array($personquery)){
                    extract ($rowperson);
                    $maintrequest = $userid;
                    switch ($jobtype) {
                      case 'repminimum':
                        echo "<b>Minimum Repair</b>";
                        break;
                      case 'heavyrep':
                        echo "<b>Heavy Repair</b>";
                        break;
                        case 'construct':
                        echo "<b>Construction</b>";
                        break;
                      default:
                        # code...
                        break;
                    }
                  }
                }
                  
                   ?>
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
                  <input type="submit" class="btn btn-primary btn-flat pull-right" id="auth" name="auth" value="Authorize Purchase Request">
                  </form>
                  <?php
                  break;
                  case "authorize":
                                        ?>
                  <form role="form" method="post" action="">
                  <input type="submit" class="btn btn-success btn-flat pull-right" id="approve" name="approve" value="Approve Purchase Request">
                  </form>
                  <?php
                  break;
                  case "process":
                                        ?>
                  <form role="form" method="post" action="">
                  <input type="submit" class="btn btn-info btn-flat pull-right" id="deliver" name="deliver" value="Delivered">
                  </form>
                  <?php
                  break;
                  case "approve":
                                        ?>
                  <a href ="editcost.php?jobid=<?php echo $jobid; ?>" type="button" class="btn btn-primary btn-flat pull-right"><i class="fa fa-usd"></i> Add Cost</a>
                  <?php
                  break;
                  case "deliver":
                                        ?>
                  <form role="form" method="post" action="">
                  <input type="submit" class="btn btn-warning btn-flat pull-right" id="charge" name="charge" value="$ Charge to Office">
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
                        <th>Date Needed</th>
                        <th>Name</th>
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
            <td><?php echo date("F d, Y", $reldat); ?></td>
            <td><?php echo date("F d, Y", $need); ?></td>
            <td><?php echo ucfirst($materialname); ?></td>
            <td><?php echo $materialqty." ".$qtyunit; ?></td>
            <td><?php echo "₱ ".$materialcost; ?></td>
            <td><?php echo "₱ ".$subtotal; ?></td>
            
        <?php
        $num++;
    }
}       
?>
                      </tr>
                    </tbody>
                  </table>
                  <div class="col-xs-4">
              <p class="lead">Authorized by:</p>
              <p style="margin-top: 5px;">
              <b>
               <?php $authorizenow = mysql_query("SELECT * FROM `matauth` JOIN profiles as prof ON matauth.userid = prof.userid WHERE jobid = $jobid") or die(mysql_error());
                            while($row = mysql_fetch_array($authorizenow)){
                            extract($row);
                              echo ucfirst($fname)." ".ucfirst($lname);
                            }  ?>
                            </b>
              </p>
            </div><!-- /.col -->
            <div class="col-xs-5">
              <p class="lead">Approved by:</p>
              <p style="margin-top: 5px;">
              <b>
               <?php $approvenow = mysql_query("SELECT * FROM `matapprove` JOIN profiles as prof ON matapprove.userid = prof.userid WHERE jobid = $jobid") or die(mysql_error());
                            while($row = mysql_fetch_array($approvenow)){
                            extract($row);
                              echo ucfirst($fname)." ".ucfirst($lname);
                            }  ?>
                            </b>
              </p>
            </div><!-- /.col -->
            <div class="col-xs-3">
              <p class="lead">Total: ₱
                <?php 
                $abcd = mysql_query("SELECT ROUND(SUM(subtotal), 2) as total from materials WHERE jobid=$jobid");
                while($row = mysql_fetch_array($abcd)){
                  extract($row);
                  echo $total;
                }


                ?>
                </p>
              
            </div><!-- /.col -->

                                          <?php
                                          break;
                                          case "construct":
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
                  <input type="submit" class="btn btn-primary btn-flat pull-right" id="auth" name="auth" value="Authorize Purchase Request">
                  </form>
                  <?php
                  break;
                  case "authorize":
                                        ?>
                  <form role="form" method="post" action="">
                  <input type="submit" class="btn btn-success btn-flat pull-right" id="approve" name="approve" value="Approve Purchase Request">
                  </form>
                  <?php
                  break;
                  case "process":
                                        ?>
                  <form role="form" method="post" action="">
                  <input type="submit" class="btn btn-info btn-flat pull-right" id="deliver" name="deliver" value="Delivered">
                  </form>
                  <?php
                  break;
                  case "approve":
                                        ?>
                  <a href ="editcost.php?jobid=<?php echo $jobid; ?>" type="button" class="btn btn-primary btn-flat pull-right"><i class="fa fa-usd"></i> Add Cost</a>
                  <?php
                  break;
                  case "deliver":
                                        ?>
                  <form role="form" method="post" action="">
                  <input type="hidden" value="<?php echo $officeid; ?>" name="officenumber">
                  <input type="submit" class="btn btn-warning btn-flat pull-right" id="charge" name="charge" value="$ Charge to Office">
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
                        <th>Date Needed</th>
                        <th>Name</th>
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
            <td><?php echo date("F d, Y", $reldat); ?></td>
            <td><?php echo date("F d, Y", $need); ?></td>
            <td><?php echo ucfirst($materialname); ?></td>
            <td><?php echo $materialqty; ?></td>
            <td><?php echo "₱ ".$materialcost; ?></td>
            <td><?php echo "₱ ".$subtotal; ?></td>
            
        <?php
        $num++;
    }
}       
?>
                      </tr>
                    </tbody>
                  </table>
                  <div class="col-xs-4">
              <p class="lead">Authorized by:</p>
              <p style="margin-top: 5px;">
              <b>
               <?php $authorizenow = mysql_query("SELECT * FROM `matauth` JOIN profiles as prof ON matauth.userid = prof.userid WHERE jobid = $jobid") or die(mysql_error());
                            while($row = mysql_fetch_array($authorizenow)){
                            extract($row);
                              echo ucfirst($fname)." ".ucfirst($lname);
                            }  ?>
                            </b>
              </p>
            </div><!-- /.col -->
            <div class="col-xs-5">
              <p class="lead">Approved by:</p>
              <p style="margin-top: 5px;">
              <b>
               <?php $approvenow = mysql_query("SELECT * FROM `matapprove` JOIN profiles as prof ON matapprove.userid = prof.userid WHERE jobid = $jobid") or die(mysql_error());
                            while($row = mysql_fetch_array($approvenow)){
                            extract($row);
                              echo ucfirst($fname)." ".ucfirst($lname);
                            }  ?>
                            </b>
              </p>
            </div><!-- /.col -->
            <div class="col-xs-3">

              <p class="lead">Total: ₱
                <?php 
                $abcd = mysql_query("SELECT ROUND(SUM(subtotal), 2) as total from materials WHERE jobid=$jobid");
                while($row = mysql_fetch_array($abcd)){
                  extract($row);
                  echo $total;
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
  <div id="addmats" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form role="form" method="post" action="">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Material</h4>
      </div>
      <div class="modal-body">
      <form role="form" name="requestform" method="post" action="">
          <div class="form-group">
          <label>Item Name</label>
          <input class="form-control" name="itemname" id="itemname" placeholder="">
          </div>
          <div class="form-group">
          <label>Description</label>
          <input class="form-control" name="itemdesc" id="itemdesc" placeholder="">
          </div>
          <div class="form-group">
          <div class="form-inline">
          <label>Quantity</label>
          <input class="form-control" type="number" name="itemqty" id="itemqty" placeholder="">
          <label>Unit</label>
          <input class="form-control" type="text" name="unit" id="unit" placeholder="">
          </div>
          </div>
          <div class="form-group">
          <label>Date Needed</label>
          <input class="form-control" type="date" name="dateneed" id="dateneed" placeholder="">
          </div>
          <hr>
      </form>
            <?php
            $bcda = mysql_query("SELECT * FROM officebudget WHERE officeid='$officeid'");
            while($row = mysql_fetch_array($bcda)){
              extract($row);
            }
             ?>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" id="submat" name="submat" value="Submit">
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



       </section>
       </div>
          
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