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
    </head>
    
  <body onload="window.print();">
    <!-- Site wrapper -->
    <?php
    include "../../../connection/connection.php";
    ?>
    <div class="wrapper">

      <?php include "nav.php"; ?>

      <?php  
        $rcvid= $_GET['rcvid'];
        $reportssql = mysql_query("SELECT * FROM receivingreport as rr JOIN profiles as prof JOIN jobrequest ON rr.userid=prof.userid AND jobrequest.jobid=rr.jobid WHERE rcvreportid= $rcvid");
        while ($row = mysql_fetch_array($reportssql)) {
          extract($row);
          $rcvdate = strtotime($rcvdate);
          $newfname = $row['fname'];
          $newlname = $row['lname'];
          $jobid = $row['jobid'];

          # code...
        }
       ?>

        

        <!-- Main content -->
        <section class="invoice">
        
          <!-- title row -->
        <div id="customers">
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Colegio San Agustin - Bacolod
                <small class="pull-right">Date: <?php echo date("m/d/Y", $rcvdate); ?></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-8 invoice-col">
              From
              <address>
                <strong><?php echo ucfirst($rcvfrom); ?></strong><br>
                <?php echo $fromaddress; ?><br>
                Phone: <?php echo $fromphone; ?><br/>
                Email: <?php echo $fromemail; ?>
              </address>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
                              <?php
                            $mats = mysql_query("SELECT * FROM `materials` WHERE jobid = $jobid") or die(mysql_error());
                            $result = mysql_num_rows($mats);

                            $num = '1';

                            if($result == '0'){
                            echo "<div class='col-xs-12'> <p class='lead'>No Materials</p></div>";
                            }else{

                                ?>
              <table class="table table-striped" id="printnow">
                <thead>
                  <tr>
                    <th>Qty/Unit</th>
                    <th>Item Name</th>
                    <th>Description</th>
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
            <td><?php echo $materialqty." ".$qtyunit; ?></td>
            <td><?php echo ucfirst($materialname); ?></td>
            <td><?php echo ucfirst($materialdesc); ?></td>
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
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <!-- /.col -->
            <div class="col-xs-6">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Total Cost:</th>
                    <td><?php $costtotal = mysql_query("SELECT ROUND(SUM(materialcost), 2) as totalcost from materials WHERE jobid=$jobid");
                while($row = mysql_fetch_array($costtotal)){
                  extract($row);
                  echo "₱".number_format((float)$totalcost, 2, '.', ',');;
                }  ?></td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td><?php $subtotaltotal = mysql_query("SELECT ROUND(SUM(subtotal), 2) as subtotalnow from materials WHERE jobid=$jobid");
                while($row = mysql_fetch_array($subtotaltotal)){
                  extract($row);
                  echo "₱".number_format((float)$subtotalnow, 2, '.', ',');;
                }  ?></td>
                  </tr>
                 
                </table>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-6">
              <p class="lead">Encoded by:</p>
              <p>
              <?php
                echo ucfirst($newfname)." ".ucfirst($newlname);


               ?>
               </p>
            </div>
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <button class="btn btn-primary pull-right" id="generate"  onclick="myFunction()" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
              <?php 
              switch ($reqstatus) {
                case 'forbudgetcharge':

                ?>
<button class="btn btn-success pull-right" data-toggle="modal" data-target="#chargerr" style="margin-right: 5px;"><i class="fa fa-download"></i> Charge to Office</button>
                <?php
                  # code...
                  break;
              }
              ?>
              
            </div>
          </div>

          </div>


          <div id="chargerr" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Charge to Office</h4>
      </div>

      <form role="form" action="" method="post">
      <div class="modal-body">
      <input type="hidden" value="<?php echo $account; ?>" name="usernumber">
      <input type="hidden" value="<?php echo $jobid; ?>" name="jobnumber">
      <input type="hidden" value="<?php echo $subtotalnow; ?>" name="totalnumber">
              <div class="form-group">
                      <label>Select Office</label>
                      <select class="form-control" name="officenumber" id="ofc" required>
                      <option selected="selected">--Select Office--</option>
                            <?php
                            $newsql = mysql_query("SELECT * FROM jobrequest JOIN profiles ON jobrequest.profileid=profiles.profileid WHERE jobid=$jobid");
                            while($newrow = mysql_fetch_array($newsql)){
                              $officenewid= $newrow['officeid'];
                            }
                              $saql ="SELECT * FROM office WHERE officeid=$officenewid OR officeid='1'";
                              $result = mysql_query($saql);
                              while($row = mysql_fetch_array($result)){
                              extract($row);

                              echo "<option value=".$officeid.">".ucfirst($officedescription)."</option>";
                            }
          
                            ?>
                      </select>
                    </div>
            
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" id="submitcharge" name="submitcharge" value="Submit">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php
        date_default_timezone_set('Singapore');
        $chargedate = date('m/d/Y h:i:s');
        extract($_POST);
       if(isset($submitcharge)){
        $charge = mysql_query("UPDATE `jobrequest` SET `reqstatus` = 'charged' WHERE `jobid`='$jobid'") or die(mysql_error());
        $chargemat = mysql_query("UPDATE `materials` SET `materialstatus` = 'charged' WHERE `jobid`='$jobid'") or die(mysql_error());
        $officecharge = mysql_query("INSERT INTO `budgetcharge`(`officeid`, `jobid`, `userid`, `chargeamount`, `chargedate`) VALUES ('$officenumber','$jobnumber','$usernumber','$totalnumber','$chargedate')") or die(mysql_error());
        if ($officecharge)
        {

          ?>
       <script>
alert("Success!");
window.location.href = "rcvreport.php?rcvid=<?php echo $rcvid; ?>";
</script>   
          <?php
        }
        else{
        echo "error";
      }
     }
       ?>


        </section><!-- /.content -->
        <div class="clearfix"></div>
      </div><!-- /.content-wrapper -->
    
  </body>
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../../plugins/jspdf/jspdf.js" type="text/javascript"></script>
    <script type="text/javascript" src="../../../plugins/jspdf/dist/jspdf.debug.js"></script>
<script type="text/javascript">
        function demoFromHTML() {
            var pdf = new jsPDF('l', 'pt', 'letter');
            // source can be HTML-formatted string, or a reference
            // to an actual DOM element from which the text will be scraped.
            source = $('#customers')[0];

            // we support special element handlers. Register them with jQuery-style 
            // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
            // There is no support for any other type of selectors 
            // (class, of compound) at this time.
            specialElementHandlers = {
                // element with id of "bypass" - jQuery style selector
                '#bypassme': function(element, renderer) {
                    // true = "handled elsewhere, bypass text extraction"
                    return true
                }
            };
            margins = {
                top: 20,
                bottom: 60,
                left: 40,
                width: 1000
            };
            // all coords and widths are in jsPDF instance's declared units
            // 'inches' in this case
            pdf.fromHTML(
                    source, // HTML string or DOM elem ref.
                    margins.left, // x coord
                    margins.top, {// y coord
                        'width': margins.width, // max width of content on PDF
                        'elementHandlers': specialElementHandlers
                    },
            function(dispose) {
                // dispose: object with X, Y of the last line add to the PDF 
                //          this allow the insertion of new lines after html
                pdf.output('dataurlnewwindow');
            }
            , margins);
        }
    </script>
    <script>
function myFunction() {
    window.print();
}
</script>
    <!-- FastClick -->
    
    <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="../../../plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../../../plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="../../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    
    <script src="../../../plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->

             <script type="text/javascript">
    $(function() {
      
        var table = $('#reqtable').DataTable();
        var order = table.order();
        table
    .order( [ 0, 'desc' ] )
    .draw();
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
 

</html>