const Web3 = require("web3");
const ethereumUri = 'http://localhost:8545';

//const contract = require("truffle-contract");
//const data = require("./build/contracts/partTest.json");

const web3 = new Web3(new Web3.providers.HttpProvider(ethereumUri));
//const provider = new Web3.providers.HttpProvider(ethereumUri);

//var partTest = contract(data);
//var coinbase = "0x5e6f8e57e899d5c94c2189bda2bb910864ef8a24";
//var add1 = "0xc3471fea01c295171459664b46b47440b100b555";
//partTest.setProvider(provider);

/*partTest.deployed().then(function (instance){
  instance.singed.sendTransaction(4, 7, {from: web3.eth.accounts[1], gas:3000000});
});*/
function packageInfo(infos){
  var str = infos.toString();
  var contractSha3 = web3.sha3(str);
  return contractSha3;
}

let string1 = [1, 2];
let string2 = ["1", "2"];
console.log(packageInfo(string1));
console.log(packageInfo(string2));
