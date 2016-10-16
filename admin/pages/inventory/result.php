<!DOCTYPE html>
<html>
 <head>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Remote file for Bootstrap Modal</title>  
 </head>
 <body>
 <?php
    include "../../../connection/connection.php";

    ?>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             <h4 class="modal-title">Modal title</h4>
        </div>
            <!-- /modal-header -->
        <div class="modal-body">

              <?php 
                  ///fetch from DB
                  $id = $_GET['id']; //to test it works with php GET

               ?>
<?php
                            $sql = mysql_query("SELECT * FROM `inventory` where assetid='$id'") or die(mysql_error());
                            $result = mysql_num_rows($sql);

                            $num = '1';

                            if($result != '0'){

                                ?>
       <?php
    while($row = mysql_fetch_array($sql)){
      extract($row);
        ?>


              <ul>
                 <li><strong>Name:</strong> <?php echo $assetname; ?></li>
                 <li><strong>DOB:</strong> 28th July 1995.</li>
                 <li><strong>BirthPlace:</strong> Chicago.</li>
                 <li><strong>Occupation:</strong> Student.</li>
                 <li><strong>About:</strong> Information.</li>
               <li><strong>Contact:</strong> Contact stuff.</li>
             </ul>
<?php
                          $num++;
                            }
                          }       
                      ?>

        </div>
           <!-- /modal-body -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
           <!-- /modal-footer -->
 </body>
</html>