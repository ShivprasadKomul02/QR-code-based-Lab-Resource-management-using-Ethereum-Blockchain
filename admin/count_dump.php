				
	 				<?php 
	 				include('lib/dbcon.php');
	 				$query_yes_dump = mysqli_query($conn,"select * from stdevice where dev_status = 'Dump'")or die(mysqli_error());
					$count_dump_no = mysqli_num_rows($query_yes_dump);

		
		            ?>
					<?php $query_no_dump = mysqli_query($conn,"select * from stdevice where dev_status = 'none'					
					")or die(mysqli_error());
					$count_yes_dump = mysqli_num_rows($query_no_dump);
					
		            ?>
					
					<?php $not_read_dump = $count_dump_no -  $count_yes_dump; ?>
