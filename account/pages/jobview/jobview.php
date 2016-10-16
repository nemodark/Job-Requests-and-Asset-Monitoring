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
     <script type="text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;
        }
        
    </script>
    </head>
    <body class="skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <?php
    include "../../../connection/connection.php";
    include "jobquery.php";
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
            <li><a href="../profile/profile.php"><i class="fa fa-user"></i> <span>Profile</span></a></li>
            <li><a href="../receivingreports.php"><i class="fa fa-flag"></i> <span>Receiving Reports</span></a></li>
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
              <a href="jobprint.php?jobid=<?php echo $jobid; ?>" target="_blank" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print</a>
            
          </h1>

          <h4><small><i class="fa fa-clock-o"></i> Posted 
          <?php
            echo time_ago($jobdatereq);
         ?></small>

         </h4>
         
        </section>
        </div>
        <section class="content">
        <div class="row">
        

          <!-- title row -->
          <div class="col-xs-12">
          <div class="box box-solid">
          <div class="box-header">
          <h4>
          <div class="col-xs-9">
              Details
              <?php
              switch ($status) {
                                        
                                        case "materialsapprove":
                                        echo "<small class='label label-primary pull-right'>Waiting for Materials</small>";
                                        break;
                                        case "purchase":
                                        echo "<small class='label label-primary pull-right'>Processing Materials</small>";
                                        break;
                                        case "materialsordered":
                                        echo "<small class='label label-primary pull-right'>Materials Ordered</small>";
                                        break;
                                        
                                        }
                ?><hr>
                <h5><p> <?php echo $jobdesc; ?> </p></h5>
                </div>
                <div class="col-xs-3">
                <?php
                switch ($status){
                  case "materialsapprove":
                  ?>
                  <CENTER>
                  <form role="form" method="post" action="">
                  <button type="submit" class="btn btn-success btn-flat" id="order" name="order"><i class="fa fa-shopping-cart"></i> Order/Purchase Materials</button>
                  </form>
                  </CENTER>

                <?php
                break;
                case "materialsordered":
                  ?>
                  <CENTER>
                  <form role="form" method="post" action="">
                  <button type="submit" class="btn btn-success btn-flat" id="delivered" name="delivered"><i class="fa fa-thumbs-up"></i> Materials Delivered</button>
                  </form>
                  </CENTER>

                <?php
                break;
                case "materialsdelivered":
                  ?>
                  <CENTER>
                  <button data-toggle='modal' data-target='#createrr' class="btn btn-success btn-flat" id="receivingreport" name="receivingreport"><i class="fa fa-edit"></i> Create Receiving Report</button>
                  </CENTER>

                <?php
                break;
                }

                ?>
          
          </div>
              </h4>
            </div>
             <div class="box-body">
             <div class="col-xs-9">
              
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
                  while($rowperson = mysql_fetch_array($personquery)){
                    extract ($rowperson);
                  if($jobtype == '0'){
                            echo "Job Type not selected.";
                            }
                  else{
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
                  <h3 class="box-title">Materials Needed</h3>
  <?php
$materialscost = mysql_query("SELECT * FROM `materials` WHERE jobid='$jobid'")or die(mysql_error());
                  $numrowmatscost = mysql_num_rows($materialscost);
                  while($rowcost = mysql_fetch_array($materialscost)){
                    extract ($rowcost);
  switch($materialstatus){
    case "authorize":
    ?>
 <a href="editcost.php?jobid=<?php echo $jobid; ?>" type="button" class="btn btn-flat btn-primary pull-right">$ Add Cost</a>
 <?php
 break;
}
}
?>     
                   <?php 
                   $authenticate = mysql_query("SELECT * FROM `materials` WHERE jobid = $jobid LIMIT 1")or die(mysql_error());
          while($row = mysql_fetch_assoc($authenticate)){
           extract ($row);
                           
                   switch ($materialstatus) {
                  case "sent":
                                        ?>
                  <form role="form" method="post" action="">
                  <input type="submit" class="btn btn-primary btn-flat pull-right" id="auth" name="auth" value="Approve Purchase Request">
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
                            echo "<div class='col-xs-12'> <p class='lead'>No Materials</p></div>";
                            }else{

                                ?>
                  <table id="reqtable" class="table table-striped">
                  
                  <thead>
                      <tr>
                        <th>Date Requested</th>
                        <th>Date Needed</th>
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
            <td><?php echo date("F d, Y", $need); ?></td>
            <td><?php echo ucfirst($materialname); ?></td>
            <td><?php echo ucfirst($materialdesc); ?></td>
            <td><?php echo $materialqty." ".$qtyunit; ?></td>
            <td><?php echo "₱ ".$materialcost; ?></td>
            <td><?php echo "₱ ".$subtotal; ?></td>
            
        <?php
        $num++;
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
          }
            ?>

                                          <?php
                                          break;
                                          case "construct":
                                         ?>
<div class="box-header with-border">
                  <h3 class="box-title">Materials Needed </h3>

 <?php
$materialscost = mysql_query("SELECT * FROM `materials` WHERE jobid='$jobid'")or die(mysql_error());
                  $numrowmatscost = mysql_num_rows($materialscost);
                  while($rowcost = mysql_fetch_array($materialscost)){
                    extract ($rowcost);
  switch($materialstatus){
    case "authorize":
    ?>
 <a href="editcost.php?jobid=<?php echo $jobid; ?>" type="button" class="btn btn-flat btn-primary pull-right">$ Add Cost</a>
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
                            echo "<div class='col-xs-12'> <p class='lead'>No Materials</p></div>";
                            }else{

                                ?>
                  <table id="reqtable" class="table table-striped">
                  
                  <thead>
                      <tr>
                        <th>Date Requested</th>
                        <th>Date Needed</th>
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
            <td><?php echo date("F d, Y", $need); ?></td>
            <td><?php echo ucfirst($materialname); ?></td>
            <td><?php echo ucfirst($materialdesc); ?></td>
            <td><?php echo $materialqty; ?></td>
            <td><?php echo "₱ ".$materialcost; ?></td>
            <td><?php echo "₱ ".$subtotal; ?></td>
            
        <?php
        $num++;
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
                                         } 
                                          break;
              

                                        }
                ?>
            
                
            <!-- accepted payments column -->

          </div>

          </div>

            <div id="createrr" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form role="form" method="post" action="">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Receiving Report</h4>
      </div>
      <?php
  function NewGuid() { 
    $s = strtoupper(md5(uniqid(rand(),true))); 
    $guidText = 
        substr($s,1,2).'-'. 
        substr($s,2,3);
    return $guidText;
}
// End Generate Guid 

$Guid = NewGuid();
?>
      <form role="form" action="" method="post">
      <div class="modal-body">
              <div class="form-group">
              <input type="hidden" class="form-control" id="rrnumber" name="rrnumber" value="<?php echo $Guid; ?>" readonly>
              <label>Company Name</label>
              <input type="text" class="form-control" id="rrcompany" name="rrcompany">
              </div>
              <div class="form-group">
              <label>Address</label>
              <input type="text" class="form-control" id="rraddress" name="rraddress">
              </div>
              <div class="form-group">
              <label>Contact #</label>
              <input type="" class="form-control" name="contact" onkeypress="return IsNumeric(event);" ondrop="return false;" id="contact" placeholder="" maxlength="11" required>
                      <p class="help-block">
                      Example: 09123456789
                      <span id="error" style="color: red; display: none"> *Numbers Only!</span>
                      </p>
              </div>
              <div class="form-group">
              <label>Email Address</label>
              <input type="email" class="form-control" id="rremail" name="rremail">
              </div>
            
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" id="submitrcv" name="submitrcv" value="Submit">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
    </form>
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
        <?php 
        }
            ?>
       </div>

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