pragma solidity >=0.5.0 < 0.9.0;

import "./Ownable.sol";

contract LabResource is Ownable {
    
    address public lastAccess;
    constructor() public {
        authorizedCaller[msg.sender] = 1;
        emit AuthorizedCaller(msg.sender);
    }
    
    /* Events */
    event AuthorizedCaller(address caller);
    event DeAuthorizedCaller(address caller);
    
    /* Modifiers */
    
    modifier onlyAuthCaller(){
        lastAccess = msg.sender;
        require(authorizedCaller[msg.sender] == 1);
        _;
    }
    


    /* User Related */
    struct user {
        string id;
        string name;
        uint contactNo;
        string designation;
        string role;
        string department;
    } 
    
    mapping(string => user) userDetails;
    mapping(string=>Device) deviceDetails;
    
    /* Caller Mapping */
    mapping(address => uint8) authorizedCaller;


    
    /* authorize caller */
    function authorizeCaller(address _caller) public onlyOwner returns(bool) 
    {
        authorizedCaller[_caller] = 1;
        emit AuthorizedCaller(_caller);
        return true;
    }
    
    /* deauthorize caller */
    function deAuthorizeCaller(address _caller) public onlyOwner returns(bool) 
    {
        authorizedCaller[_caller] = 0;
        emit DeAuthorizedCaller(_caller);
        return true;
    }
    
    /*User Roles
        ADMIN,
        LAB ASSISTANTS        
    */

    mapping (string => string) nextAction;
    
    user userDetail;
    
    function getUserRole(address _caller) public onlyOwner returns(bool)
    {
        return true;
    }
    
    /* Get Next Action  */    
    function getNextAction(string memory _deviceid) public  onlyAuthCaller returns(string memory) 
    {
        return nextAction[_deviceid];
    }
        
    /*set user details*/
    function setUser(
                     string memory _facultyid,
                     string memory _name, 
                     uint _contactNo, 
                     string memory _role,
                     string memory _designation,
                     string memory _department) public onlyAuthCaller returns(bool){
        
        /*store data into struct*/
        userDetail.name = _name;
        userDetail.contactNo = _contactNo;
        userDetail.id=_facultyid;
        userDetail.designation=_designation;
        userDetail.department=_department;
        userDetail.role=_role;
        /*store data into mapping*/
        userDetails[_facultyid] = userDetail;

        
        return true;
    }  
    
    function getUser(string memory id) public onlyAuthCaller returns( string memory userid,
                                                                    string memory name, 
                                                                    uint contactNo, 
                                                                    string memory role,
                                                                    string memory designation,
                                                                    string memory department)
    {
        /*Getting value from struct*/
        user memory tmpData = userDetails[id];
        
        return (tmpData.id,tmpData.name, tmpData.contactNo, tmpData.role, tmpData.designation,tmpData.department);
    }
    
    
    struct Device
    {
        string deviceid;
        string name;     
        string brand;
        uint purchasedate;
        uint price;
        uint purchasereceiptno;
        string description;
    }

    function addDevice(string memory _deviceid, 
                        string memory _name,
                        string memory _brand,
                        uint _purchasedate,
                        uint _price,
                        uint _purchasereceiptno,
                        string memory _description)public onlyAuthCaller returns(bool)
    {
        Device memory tempDevice=Device(_deviceid,_name,_brand,_purchasedate,_price,_purchasereceiptno,_description);

        deviceDetails[_deviceid] = tempDevice;
        return true;

    }

    function getDeviceDetails(string memory deviceid) 
                public onlyAuthCaller returns(string memory _deviceid,
                                    string memory _name,
                                    string memory _brand,
                                    uint _purchasedate,
                                    uint _price,
                                    uint _purchasereceiptno,
                                    string memory _description)
    {
        Device memory tempDevice=deviceDetails[deviceid];
    
        return (tempDevice.deviceid,tempDevice.name,tempDevice.brand,tempDevice.purchasedate,tempDevice.price,tempDevice.purchasereceiptno,tempDevice.description);
    }

    
   
}    