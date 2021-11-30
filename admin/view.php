<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PICT Lab</title>
	<script src="./node_modules/web3/dist/web3.min.js"></script>
	 <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
</head>
<div class="container" py-5>
      <div class="row" mt-4>
   <div class="col-md-4" style="margin-top: 25px; margin-bottom:25px">
          <div class="card">
            <div class="card-body">
             
              <h4 class="card-title" id="devicetype"></h4>

              <h6 class="card-title" ><p id="id"></p></h6>
              <h6 class="card-title"><p id="brand"></p></h6>
              <h6 class="card-title"><p id="purchasedate"></p></h6>
              <h6 class="card-title"><p id="purchasereceiptno"></p></h6>
              <h6 class="card-title"><p id="description"></p></h6>
                   </div>
          </div>
        </div>

<body>
	<p1 id="display"></p1>
	<script>
		
	
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

			let url=window.location.href;
			let query=url.split('?')[1];
			let queryString=new URLSearchParams(query);
			let value="";
			for(let pair of queryString.entries()) {
				value=pair[1].toString();
            console.log(value);
        }
        let x;
			
			web3.eth.defaultAccount=web3.eth.accounts[0];
			var contracts=new web3.eth.Contract(abi,'0x6bD1AC58E8006b2991ee6F6097ecA8eF0DbC29C2');

			contracts.methods.getDeviceDetails(value).call().then(function(bal) {
			
			
			document.getElementById("devicetype").innerHTML=bal[1];
			document.getElementById("id").innerHTML="ID:"+bal[0];
			document.getElementById("brand").innerHTML="Brand:"+bal[2];
			document.getElementById("purchasedate").innerHTML="Purchase Date:"+bal[3];
			document.getElementById("purchasereceiptno").innerHTML="Receipt No:"+bal[5];
			document.getElementById("description").innerHTML="Description:"+bal[6];

		}).catch(function(tx)
					{
						alert("Device Not Exists ! or Invalid Code");
					})





	</script>

</body>
 

</html>