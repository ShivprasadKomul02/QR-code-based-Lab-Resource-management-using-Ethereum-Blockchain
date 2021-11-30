				
	 				<?php 
	 				include('lib/dbcon.php');
	 				$query_yes1 = mysqli_query($conn,"select * from stdevice where dev_status = 'damage'")or die(mysqli_error());
					$count_no = mysqli_num_rows($query_yes1);

		
		            ?>
					<?php $query_no = mysqli_query($conn,"select * from stdevice where dev_status = 'none'					
					")or die(mysqli_error());
					$count_yes = mysqli_num_rows($query_no);
					
		            ?>
					
					<?php $not_read1 = $count_no -  $count_yes; ?>
