<?php 
include "profileinfo.php";
 ?>
      <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>CSA</b>B</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>CSAB</b> GSO</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-briefcase"></i>
                  <span class="label label-warning"><?php

                                    $mats = mysql_query("SELECT * FROM `jobrequest` WHERE reqstatus='pending'");
                                    $matstatus = mysql_num_rows($mats); 
                                    echo $matstatus;
                   
                   ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header"><i class="fa fa-bell text-aqua"></i> You have <?php echo $matstatus; ?> Job Requests</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                    <?php
                            $sql = mysql_query("SELECT * FROM `jobrequest` WHERE reqstatus='pending'  ORDER BY `jobdatereq` DESC LIMIT 5") or die(mysql_error());
                            $result = mysql_num_rows($sql);
                            $num = '1';
                            if($result == '0'){
                            echo "<br>No New Job Requests<br>";
                            }
                            else{
include "timeago.php";
    while($row = mysql_fetch_array($sql)){
      extract($row);  
                            ?>
                      <li>
                        <?php 

        echo "<a href='./pages/jobview/jobview.php?jobid=".$jobid."'>".ucfirst($jobname)."<br><i class='fa fa-clock-o'></i>".time_ago($jobdatereq)."</a>";
        $num++;
                            }
                          }
                        ?>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="./pages/jobrequests.php">View all</a></li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?php

                    echo "<img src='image.php?userid=$userid' class='user-image' alt='User Image'/> ";
                ?>
                  <span class="hidden-xs"><?php
                          echo ucfirst($fname)." ".ucfirst($lname);
                       ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                  <?php

                    echo "<img src='image.php?userid=$userid' class='img-circle' alt='User Image'/> ";
                ?>
                    <p>

                      <?php
                          echo ucfirst($fname)." ".ucfirst($lname);
                       ?>
                      <small><?php echo ucfirst($position); ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>


    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../plugins/jQuery/jquery-ui.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
  $.ajaxSetup({ cache: false }); // This part addresses an IE bug.  without it, IE will only load the first number and will never refresh
  setInterval(function() {
    $('#notif').load('home.php');
  }, 3000); // the "3000" 
});
    </script>