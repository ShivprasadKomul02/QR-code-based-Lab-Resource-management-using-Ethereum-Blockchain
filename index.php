<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PICT ASSETS</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>	
<div class="container d-flex justify-content-center align-items-center" style="min-height:100vh"> 
	
<form class="border shadow p-3 rounded" style="width:450px;" action="PHP/checklogin.php" method="post">
	<h2 class="text-center p-3">LOGIN </h2> 
	<?php if(isset($_GET["error"]))
	{
		?>

	<div class="alert alert-danger" role="alert">
		<?=$_GET["error"]?>
	</div>
	 <?php

	}

	?>
	<div class="mb-1">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username">
   </div>

  <div class="mb-1">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
   </div>


  <div class="mb-1">
    <label for="username" class="form-label">Select UserType :</label>
     </div>

   <select class="form-select mb-3" aria-label="Default select example" name="role">
	  <option selected value="Lab Assistant CM">Lab Assistant CM</option>
	  <option  value="Lab Assistant IT">Lab Assistant IT</option>
	  <option value="Lab Assistant EX">Lab Assistant EX</option>
	  
</select>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
</body>
</html>