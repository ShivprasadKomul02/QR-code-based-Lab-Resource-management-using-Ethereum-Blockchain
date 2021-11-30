<?php include('./lib/dbcon.php'); 
//dbcon();
 ?>
<?php
$id = $_POST['id'];
mysqli_query($conn,"delete from notification where notification_id = '$id'")or die(mysqli_error());
?>

