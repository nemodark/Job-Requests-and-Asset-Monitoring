<?php
include "../../../connection/connection.php";
$qry = 'SELECT * FROM `assetforms` WHERE assetformsid='.$_POST['transactionid'];
$sql = mysql_query($qry) or die($myQuery."<br/><br/>".mysql_error());
while($row = mysql_fetch_array($sql)){

	if ($_POST['transactionid'] == '1') {
		?>
	<div class="form-group">
	<label>From:</label>
	<select class="form-control" name="transferfromwho">
	<?php 
	$tooffice = mysql_query("SELECT * FROM invlocation WHERE locationid = $locid");
	while($torow = mysql_fetch_array($tooffice)){
	?>
	<option value="<?php echo $torow['locationid']; ?>"><?php echo $torow['locationname']; ?></option>
	<?php
	}
	?>
	</select>
	</div>
	<div class="form-group">
	<label>Issued By:</label>
	<input class="form-control" name="transissuedbywho">
	</div>
	<div class="form-group">
	<label>To:</label>
	<select class="form-control" name="transfertowho">
	<?php 
	$tooffice = mysql_query("SELECT * FROM invlocation");
	while($torow = mysql_fetch_array($tooffice)){
	?>
	<option value="<?php echo $torow['locationid']; ?>"><?php echo $torow['locationname']; ?></option>
	<?php
	}
	?>
	</select>
	</div>
	<div class="form-group">
	<label>Requested By:</label>
	<input class="form-control" name="transrequestedbywho">
	</div>
		<?php
	}

	elseif ($_POST['transactionid'] == '2') {
		?>
	<div class="form-group">
	<label>Requested By:</label>
	<input class="form-control" name="releaserequestby">
	</div>
	<div class="form-group">
	<label>Authorized By:</label>
	<input class="form-control" name="releaseauthorizeby">
	</div>
	<div class="form-group">
	<label>Guard On Duty:</label>
	<input class="form-control" name="releaseguard">
	</div>
		<?php
	}
		elseif ($_POST['transactionid'] == '3') {
?>
	<div class="form-group">
	<label>Department:</label>
	                <select class="form-control" name="office" id="ofc" required>
                      <option selected="selected">--Select Office--</option>
                            <?php

                              $saql ="SELECT * FROM office";
                              $result = mysql_query($saql);
                              while($row = mysql_fetch_array($result)){
                              extract($row);

                              echo "<option value=".$officeid.">".ucfirst($officedescription)."</option>";
                            }
          
                            ?>
                      </select>
	</div>
	<div class="form-group">
	<label>Requested By:</label>
	<input class="form-control" name="pulloutrequestby">
	</div>
	<div class="form-group">
	<label>Authorized By:</label>
	<input class="form-control" name="pulloutauthorizeby">
	</div>
	<div class="form-group">
	<label>Received By:</label>
	<input class="form-control" name="pulloutreceivedby">
	</div>
<?php }
	elseif ($_POST['transactionid'] == '4') {
	 	# code...
	 	?>
	<div class="form-group">
	<label>Type:</label>
	                <select class="form-control" name="disposaltype" id="disposalid" required>
                      <option>----</option>
                            <?php

                              $disposesql ="SELECT * FROM assetdisposaltype";
                              $disposeres = mysql_query($disposesql);
                              while($rowdis = mysql_fetch_array($disposeres)){
                              extract($rowdis);

                              echo "<option value=".$disposaltypeid.">".ucfirst($disposaltypename)."</option>";
                            }
          
                            ?>
                      </select>

	</div>
	<div class="form-group" id="disposedata">

	</div>
		<div class="form-group">
	<label>Facilitated By:</label>
	<input class="form-control" name="disposefaci">
	</div>
	 	<?php
	 } 
}

?>

    <script src="../../../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>

    <script type="text/javascript">
$(document).ready(function(){
  $('#disposalid').change(function(){
    var disposaltype = $('#disposalid').val();
    if(disposaltype != 0)
    {
      $.ajax({
        type:'post',
        url:'dispose.php',
        data:{disposaltypeid:disposaltype},
        cache:false,
        success: function(returndata){
          $('#disposedata').html(returndata);
        }
      });
    }
  })
})

    </script>