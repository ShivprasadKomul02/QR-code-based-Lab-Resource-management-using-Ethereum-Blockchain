<?php include('header.php'); ?>
<?php include('session.php');
include('lib/dbcon.php'); ?>
    <body>
    	<script type="text/javascript">alert("WELCOME");</script>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('Device_sidebar.php');
				 ?>
		
						<div class="span9" id="content">
		                    <div class="row-fluid">
							
		                        <!-- block -->
		                        <div class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Add Device</div>
										<div class="muted pull-right"><a id="return" data-placement="left" title="Click to Return" href="device_stocks.php"><i class="icon-arrow-left icon-large"></i> Back</a></div>
										<script type="text/javascript">
										$(document).ready(function(){
										$('#return').tooltip('show');
										$('#return').tooltip('hide');
										});
										</script>                          
		                            </div>
									
		                <div class="block-content collapse in">	
                         <div class="alert alert-success"><i class="icon-info-sign"></i> Please Fill in required details</div>						
							<form class="form-horizontal" method="post">											
								
										<div class="control-group">
		                                 <label class="control-label" for="inputEmail">Device Name</label>
			                                <div class="controls">
				                              <select name="dev_id" class="chzn-select"  required/>
				                                 <option></option>
			                                     <?php $device_name=mysqli_query($conn,"select * from device_name")or die(mysqli_error()); 
			                                     while ($row=mysqli_fetch_array($device_name)){ 												
												 ?>
				                                 <option value="<?php echo $row['dev_id']; ?>&nbspName&nbsp<?php echo $row['dev_name']; ?>"><?php echo $row['dev_name']; ?></option>
				                                 <?php } ?>
				                               </select>
		                                     </div>
	                                    </div>
											
										<div class="control-group">
											<label class="control-label" for="inputPassword">Device id</label>
											<div class="controls">
											<input type="text" class="span8" name="deviceid" id="inputPassword" placeholder="Device id" required>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Device Brand</label>
											<div class="controls">
											<input type="text" class="span8" name="dev_brand" id="inputPassword" placeholder="Device Manufacturer" required>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Purchase Date</label>
											<div class="controls">
											<input type="date" class="span8" name="purchasedate" id="inputPassword" placeholder="Date of Purchase" required>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Device Model</label>
											<div class="controls">
											<input type="text" class="span8" name="dev_model" id="inputPassword" placeholder="Device Model" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Price</label>
											<div class="controls">
											<input type="text" class="span8" name="dev_model" id="inputPassword" placeholder="Price in Rs." required>
											</div>
										</div>
										
										<div id="hide">
										<div class="control-group">
											<label class="control-label" for="inputPassword"  placeholder="Current user" >Registerd By:</label>
											<div class="controls">
											<p name="currentuser" id="currentuser"><?php echo $SESSION['username'];?></p>
											</div>
										</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Purchase Slip No</label>
											<div class="controls">
											<input type="text" class="span8" name="slipno" id="inputPassword" placeholder="Purchase Receipt No" required>
											</div>
										</div>
										
												
										<div class="control-group">
											<label class="control-label" for="inputPassword">Description</label>
											<div class="controls">
													<textarea name="description" rows="10" cols="30" placeholder="Description:Scrren size,Resolution,Ports,screen size etc"></textarea>
											</div>
										</div>
											
										<div class="control-group">
										<div class="controls">
										<button name="save" id="save" name="singlebutton" data-placement="right" title="Click here to Save your new data." class="btn btn-primary"><i class="icon-save"></i> Save</button>				
										</div>
										</div>
										<script type="text/javascript">
										$(document).ready(function(){
										$('#save').tooltip('show');
										$('#save').tooltip('hide');
										});
										</script>
							</form>
<?php
if (isset($_POST['save'])){
$dev_id = $_POST['dev_id'];
$dev_desc = $_POST['dev_desc'];
$dev_serial = $_POST['dev_serial'];
$dev_brand = $_POST['dev_brand'];
$dev_model = $_POST['dev_model'];
$dev_status = $_POST['dev_status'];
										
						
$query = mysqli_query($conn,"select * from stdevice where dev_serial = '$dev_serial' ")or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Device Code Already Exist');
window.location = "device_stocks.php";
</script>
<?php
}else{
mysqli_query($conn,"insert into stdevice (dev_id,dev_desc,dev_serial,dev_brand,dev_model,dev_status) values('$dev_id','$dev_desc','$dev_serial','$dev_brand','$dev_model','$dev_status')")or die(mysqli_error($conn));
	// mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$admin_username','Add device Detail id $ 	dev_id')")or die(mysqli_error());											
?>
<script>
window.location = "device_stocks.php";
$.jGrowl("Device Successfully added", { header: 'Device add' });
</script>
<?php
}
}
?>
																										
		                            </div>
		                        </div>
		                    </div>
		                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>