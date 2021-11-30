<?php include('header.php'); ?>
<?php include('session.php');
 ?>
    <body>
    	 <script src="./node_modules/web3/dist/web3.min.js"></script>

    	<script type="text/javascript">	

				if(typeof web3 !== 'undefined') {

							web3=new Web3(web3.currentProvider);
						}
						else
						{
							web3=new Web3(new Web3(new Web3.providers.HttpProvider("HTTP://localhost:7545")));
						}
	let abi=[
	{
		"inputs": [],
		"stateMutability": "nonpayable",
		"type": "constructor"
	},
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": true,
				"internalType": "string",
				"name": "id",
				"type": "string"
			}
		],
		"name": "RegisterDeviceEvent",
		"type": "event"
	},
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": true,
				"internalType": "string",
				"name": "id",
				"type": "string"
			}
		],
		"name": "SetLocationEvent",
		"type": "event"
	},
	{
		"inputs": [
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			}
		],
		"name": "devices",
		"outputs": [
			{
				"internalType": "string",
				"name": "deviceid",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "name",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "brand",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "purchasedate",
				"type": "string"
			},
			{
				"internalType": "uint256",
				"name": "price",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "purchasereceiptno",
				"type": "uint256"
			},
			{
				"internalType": "string",
				"name": "description",
				"type": "string"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "string",
				"name": "deviceid",
				"type": "string"
			}
		],
		"name": "getDeviceDetails",
		"outputs": [
			{
				"internalType": "string",
				"name": "_deviceid",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_name",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_brand",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_purchasedate",
				"type": "string"
			},
			{
				"internalType": "uint256",
				"name": "_price",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "_purchasereceiptno",
				"type": "uint256"
			},
			{
				"internalType": "string",
				"name": "_description",
				"type": "string"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			}
		],
		"name": "inserted",
		"outputs": [
			{
				"internalType": "bool",
				"name": "",
				"type": "bool"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "string",
				"name": "_deviceid",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_name",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_brand",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_purchasedate",
				"type": "string"
			},
			{
				"internalType": "uint256",
				"name": "_price",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "_purchasereceiptno",
				"type": "uint256"
			},
			{
				"internalType": "string",
				"name": "_description",
				"type": "string"
			}
		],
		"name": "registerDevice",
		"outputs": [
			{
				"internalType": "bool",
				"name": "",
				"type": "bool"
			}
		],
		"stateMutability": "nonpayable",
		"type": "function"
	}
];


			web3.eth.defaultAccount=web3.eth.accounts[0];
			var contracts=new web3.eth.Contract(abi,'0x6bD1AC58E8006b2991ee6F6097ecA8eF0DbC29C2');

    		

    		function displayQR()
    		{
    			var id=document.getElementById("deviceid").value;
    			var data="https://localhost/STCPROJECT/admin/view.php?id="+id;
    			var width="150";
    			var height="150";
    			var url="https://chart.googleapis.com/chart?cht=qr&chs="+width+"x"+height+"&chl="+data;
    			document.getElementById("qrlabel").style.display="block";

    			document.getElementById("qrimg").style.display="block";
    			document.getElementById("qrimg").src=url;
    			
    		}


	    	function registerDevice()
	    	{
				
			const deviceid = document.getElementById('deviceid').value.toString();
	        const name = document.getElementById('devtype').value.toString();
	        const brand = document.getElementById('dev_brand').value.toString();
	        const purchasedate = document.getElementById('purchasedate').value.toString();
	        const price = parseInt(document.getElementById('price').value);
	        const purchasereceiptno = parseInt(document.getElementById('slipno').value);
	        const description = document.getElementById('description').value.toString();
	        
						web3.eth.getAccounts().then(function(accounts) {
						var acc=accounts[0];
						return contracts.methods.registerDevice(deviceid,name,brand,purchasedate,price,purchasereceiptno,description).send({from: acc,gas:3000000});
					}).then(function(tx)
					{
						alert("Devide Added Succesfully");
						console.log(tx);
					}).catch(function(tx)
					{
						console.log(tx);
					})
					
	    	}
    		
    	</script>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('Device_sidebar.php');
				 ?>
		
						<div class="span9" id="content">
		                    <div class="row-fluid">
							
		                        <!-- block -->
		                        <div class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Add Device</div>
										<div class="muted pull-right"><a id="return" data-placement="left" title="Click to Return" href="device_stocks.php"><i class="icon-arrow-left icon-large"></i> Back</a></div>
										<script type="text/javascript">
										$(document).ready(function(){
										$('#return').tooltip('show');
										$('#return').tooltip('hide');
										});
										</script>                          
		                            </div>
									
		                <div class="block-content collapse in">	
                         <div class="alert alert-success"><i class="icon-info-sign"></i> Please Fill in required details</div>						
							<form class="form-horizontal">											
								
										<div class="control-group">
		                                 <label class="control-label" for="inputEmail">Device Name</label>
			                                <div class="controls">
				                              <select id="devtype" class="chzn-select"  required/>
				                                 <option value="CPU">CPU</option>
				                                 <option value="Monitor">Monitor</option>
			                                     </select>
		                                     </div>
	                                    </div>
											
										<div class="control-group">
											<label class="control-label" for="inputPassword">Device id</label>
											<div class="controls">
											<input type="text" class="span8" name="deviceid" id="deviceid" placeholder="Device id" required>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Device Brand</label>
											<div class="controls">
											<input type="text" class="span8" name="dev_brand" id="dev_brand" placeholder="Device Manufacturer" required>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Purchase Date</label>
											<div class="controls">
											<input type="date" class="span8" name="purchasedate" id="purchasedate" placeholder="Date of Purchase" required>
											</div>
										</div>
										
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Price</label>
											<div class="controls">
											<input type="text" class="span8" name="price" id="price" placeholder="Price in Rs." required>
											</div>
										</div>
										
										<div id="hide">
										<div class="control-group">
											<label class="control-label" for="inputPassword"  placeholder="Current user" >Registerd By:</label>
											<div class="controls">
											<p name="currentuser" id="currentuser"><?php echo $SESSION['username'];?></p>
											</div>
										</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Purchase Slip No</label>
											<div class="controls">
											<input type="text" class="span8" name="slipno" id="slipno" placeholder="Purchase Receipt No" required>
											</div>
										</div>
										
												
										<div class="control-group">
											<label class="control-label" for="inputPassword">Description</label>
											<div class="controls">
													<textarea name="description" rows="10" cols="30" placeholder="Description:Scrren size,Resolution,Ports,screen size etc" id="description" onfocusout="displayQR()" required></textarea>
											</div>
										</div>
											
										<div class="control-group">
											<label class="control-label" for="inputPassword" id="qrlabel" style="display:none">QR Code</label>
											<div class="controls">
												<img src="" alt="QR code" width="200px" height="200px" id="qrimg" 
											
												style="border: none;display: none;" />

											</div>												 
										</div>
									
										
											
										<div class="control-group">
										<div class="controls">
										<button name="save" id="save" name="singlebutton" data-placement="right" title="Click here to Save your new data." class="btn btn-primary" onclick="registerDevice()" ><i class="icon-save"></i> Save</button>				
										</div>
										</div>
										<script type="text/javascript">
										$(document).ready(function(){
										$('#save').tooltip('show');
										$('#save').tooltip('hide');
										});
										</script>
							</form>
		                            </div>
		                        </div>
		                    </div>
		                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>