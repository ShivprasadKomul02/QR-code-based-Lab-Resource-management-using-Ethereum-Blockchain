<?php 
include('lib/dbcon.php');
	$my_device = mysqli_query($conn,"select * from location_details    
	LEFT JOIN stdevice ON location_details.id = stdevice.id
	LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id
	where NOT EXISTS 
    (select * from location_details where dev_status='Dump')
    and stdev_id = '$stdev_id' ")or die(mysqli_error());
	$count_yes = mysqli_num_rows($my_device);
?>

<?php 
	$my_device = mysqli_query($conn,"select * from location_details    
	LEFT JOIN stdevice ON location_details.id = stdevice.id
	LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id
	where NOT EXISTS 
    (select * from location_details where dev_status='Dump')
    and stdev_id =''")or die(mysqli_error());
	$count_no = mysqli_num_rows($my_device);
?>

<?php $not_count = $count_yes -  $count_no; ?>