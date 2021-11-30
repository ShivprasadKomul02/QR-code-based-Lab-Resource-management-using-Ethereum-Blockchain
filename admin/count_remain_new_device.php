				
	 				<?php 
	 				include('lib/dbcon.php');
	 				$query_yes_new = mysqli_query($conn,"select * from stdevice		            
		             where NOT EXISTS 
	                (select * from location_details where stdevice.id = location_details.id)
		             and dev_status='new' ORDER BY stdevice.id DESC")or die(mysqli_error());
					$count_no_new = mysqli_num_rows($query_yes_new);

		
		            ?>
					<?php $query_no_new = mysqli_query($conn,"select * from stdevice		            
		            where NOT EXISTS 
	                (select * from location_details where stdevice.id = location_details.id)
		            and dev_status='none' ORDER BY stdevice.id DESC")or die(mysqli_error());
					$count_yes_new = mysqli_num_rows($query_no_new);
					
		            ?>
					
					<?php $not_read_new = $count_no_new -  $count_yes_new; ?>
