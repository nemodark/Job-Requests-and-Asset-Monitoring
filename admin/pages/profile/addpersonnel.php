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
    <!-- FontAwesome 4.3.0 -->
    <link href="../../../bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="../../../bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="../../../plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Color Picker -->
    <link href="../../../plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap time Picker -->
    <link href="../../../plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    .error p {
   color:red;
}
    </style>
  </head>
  <body class="skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <?php
    include "../../../connection/connection.php";

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
            <li><a href="../../home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-briefcase"></i> <span>Jobs</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../requestform.php"><i class="fa fa-circle-o"></i> Request for Service</a></li>
                <li><a href="../jobrequests.php"><i class="fa fa-circle-o"></i> View All Jobs</a></li>
              </ul>
            </li>
            <li>
              <a href="../inv.php">
                <i class="fa fa-table"></i> <span>Inventory</span>
              </a>
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

      <!-- =============================================== -->
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


date_default_timezone_set('Singapore');
            $nowdate = date('m/d/Y');
?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Personnel
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Register</li>
          </ol>
        </section>
        
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-info">
                <form role="form" method="post" id="contactform" action="">
                <div class="col-md-8 col-md-offset-2">
                <div class="box-body">
                    <div class="form-group">
                      <input class="form-control" name="username" id="username" value="<?php echo $Guid; ?>" placeholder="" type="hidden">
                    </div>
                    <div class="form-group">
                      <label>First Name*</label>
                      <input class="form-control" name="fname" id="fname"  placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label>Last Name*</label>
                      <input class="form-control" name="lname" id="lname" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label>Birthdate</label>
                      <input type="date" class="form-control" name="bdate" id="bdate" placeholder="">
                    </div>                    
                    <div class="form-group">
                      <label>Position*</label>
                      <select class="form-control" name="position">
                      <option>Carpenter</option>
                      <option>Electrician</option>
                      <option>Painter</option>
                      <option>Plumber</option>
                      <option>Wielder</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Contact Number*</label>
                      <input type="" class="form-control" name="contact" onkeypress="return IsNumeric(event);" ondrop="return false;" id="contact" placeholder="" maxlength="11" required>
                      <p class="help-block">
                      Example: 09123456789
                      <span id="error" style="color: red; display: none"> *Numbers Only!</span>
                      </p>
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <input type="" class="form-control" name="address" id="address">
                    </div>
                    <div class="form-group">
                      <label>Gender</label>
                      <select class="form-control" name="gender">
                      <option></option>
                      <option>Male</option>
                      <option>Female</option>
                      </select>
                    </div>
                    </div>

                    
                  </div><!-- /.box-body -->
                  
                  <div class="box-footer">
                  <div class="col-md-10 col-md-offset-5">
                  <input type="submit" class="btn btn-primary" id="submit" name="push" value="Submit">
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Cancel</button>

<!-- Modal -->

                  </div>
                  </div>

                </form>
                <?php include "addperson.php";
                 ?>
              </div><!-- /.box -->
              </div>
              </div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Are you sure you want to cancel?</h4>
      </div>
      <div class="modal-footer">
      <a href="../personnel.php" type="button" class="btn btn-danger">Yes</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
        </section><!-- /.content -->
        
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2015-Present CSAB CSIT.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../../plugins/jQuery/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <script type="text/javascript">
    $('#password, #cpassword').on('keyup', function () {
    if ($('#password').val() == $('#cpassword').val()) {
        $('#message').html('<i class="fa fa-check"></i>Password matched').css('color', 'green');
    } else 
        $('#message').html("<i class='fa fa-times'></i>These passwords don't match.").css('color', 'red');
    });
    </script>

    <script type="text/javascript">
      $("#submit").click(function(){
        $(".error").hide();
        var hasError = false;
        var passwordVal = $("#password").val();
        var checkVal = $("#cpassword").val();
        if (passwordVal != checkVal ) {
            $("#cpassword").after(alert("Passwords don't match!"));
            hasError = true;
        }
        if(hasError == true) {return false;}
    });
    </script>

    
    <script type="text/javascript">
    var maxLength = 11;
  $('#contact').keyup(function() {
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
<!-- http://www.itechroom.com-->
function checkUserName(usercheck)
{
  $('#usercheck').html('<img src="images/ajax-loader.gif" />');
  $.post("checkusername.php", {user_name: usercheck} , function(data)
    {     
         if (data != '' || data != undefined || data != null) 
         {           
          $('#usercheck').html(data); 
         }
          });
}
</script>

    <script type="text/javascript">
<!-- http://www.itechroom.com-->
function checkemail(emailcheck)
{
  $('#emailcheck').html('<img src="images/ajax-loader.gif" />');
  $.post("checkemail.php", {email_ad: emailcheck} , function(data)
    {     
         if (data != '' || data != undefined || data != null) 
         {           
          $('#emailcheck').html(data); 
         }
          });
}
</script>
    <script type="text/javascript">
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../../../plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="../../../plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="../../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="../../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="../../../plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="../../../plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="../../../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="../../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="../../../plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../../../dist/js/pages/dashboard.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../dist/js/demo.js" type="text/javascript"></script>

  </body>
</html>
