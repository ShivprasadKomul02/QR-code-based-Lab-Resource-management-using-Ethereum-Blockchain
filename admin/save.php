<?php
										include("./lib/dbcon.php");
										//dbcon();			
										$dev_name = $_POST['dev_name'];
										$dev_desc = $_POST['dev_desc'];
										$dev_serial = $_POST['dev_serial'];
										$dev_brand = $_POST['dev_brand'];
										$dev_model = $_POST['dev_model'];
										$dev_status = $_POST['dev_status'];
										
						
										$query = mysqli_query($conn,"select * from stdevice where dev_serial = '$dev_serial' ")or die(mysqli_error());
										$count = mysqli_num_rows($query);

										if ($count > 0){ ?>
										<script>
										alert('Warning Device Serial Number already Exist');
										window.location = "device_stocks.php";
										</script>
										<?php
										}else{
										mysqli_query($conn,"insert into stdevice (dev_name,dev_desc,dev_serial,dev_brand,dev_model,dev_status) values('$dev_name','$dev_desc','$dev_serial','$dev_brand','$dev_model','$dev_status')")or die(mysqli_error());
																				
										?>
										<script>
										window.location = "device_stocks.php";
										</script>
										<?php
										}										
										
										?>