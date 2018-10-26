//code by web3.js Github, instantiate smart contract
  if (typeof web3 !== 'undefined') {
      web3 = new Web3(web3.currentProvider);
      console.log("ok");
  } else {
      // set the provider you want from Web3.providers
      web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));
  }
  //set default account
  web3.eth.defaultAccount = web3.eth.accounts[0];
  var trajetContract = web3.eth.contract(
    [
      {
        "inputs": [],
        "payable": false,
        "stateMutability": "nonpayable",
        "type": "constructor"
      },
      {
        "anonymous": false,
        "inputs": [
          {
            "indexed": false,
            "name": "id",
            "type": "uint256"
          },
          {
            "indexed": false,
            "name": "etat",
            "type": "uint256"
          }
        ],
        "name": "EtatOnChange",
        "type": "event"
      },
      {
        "anonymous": false,
        "inputs": [
          {
            "indexed": false,
            "name": "isWrong",
            "type": "bool"
          }
        ],
        "name": "SendBackErr",
        "type": "event"
      },
      {
        "constant": true,
        "inputs": [],
        "name": "getTrajetCount",
        "outputs": [
          {
            "name": "",
            "type": "uint256"
          }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
      },
      {
        "constant": true,
        "inputs": [
          {
            "name": "_id",
            "type": "uint256"
          }
        ],
        "name": "getTrajetById",
        "outputs": [
          {
            "name": "",
            "type": "string"
          },
          {
            "name": "",
            "type": "string"
          },
          {
            "name": "",
            "type": "string"
          },
          {
            "name": "",
            "type": "string"
          },
          {
            "name": "",
            "type": "uint256"
          },
          {
            "name": "",
            "type": "uint256"
          },
          {
            "name": "",
            "type": "address"
          },
          {
            "name": "",
            "type": "address"
          }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
      },
      {
        "constant": true,
        "inputs": [
          {
            "name": "_id",
            "type": "uint256"
          }
        ],
        "name": "getProprietaireByIdOnChain",
        "outputs": [
          {
            "name": "proprietaire",
            "type": "address"
          }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
      },
      {
        "constant": true,
        "inputs": [
          {
            "name": "_id",
            "type": "uint256"
          }
        ],
        "name": "getPassagerByIdOnChain",
        "outputs": [
          {
            "name": "passager",
            "type": "address"
          }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
      },
      {
        "constant": false,
        "inputs": [
          {
            "name": "_id",
            "type": "uint256"
          },
          {
            "name": "_date",
            "type": "string"
          },
          {
            "name": "_depart",
            "type": "string"
          },
          {
            "name": "_destination",
            "type": "string"
          },
          {
            "name": "_tarif",
            "type": "string"
          },
          {
            "name": "_proprietaire",
            "type": "address"
          },
          {
            "name": "_passger",
            "type": "address"
          }
        ],
        "name": "addTrajet",
        "outputs": [],
        "payable": false,
        "stateMutability": "nonpayable",
        "type": "function"
      },
      {
        "constant": false,
        "inputs": [
          {
            "name": "_id",
            "type": "uint256"
          },
          {
            "name": "_etatActuel",
            "type": "uint256"
          },
          {
            "name": "_newEtat",
            "type": "uint256"
          }
        ],
        "name": "changerEtat",
        "outputs": [
          {
            "name": "",
            "type": "bool"
          }
        ],
        "payable": false,
        "stateMutability": "nonpayable",
        "type": "function"
      }
    ]
  );
  var trajet = trajetContract.at('0xf29fd7af73ead89e1065dc08450c21a9b7b47775');
  function getTrajetNb(){
    var nb = trajet.getTrajetCount.call();
    return nb.valueOf();
  }

  function addTrajet(id, date, depart, destination, tarif, addPro, addPas){
    var tId = getTrajetNb();
    trajet.addTrajet.sendTransaction(id, date, depart, destination, tarif, addPro, addPas, {from: addPas, gas:3000000});
    return tId;
  }

  function getTrajets(){}

  $(document).ready(function() {

  });
