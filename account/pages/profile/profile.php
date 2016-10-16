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
            <li class="active"><a href=""><i class="fa fa-user"></i> <span>Profile</span></a></li>
            <li><a href="../receivingreports.php"><i class="fa fa-flag"></i> <span>Receiving Reports</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <?php 
         $sql = mysql_query("SELECT * FROM `profiles` as prof JOIN `office` as o ON prof.officeid=o.officeid  WHERE prof.userid = $userid") or die(mysql_error());
          while($row = mysql_fetch_array($sql)){
        extract ($row);

          $bdate = strtotime($birthdate);
          $age = date_diff(date_create($birthdate), date_create('now'))->y;
          
        
          ?>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content">
        <div class="row">
        
        

          <!-- title row -->
          <div class="col-xs-12">
          <div class="box box-solid">
          <div class="box-header with-border">
          <div class="col-xs-9">
          <h2>
              
              <img src="image.php?userid=<?php echo $userid ?>" alt="Image not found" HEIGHT="144" WIDTH="144" onError="this.onerror=null;this.src='../../../images/csab.png';" />
                </h2>
                <a href="" data-toggle="modal" data-target="#profpic" style="margin-left: 15px;"> Edit Profile Picture </a>
                </div>
                <div class="col-xs-3">
                <h2>
        <?php 
        echo $officedescription;
        ?>
        </h2>
                </div>
        <div class="col-xs-10" style="margin-top: -10px;">
        <h2>
        <?php
        echo ucfirst($fname)." ".ucfirst($lname); 
        ?>
        </h2>
        </div>
        <div class="col-xs-2" style="margin-top:30px;">
        <div class="form-inline">
        <a href="editprofile.php?profid=<?php echo $userid; ?>"><i class="fa fa-pencil-square-o"></i> Edit Profile</a>
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
              <p><b>Address</b></p>
              <p class="lead">  <?php echo $address; ?></p>
              </div>
              <div class="col-sm-5">
              <p><b>Birthdate</b></p>
              <p class="lead">  <?php echo date("F d, Y", $bdate); ?></p>
              <p><b>Gender</b></p>
              <p class="lead">  <?php echo $gender; ?></p>
              <p><b>Age</b></p>
              <p class="lead">  <?php echo $age." years old"; ?></p>

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
    <script src="../../../plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../../../plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../dist/js/demo.js" type="text/javascript"></script>
             <script type="text/javascript">
    $(function() {
      
        var table = $('#reqtable').DataTable();
        var order = table.order();
        table
    .order( [ 0, 'desc' ] )
    .draw();
    });
    </script>
  
    </body>
</html>