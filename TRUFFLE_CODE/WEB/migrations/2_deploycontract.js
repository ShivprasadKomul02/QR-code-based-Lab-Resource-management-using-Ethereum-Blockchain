var LabResource = artifacts.require("./LabResource");
var MainContract = artifacts.require("./MainContract");
var UserManagement = artifacts.require("./UserManagement");


module.exports = function(deployer){
	deployer.deploy(LabResource)
	.then(()=>{
		return deployer.deploy(MainContract,LabResource.address);
	})
	.then(()=>{
		return deployer.deploy(UserManagement,LabResource.address);
	})
	.then(()=>{
   		return LabResource.deployed();
    }).then(async function(instance){
		await instance.authorizeCaller(MainContract.address); 
		await instance.authorizeCaller(UserManagement.address);
		return instance;
	})
	.catch(function(error)
	{
		console.log(error);
	});
};


