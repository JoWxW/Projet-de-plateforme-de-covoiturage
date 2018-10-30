const Trajet = artifacts.require("Trajet");


function packageInfo(infos){
  var str = infos.toString();
  var contractSha3 = web3.sha3(str);
  return contractSha3;
}

contract('Trajet test', async (accounts) => {

  it("should add a 'Trajet' on the chain", async () => {
     let instance = await Trajet.deployed();
     let infos = [23, "Nov 1", "Paris", "Bordeaux", "55.6€"];
     //let string = packageInfo(infos);
     //let signaturePro = web3.eth.sign(accounts[1], string);
     //let signaturePas = web3.eth.sign(accounts[2], string);
     await instance.addTrajet.sendTransaction(23, "Nov01", "Paris", "Bordeaux", "55.6€", accounts[1], accounts[2], {from: accounts[0], gas:3000000});
     await instance.addTrajet.sendTransaction(24, "Nov02", "Paris", "Bordeaux", "55.6€", accounts[1], accounts[2], {from: accounts[0], gas:3000000});
     let nbTrajet = await instance.getTrajetCount.call();
     assert.equal(nbTrajet.valueOf(), 2);
  });

  it("should return the address of passenger", async () => {
     let instance = await Trajet.deployed();
     let address = await instance.getPassagerByIdOnChain.call(0);
     assert.equal(address.valueOf(), accounts[2]);
  });

  it("should change status", async () => {
     let instance = await Trajet.deployed();
     await instance.changerEtat(0, 0, 1, {from: accounts[1], gas:3000000})
     let trajet = await instance.getTrajetByIdBDD.call(23);
     //assert.equal(trajet[6].valueOf(), 1);
     assert.equal(trajet[5].valueOf(), 1);
  });
})
