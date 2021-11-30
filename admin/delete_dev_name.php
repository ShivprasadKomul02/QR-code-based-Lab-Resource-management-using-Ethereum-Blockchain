<?php
include('./lib/dbcon.php');

if (isset($_POST['delete_dev_name'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"DELETE FROM device_name where dev_id='$id[$i]'");
}
header("location: dev_name.php");
}
?>