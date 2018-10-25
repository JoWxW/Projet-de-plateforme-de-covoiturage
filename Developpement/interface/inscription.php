<?php

$username =$_GET['username'];
$motdepasse =hash("md5", $_GET['motdepasse']);
$address =$_GET['address'];


session_start();
$_SESSION["username"]=$username;

require_once("database.php");

$requete = "SELECT idU FROM `utilisateur` WHERE `nom`= '$username'";
$resultat = mysqli_query($database, $requete);


if (mysqli_num_rows($resultat) == 0){
  $requete2 = "INSERT INTO `utilisateur`(`nom`, `motDePasse`, `address`) VALUES ('$username', '$motdepasse', '$address')";
  $resultat2 = mysqli_query($database, $requete2);

  if($resultat2){
    echo("Vous avez bien inscrire <br> Retourner à l'accueil dans 3 secondes");
    header("refresh:3;url=index.php");
  } else {
    echo("Problème d'inscription. Retourner à l'inscription dans 3 secondes.");
    header("refresh:3;url=inscription.html");
  }


}
else{
    echo("Votre username a déjà existé");
    header("refresh:3;url=inscription.html");
}
?>
