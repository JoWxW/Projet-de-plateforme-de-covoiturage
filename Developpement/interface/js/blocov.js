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
  var trajetContract = web3.eth.contract([
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
      "name": "getTrajetByIdBDD",
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
      "name": "getTrajetByIdOnChain",
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
  ],
  );
  var trajet = trajetContract.at('0xff1723f2355a984e585f6623203f72b757346b74');

  function getTrajetNb(){
    var nb = trajet.getTrajetCount.call();
    return nb.valueOf();
  }

  function getAddresseOfPassager(id){
    var address = trajet.getPassagerByIdOnChain.call(id);
    return address;
  }

  function getAddresseOfProprietaire(id){
    var address = trajet.getProprietaireByIdOnChain.call(id);
    return address;
  }

  function addTrajet(id, date, depart, destination, tarif, addPro, addPas){
    var tId = getTrajetNb();
    trajet.addTrajet.sendTransaction(id, date, depart, destination, tarif, addPro, addPas, {from: addPas, gas:3000000});
    return tId;
  }



  function getTrajets(address, type){
    var nb = getTrajetNb();
    var addressOnChain;
    var result="";
    for(var i=0; i<nb; i++){
      if(type=="passager"){
        addressOnChain = getAddresseOfPassager(i);
      } else if (type == "proprietaire") {
        addressOnChain = getAddresseOfProprietaire(i);
      } else {
        return "Error."
      }
      if (addressOnChain == address) {
        var TrajetOnchain = trajet.getTrajetByIdOnChain.call(i);
        result += "<ul>Trajet ID (sur Blockchain): " + i + "<li>Date : " + TrajetOnchain[0].valueOf() + "</li><li>Départ : " + TrajetOnchain[1].valueOf() + "</li><li>Destination : " + TrajetOnchain[2].valueOf() + "</li><li>Prix de covoiturage : " + TrajetOnchain[3].valueOf() + "</li><li>Etat : " + TrajetOnchain[5].valueOf() + "</li><li>Adresse de propriétaire : " + TrajetOnchain[6].valueOf() + "</li><li>Adresse de passager : " + TrajetOnchain[7].valueOf() + "</li></ul>";
      }
    }
    return result;
  }

  function changerEtatOnChain(id, nowE, newE, supplier){
    trajet.changerEtat.sendTransaction(id, nowE, newE, {from: supplier, gas:3000000});
  }

  $(document).ready(function() {
  });
