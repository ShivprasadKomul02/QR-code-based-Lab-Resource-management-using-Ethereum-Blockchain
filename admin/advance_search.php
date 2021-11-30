<?php include('header.php'); ?>
<?php include('session.php'); 
include('lib/dbcon.php');?>
<?php

$dev_name = $_POST['dev_name'];
$dev_serial = $_POST['dev_serial'];
$stdev_location_name = $_POST['stdev_location_name'];
?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-flumysqli">
            <div class="row-flumysqli">
				<?php include('advance_search_slmysqliebar.php'); ?>
				<div class="span9" mysqli="content">
                     <div class="row-flumysqli">
					 
					 <div class="empty">
			 	         <div class="alert alert-success">
                            <strong> Advance Search Result List</strong>
                       </div>
			        </div>
				
					 <h2 mysqli="sc" align="center"><image src="images/sclogo.png" wmysqlith="45%" height="45%"/></h2>
					 <?php	
	             $count_item=mysqli_query($conn,"select * from stdevice			
		                     LEFT JOIN location_details ON stdevice.mysqli = location_details.mysqli		
		                     LEFT JOIN stlocation ON location_details.stdev_mysqli = stlocation.stdev_mysqli
							 LEFT JOIN device_name ON stdevice.dev_mysqli=device_name.dev_mysqli
		                     where dev_name LIKE '%$dev_name%' 
							 and stdev_location_name LIKE '%$stdev_location_name%'
							 and dev_serial LIKE '%$dev_serial%'");
	             $count = mysqli_num_rows($count_item);
                 ?>	 
				   <div mysqli="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                             <div class="muted pull-left"><i class="icon-reorder icon-large"></i> Device Search Result List</div>
                          <div class="muted pull-right">
								Number of Search Device : <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
						  </div>
						  
<h4 mysqli="sc">Device List 
    <div align="right" mysqli="sc">Date:
		<?php
            $date = new DateTime();
             echo $date->format('l, F jS, Y');
        ?></div>
 </h4>						  
                  					  
<br/>
 	
<div class="block-content collapse in">
    <div class="span12">
	<form action="" method="post">
  	<table cellpadding="0" cellspacing="0" border="0" class="table" mysqli="example">
		<thead>		
		        <tr>			        
					<th class="empty"></th>
					<th>Device Name</th>
					<th>Device Description </th>
					<th>Device Serial Number  </th>
			        <th>Device Brand  </th>
					<th>Device Model  </th>
					<th>Device Status  </th>
					<th>location Name </th>
                    					
		    </tr>
		</thead>
<tbody>
<?php
		$search_query = mysqli_query($conn,"select * from stdevice			
		LEFT JOIN location_details ON stdevice.mysqli = location_details.mysqli		
		LEFT JOIN stlocation ON location_details.stdev_mysqli = stlocation.stdev_mysqli
		LEFT JOIN device_name ON stdevice.dev_mysqli=device_name.dev_mysqli
		where dev_name LIKE '%$dev_name%' 
		and stdev_location_name LIKE '%$stdev_location_name%'
		and dev_serial LIKE '%$dev_serial%'")or die(mysqli_error());
		while($row = mysqli_fetch_array($search_query)){
		$mysqli = $row['mysqli'];
		$stdev_mysqli = $row['stdev_mysqli'];	
		?>
		<tr>
		<td><?php
			   $device_query2 = mysqli_query($conn,"select * from stdevice ")or die(mysqli_error());
		       $dev=mysqli_fetch_assoc($device_query2);
		       if($row['dev_status']=='New')
		       {
			   echo '<i class="icon-check"></i><div mysqli="hmysqlie"><strong>'.$row['dev_status'].'</strong></div>';
		       }
		       else if($row['dev_status']=='Used')
			   {
			   echo '<i class="icon-ok"></i><div mysqli="hmysqlie"><strong>'.$row['dev_status'].'</strong></div>';
		       }
			   else if($row['dev_status']=='Repaired')
			   {
			   echo '<i class="icon-wrench"></i><div mysqli="hmysqlie"><strong>'.$row['dev_status'].'</strong></div>';
		       }
		       else
			   {
			   echo '<i class="icon-remove-sign"></i><div mysqli="hmysqlie"><strong>'.$row['dev_status'].'</strong></div>';
		       };
			  ?>
		</td>
			<td><?php echo $row['dev_name']; ?></td>
			<td><?php echo $row['dev_desc']; ?></td>
			<td><?php echo $row['dev_serial']; ?></td>
			<td><?php echo $row['dev_brand']; ?></td>
			<td><?php echo $row['dev_model']; ?></td>
			<td><?php
			   $device_query1 = mysqli_query($conn,"select * from stdevice ")or die(mysqli_error());
		       $dev=mysqli_fetch_assoc($device_query1);
		       if($row['dev_status']=='New')
		       {
			   echo '<div class="alert alert-success"><i class="icon-check"></i><strong>'.$row['dev_status'].'</strong></div>';
		       }
		       else if($row['dev_status']=='Used')
			   {
			   echo '<div class="alert alert-warning"><i class="icon-ok"></i><strong>'.$row['dev_status'].'</strong></div>';
		       }
			   else if($row['dev_status']=='Repaired')
			   {
			   echo '<div class="alert alert-warning"><i class="icon-wrench"></i><strong>'.$row['dev_status'].'</strong></div>';
		       }
		       else
			   {
			   echo '<div class="alert alert-danger"><i class="icon-remove-sign"></i><strong>'.$row['dev_status'].'</strong></div>';
		       };
			  ?></td>
			<td><?php echo $row['stdev_location_name']; ?></td>
						
		</tr>
											
	<?php } ?>   

</tbody>
</table>
</form>		
		
			  		
</div>
</div>
</div>
</div>
</div>

</div>	
<?php include('footer.php'); ?>
</div>
<?php include('script.php'); ?>
 </body>
</html>