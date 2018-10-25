<?php

$username =$_GET['username'];
$motdepasse = hash("md5", $_GET['motdepasse']);
$type =$_GET['type'];

session_start();
$_SESSION["username"]=$username;

require_once("database.php");
$requete = "select motDePasse from utilisateur where nom='$username'";
$resultat = mysqli_query($database, $requete);

if (mysqli_num_rows($resultat) == 1) {
    while ($ligne = mysqli_fetch_array($resultat,MYSQL_NUM))
    {
        if ($ligne[0]==$motdepasse)
        {
           echo ("Bien Connecter<br>");
           echo ("Entrer dans 3 secondes");
           if($type="proprietaire"){
             header("refresh:3;url=proprietaire.php");
           } else {
             header("refresh:3;url=passager.php");
           }
        } else {
            echo ("Il y a problème de votre username ou mot de passe");
            header("refresh:3;url=identifiant.html");
        }
    }
} else {
  echo ("Il y a problème de votre username ou mot de passe");
  header("refresh:3;url=identifiant.html");
}
?>
