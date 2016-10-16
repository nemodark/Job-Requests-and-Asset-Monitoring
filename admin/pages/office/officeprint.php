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
    <link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="../../../bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="../../../bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
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
          $officeid = $_GET['officeid'];
         $sql = mysql_query("SELECT * FROM `office` WHERE officeid = '$officeid'") or die(mysql_error());
          while($row = mysql_fetch_array($sql)){
        extract ($row);

          $bdate = strtotime($birthdate);
          
        
          ?>
        

          <!-- title row -->
          <div class="col-xs-12">
          <div class="box box-solid">
          <div class="box-header with-border">
          <div class="col-xs-12">
          <CENTER>
          <h2>
              
              <?php
              echo ucfirst($officedescription)." (".ucfirst($officename).")";

                ?>
                </h2>
                </CENTER>

                </div>
              
              
              </div>
            
         
            
          </div>
          </div>
          <?php 
        }
            ?>
       
       <div class="col-xs-12">
          <div class="box box-solid">
          
          <div class="box-header with-border">
          <h3>
             Details
              </h3>
               <div class="row no-print">
            <div class="col-xs-12">
              <a href="officeprint.php" target="_blank" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print</a>
            </div>
          </div>
            </div>

             <div class="box-body"> 
            
                  <table id="reqtable" class="table table-striped no-footer">
                  
                  <thead>
                      <tr>
                        <th>Budget</th>
                        <th>School Year</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
            $budgetnew = mysql_query("SELECT * FROM officebudget WHERE officeid='$officeid'") or die(mysql_error());
            $num = '1';

                            if($result == '0'){
                            echo "<br>No Materials<br>";
                            }else{
            while($row = mysql_fetch_array($budgetnew)){
              extract($row);
        ?>
        <tr>
            <td><?php echo $budget; ?></td>
            <td><?php echo $budgetsyfrom." - ".$budgetsyto; ?></td>
            
        <?php
        $num++;
    }
  }
?>
                      </tr>
                    </tbody>
                  </table>
              <hr>
              <h4>Expenses</h4>
              <hr>
                                <table id="reqtable" class="table table-striped no-footer">
                  
                  <thead>
                      <tr>
                        <th>Date</th>
                        <th>Job Name</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
            $budgetnew = mysql_query("SELECT * FROM budgetcharge JOIN jobrequest ON budgetcharge.jobid=jobrequest.jobid WHERE budgetcharge.officeid='$officeid'") or die(mysql_error());
            $num = '1';

                            if($result == '0'){
                            echo "<br>No Record<br>";
                            }else{
            while($row = mysql_fetch_array($budgetnew)){
              extract($row);
              $datecharge = strtotime($chargedate);
        ?>
        <tr>
            <td><?php echo date("F d, Y", $datecharge); ?></td>
            <td><?php echo ucfirst($jobname); ?></td>
            <td><?php echo $chargeamount; ?></td>
            
        <?php
        $num++;
    }
  }
?>
</tr>
</tbody>
</table>
                <?php 
                $abcd = mysql_query("SELECT ROUND(SUM(chargeamount), 2) as total from budgetcharge WHERE officeid=$officeid");
                while($row = mysql_fetch_array($abcd)){
                  extract($row);
                  $remaining = $budget - $total;
                }


                ?>
            <div class="col-xs-6 col-xs-offset-8">
              <div class="table-responsive">
                <table class="table">
                <?php 
                $abcd = mysql_query("SELECT ROUND(SUM(chargeamount), 2) as total from budgetcharge WHERE officeid=$officeid");
                while($row = mysql_fetch_array($abcd)){
                  extract($row);
                


                ?>
                  <tr>
                    <th style="width:50%">Total Expense:</th>
                    <td>₱ <?php echo $total; ?></td>
                  </tr>
                  <tr>
                    <th>Remaining Budget</th>
                    <td>₱ <?php echo $remaining; ?></td>
                  </tr>
                  <?php
                }
                  ?>
                </table>
              </div>
            </div>
             
              </div>
              

         
           
          </div>

       </div>
       

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