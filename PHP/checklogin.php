<?php 
include '../dbcon.php';
session_start();

if(isset($_POST["username"]) && isset($_POST["password"])&& isset($_POST["role"]))
{
	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$username=test_input($_POST["username"]);
$password=test_input($_POST["password"]); 
$role=test_input($_POST["role"]);
if(empty($username))
{
	header("Location:../index.php?error=Username is empty");
}
else if(empty($password))
{
	header("Location:../index.php?error=Password is empty");
}
else
{
	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result=mysqli_query($conn,$query);

	if(mysqli_num_rows($result)===1)
	{
		$row = mysqli_fetch_assoc($result);
		if($row['username']== $username && $row['password']== $password && $row['role']==$role)
		{
			$_SESSION['id']=$row['id'];
			$_SESSION['role']=$row['role'];
			$_SESSION['username']=$row['username'];	
			header("Location:../admin/dashboard.php");  
		}
		else
	{
		header("Location:../index.php?error=Username and Password is incorrect");
	}
	}else
	{
		header("Location:../index.php?error=Username and Password is incorrect");
	}




}



}
else
{
	header("Location:../index.php");
}



 ?>