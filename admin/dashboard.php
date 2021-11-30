<?php  include('header.php');
include('session.php');
include('lib/dbcon.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
			 <?php include('dashboard_slidebar.php'); ?>		
                <div class="span9" id="content">
                    <div class="row-fluid">
         	        <?php $query= mysqli_query($conn,"select * from users where id = '$session_id'")or die(mysqli_error());
			         $row = mysqli_fetch_array($query);			
			         ?>
                   <div class="col-lg-12">
                      <div class="alert alert-success alert-dismissable">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <img id="avatar1" class="img-responsive" src="images/pictlogo.png"><strong> Welcome! <?php echo $user_row['role']." ".$user_row['role'];  ?></strong>
                      </div>
                    </div>
     
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-dashboard">&nbsp;</i>Dashboard</div>
								<div class="muted pull-right"><i class="icon-time"></i>&nbsp;<?php include('time.php'); ?></div>
                            </div>
                            <div class="block-content collapse in">
							        <div class="span12">
									
<div class="block-content collapse in">
<div id="page-wrapper">
        <?php 
	     $stocks = mysqli_query($conn,"select * from stdevice
	     LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id")or die(mysqli_error());
		 $stocks = mysqli_num_rows($stocks);
		 ?>
                <div class="row-fluid">				
                    <div class="span6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
							  <div class="container-fluid">
                                <div class="row-fluid">
                                    <div class="span3"><br/>
                                        <i class="fa fa-desktop fa-5x"></i><br/>
                                    </div>
                                    <div class="span8 text-right"><br/>
                                        <div class="huge"><?php echo $stocks; ?></div>
                                        <div>All Stocked</div><br/>
                                    </div>
                                </div>
							 </div>	
                            </div>
                            <a href="device_stocks.php">							  
                                <div class="modal-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>							  
                            </a>
                        </div>
                    </div>
		<?php 
	     $new = mysqli_query($conn,"select * from stdevice
	     LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id
		 where dev_status='New'")or die(mysqli_error());
		 $new = mysqli_num_rows($new);
		 ?>			
                     <div class="span6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
							  <div class="container-fluid">
                                <div class="row-fluid">
                                    <div class="span3"><br/>
                                      <i class="fa fa-share-square fa-5x"></i><br/>
                                    </div>
                                    <div class="span8 text-right"><br/>
                                        <div class="huge"><?php echo $new;?></div>
                                        <div>New Device</div><br/>
                                    </div>
                                </div>
							 </div>	
                            </div>
                            <a href="newdevice.php">							  
                                <div class="modal-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>							  
                            </a>
                        </div>
                    </div>
				 </div>
 </div> 				 							
<div id="page-wrapper">
           <div class="row-fluid">
		 <?php 
	     $damage = mysqli_query($conn,"select * from stdevice
	     LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id
		 where dev_status='Damage'")or die(mysqli_error());
		 $damage = mysqli_num_rows($damage);
		 ?>	
			 <div class="span6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
							  <div class="container-fluid">
                                <div class="row-fluid">
                                    <div class="span3"><br/>
                                      <i class="fa fa-times-circle fa-5x"></i><br/>
                                    </div>
                                    <div class="span8 text-right"><br/>
                                        <div class="huge"><?php echo $damage;?></div>
                                        <div>Damage Device</div><br/>
                                    </div>
                                </div>
							 </div>	
                            </div>
                            <a href="damage.php">							  
                                <div class="modal-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>							  
                            </a>
                        </div>
                    </div>
		<?php 
	     $Repaired = mysqli_query($conn,"select * from stdevice
	     LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id
		 where dev_status='Repaired'")or die(mysqli_error());
		 $Repaired = mysqli_num_rows($Repaired);
		 ?>				
					<div class="span6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
							  <div class="container-fluid">
                                <div class="row-fluid">
                                    <div class="span3"><br/>
                                       <i class="fa fa-wrench fa-5x"></i><br/>
                                    </div>
                                    <div class="span8 text-right"><br/>
                                        <div class="huge"><?php echo $Repaired;?></div>
                                        <div>Repaired Device</div><br/>
                                    </div>
                                </div>
							 </div>	
                            </div>
                            <a href="device_stocks.php">							  
                                <div class="modal-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>							  
                            </a>
                        </div>
                    </div>   				
              </div>	       
        </div>  	
<div id="page-wrapper">
           <div class="row-fluid">
        <?php 
	     $dump = mysqli_query($conn,"select * from stdevice
	     LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id
		 where dev_status='Dump'")or die(mysqli_error());
		 $dump = mysqli_num_rows($dump);
		 ?>			   
			<div class="span6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
							  <div class="container-fluid">
                                <div class="row-fluid">
                                    <div class="span3"><br/>
                                       <i class="fa fa-support fa-5x"></i><br/>
                                    </div>
                                    <div class="span8 text-right"><br/>
                                        <div class="huge"><?php echo $dump;?></div>
                                        <div>Dump Device</div><br/>
                                    </div>
                                </div>
							 </div>	
                            </div>
                            <a href="dump_device.php">							  
                                <div class="modal-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>							  
                            </a>
                        </div>
                    </div>
		<?php 
	     $location = mysqli_query($conn,"select * from stlocation")or die(mysqli_error());
		 $location = mysqli_num_rows($location);
		 ?>			
					<div class="span6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
							  <div class="container-fluid">
                                <div class="row-fluid">
                                    <div class="span3"><br/>
                                       <i class="fa fa-sitemap fa-5x"></i><br/>
                                    </div>
                                    <div class="span8 text-right"><br/>
                                        <div class="huge"><?php echo $location;?></div>
                                        <div>Location</div><br/>
                                    </div>
                                </div>
							 </div>	
                            </div>
                            <a href="device_location.php">							  
                                <div class="modal-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>							  
                            </a>
                        </div>
                    </div>         			  
      </div>
 </div>

               
				
				
			                 </div>
                            </div>
                        </div>
                        <!-- /block -->
						
                    </div>
                    </div>
                 
                </div>
            </div>
    
         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
    </body>
