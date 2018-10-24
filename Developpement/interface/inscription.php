<?php

$username =$_GET['username'];
$motdepasse =$_GET['motdepasse'];
$address =$_GET['address'];

session_start();
$_SESSION["username"]=$username;

require_once("database.php");

$requete = "SELECT COUNT(*) FROM `utilisateur` WHERE `username`= '$username'";
$resultat = mysqli_query($database, $requete1);

if ($resultat) {
    //echo ("ok , la requete1 est correct   <br>\n" );
    $n = mysqli_fetch_array($resultat,MYSQL_NUM);

}


if ($n[0] == 0){
  $requete2 = "insert into utilisateur values('$username','$motdepasse','$address')";
  $resultat2 = mysqli_query($database, $requete2);
//echo("?-> $requete2 <br>\n");
//if ($resultat2) {
//    echo ("ok , la requete2 est correct   <br>\n" );
//}
    echo("Vous avez bien inscrire <br> Retourner à l'accueil dans 3 secondes");
    header("refresh:3;url=index.html");

}
else{
    echo("Votre username a déjà existé");
    header("refresh:3;url=inscription.html");
}
?>
