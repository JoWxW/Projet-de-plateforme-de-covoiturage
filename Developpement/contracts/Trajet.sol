pragma solidity ^0.4.24;
contract Trajet {
  struct TrajetSelectionne {
    string date;
    string depart;
    string destination;
    string tarif;
    uint dateAjoute;
    //Etat:
    //0 = le trajet a été signé par prorpiétaire et passger,
    //1 = Le trajet est en cours,
    //2 = le passager a payé le trajet
    //3 = le propriétaire a validé le trajet = ce trajet est terminé
    //4 = le passger ou le propriétaire a signalé un probleme sur le trajet
    uint etat;
  }
  uint trajetCount;

//id(on chain) => trajet
  mapping (uint => TrajetSelectionne) trajets;
  //TrajetSelectionne[] trajets;
  //id on chain
  mapping (uint => address) proprietaireDeTrajet;
  mapping (uint => address) passagerDeTrajet;
  mapping (uint => uint) idBDDToIdOnChain;
  event EtatOnChange(uint id, uint etat);
  event SendBackErr(bool isWrong);

  function Trajet() {
    trajetCount = 0;
  }

  function getTrajetCount() view returns(uint){
    return trajetCount;
  }

  function getTrajetByIdBDD(uint _id) view returns(string, string, string, string, uint, uint, address, address) {
    uint idOnChain = idBDDToIdOnChain[_id];
    TrajetSelectionne memory t = trajets[idOnChain];
    address proprietaire = proprietaireDeTrajet[idOnChain];
    address passager = passagerDeTrajet[idOnChain];
    return(t.date, t.depart, t.destination, t.tarif, t.dateAjoute, t.etat, proprietaire, passager);
  }

  function getTrajetByIdOnChain(uint _id) view returns(string, string, string, string, uint, uint, address, address) {
    TrajetSelectionne memory t = trajets[_id];
    address proprietaire = proprietaireDeTrajet[_id];
    address passager = passagerDeTrajet[_id];
    return(t.date, t.depart, t.destination, t.tarif, t.dateAjoute, t.etat, proprietaire, passager);
  }

  function getProprietaireByIdOnChain(uint _id) view returns(address proprietaire) {
    proprietaire = proprietaireDeTrajet[_id];
  }

  function getPassagerByIdOnChain(uint _id) view returns(address passager) {
    passager = passagerDeTrajet[_id];
  }

  function addTrajet(uint _id, string _date, string _depart, string _destination, string _tarif, address _proprietaire, address _passger) {
    TrajetSelectionne memory t = TrajetSelectionne(_date, _depart, _destination,  _tarif, now, 0);
    trajets[trajetCount] = t;
    proprietaireDeTrajet[trajetCount] = _proprietaire;
    passagerDeTrajet[trajetCount] = _passger;
    idBDDToIdOnChain[_id] = trajetCount;
    trajetCount++;
  }

  function changerEtat(uint _id, uint _etatActuel, uint _newEtat) returns(bool) {
    uint idOnChain = idBDDToIdOnChain[_id];
    TrajetSelectionne storage t = trajets[idOnChain];

    address proprietaire = proprietaireDeTrajet[idOnChain];
    address passager = passagerDeTrajet[idOnChain];
    if(_newEtat == 1 || _newEtat == 4){
      //require(msg.sender == proprietaire || msg.sender == passager);
      if(msg.sender != proprietaire && msg.sender != passager){
        emit SendBackErr(true);
        return false;
      }
    }else if(_newEtat == 2){
      //require(msg.sender == passager);
      if(msg.sender != passager){
        emit SendBackErr(true);
        return false;
      }
    }else{
      //require(msg.sender == proprietaire);
      if(msg.sender != proprietaire){
        emit SendBackErr(true);
        return false;
      }
    }

    if(t.etat == _etatActuel){
      t.etat = _newEtat;
      emit EtatOnChange(_id, t.etat);
      return true;
    } else {
      emit SendBackErr(true);
      return false;
    }
  }
}
