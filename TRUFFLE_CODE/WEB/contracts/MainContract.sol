pragma solidity >=0.5.0 < 0.9.0;
import "./LabResource.sol";
import "./Ownable.sol";

contract MainContract is Ownable
{
  
    event RegisterDeviceEvent(string indexed id);
    event SetLocationEvent(string indexed id);

    
    LabResource labresource;


    modifier isValidPerformer(address add) {
        
        require(msg.sender==add,"Not Verified");
        _;
  
    }
    
    
    constructor(address _labresourceAddress) public {
        labresource = LabResource(_labresourceAddress);
    }
    
    
    
    
    function getDeviceDetails(string memory  deviceid) public returns (
                        string memory _deviceid, 
                        string memory _name,
                        string memory _brand,
                        uint _purchasedate,
                        uint _price,
                        uint _purchasereceiptno,
                        string memory _description) {
        
        (_deviceid,_name,_brand,_purchasedate,_price,_purchasereceiptno,_description) =
                    labresource.getDeviceDetails(deviceid);  
         
         return (_deviceid,_name,_brand,_purchasedate,_price,_purchasereceiptno,_description);
 
    }
    
    function RegisterDevice(string memory _deviceid, 
                        string memory _name,
                        string memory _brand,
                        uint _purchasedate,
                        uint _price,
                        uint _purchasereceiptno,
                        string memory _description) public isValidPerformer (msg.sender) returns(bool) {
                                    
        bool status = labresource.addDevice(_deviceid,_name,_brand,_purchasedate,_price,_purchasereceiptno,_description);  
        
        emit RegisterDeviceEvent(_deviceid);
        return (status);
    }
}