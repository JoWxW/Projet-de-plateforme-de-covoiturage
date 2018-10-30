# Projet-de-plateforme-de-covoiturage
## Introduction
Here is a demo of a plateform (in French) de car-pooling named BloCov where people are allowed to propose a car-shareing trip or choose a trip proposed by the other. 
The users sign up to the plateform with a username, a pass word and their address (public key) on the blockchain. 

Since the synchronous methods are used in the code, we presume that the account of the user is open during using the plateform and also there is enough cryptomonnaie in the account to pay the gas.
The address of both persons concernd a trip, the departure, the destination, the date and the price of the trip will be recorded on the blockchain. 
(Since only the address of the users are recorded, the personnal information is well protected.)

In the follow part, how to install and run this demo on a private blockchain will be presented.
## Installation
### Required
- node.js & npm
- wamp
- Truffle
> npm install truffle -g
- TestRPC
> npm install -g ethereumjs-testrpc

(TestRPC helps create a private and temporarely blockchain with 10 available accounts who has each 100 ETH. 
So an environment of real Ethereum is simulated.)
### Run the demo
1. Download all the files to the folder 'www' in the folder of your wamp.

Enter into the local database(localhost/phpmyadmin) with username="root" and password="".

Create a new database named 'demo_covoiturage' and import the file demo_covoiturage.sql (\Projet-de-plateforme-de-covoiturage\Developpement\interface\) into current database.
2. Setup test net (In Powershell/Terminal)
> testrpc
3. Compile & Test (In a new window of Powershell/Terminal)
(In the folder "\Projet-de-plateforme-de-covoiturage\Developpement")
> truffle compile

(There will be some warnings.)
> truffle test

(3 tests defined in test/test.js should all pass.)

4. Migrate the smart contract
> truffle migrate --reset

5. Copy the address of the smart contract who has deploied in the previous step and replace the address in the file named blocov.js(\Projet-de-plateforme-de-covoiturage\Developpement\interface\js\) at line 260.
> var trajet = trajetContract.at('paste_your_contract's_address_here');

6. Open localhost and find the folder named "interface" (\Projet-de-plateforme-de-covoiturage\Developpement\).

7. The demo should run.

## Language
- Solidity
- PHP
- Javascript
- HTML, CSS

## Reference
[Truffle Doc](https://truffleframework.com/docs/truffle/overview)

[Solidity Doc](https://solidity.readthedocs.io/en/v0.4.24/index.html)
