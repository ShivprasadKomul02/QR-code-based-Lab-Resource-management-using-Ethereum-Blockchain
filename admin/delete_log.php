<?php
include('./lib/dbcon.php'); 
 
if (isset($_POST['delete_log'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"DELETE FROM activity_log where activity_log_id='$id[$i]'");
}
header("location: activity_log.php");
}
?>