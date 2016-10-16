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
        <input type="submit" class="btn btn-primary" id="submit" name="push" value="Submit">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>