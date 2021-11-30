pragma solidity >=0.5.0 < 0.9.0;

contract demo
{
    uint x;

    function set(uint no) public
    {
        x=no+1;

    }
    function get() view public returns(uint)
    {
        return x;
        
    }
}