pragma solidity >=0.5.0 < 0.9.0;


contract Labresource{

    address deployer;

    event RegisterDeviceEvent(string indexed id);
    event SetLocationEvent(string indexed id);



    
    modifier verifyCaller(address _address) {
        require(msg.sender == _address, "Caller cannot be verified!");
        _;
    }

    constructor() public {
        deployer = msg.sender;
    }


    struct Device
    {
        string deviceid;
        string name;     
        string brand;
        string purchasedate;
        uint price;
        uint purchasereceiptno;
        string description;
    }

      mapping (string => Device) public devices;
    
    mapping (string=>bool) public inserted;
    
    string[] keys;
  
     modifier isDeviceExists(string memory deviceid) {
        require(bytes(devices[deviceid].deviceid).length==0, "Device Already Exists");
        _;
    }

    
     modifier isExist(string memory deviceid) {
        require(bytes(devices[deviceid].deviceid).length!=0, "Device Not Exists");
        _;
    }
  
    
    function registerDevice(string memory _deviceid, 
                        string memory _name,
                        string memory _brand,
                        string memory _purchasedate,
                        uint _price,
                        uint _purchasereceiptno,
                        string memory _description)public isDeviceExists(_deviceid) returns(bool)
    {
      
       // require(!inserted[_deviceid],"ALready Exist");
        
        inserted[_deviceid]=true;
        keys.push(_deviceid);
        Device storage device=devices[_deviceid];

        device.deviceid=_deviceid;
        device.name=_name;
        device.brand=_brand;
        device.purchasedate=_purchasedate;
        device.price=_price;
        device.purchasereceiptno=_purchasereceiptno;
        device.description=_description;

        emit RegisterDeviceEvent(_deviceid);
        
        return true;

    }

    function getDeviceDetails(string memory deviceid) 
                public view isExist(deviceid) returns(string memory _deviceid,
                                    string memory _name,
                                    string memory _brand,
                                    string memory _purchasedate,
                                    uint _price,
                                    uint _purchasereceiptno,
                                    string memory _description)
    {
        Device storage info=devices[deviceid];
        _deviceid=info.deviceid;
        _name=info.name;
        _brand=info.brand;
        _purchasedate=info.purchasedate;
        _price=info.price;
        _purchasereceiptno=info.purchasereceiptno;
        _description=info.description;
    }

 
    
}