<?php

$username =$_GET['username'];
$motdepasse =$_GET['motdepasse'];
$type =$_GET['type'];

session_start();
$_SESSION["username"]=$username;

require_once("database.php");
$requete = "select username from utilisateur where username='$username'";
$resultat = mysqli_query($database, $requete);

$requete1 = "SELECT COUNT(*) FROM `utilisateur` WHERE `utilisateur`= '$username'";
$resultat1 = mysqli_query($database, $requete1);

if ($resultat1) {
    $n = mysqli_fetch_array($resultat1,MYSQL_NUM);
}

//echo("?-> $requete <br>\n");
if ($resultat) {
    //echo ("ok , la requete est correct   <br>\n" );
    if ($n[0] == 0){
     echo ("Il y a problème de votre username ou mot de passe<br> Retourner dans 3 secondes");
     header("refresh:3;url=identifiant.html");
    }
    else{
    while ($ligne = mysqli_fetch_array($resultat,MYSQL_NUM))
    {
        if ($ligne[0]==$motdepasse)
        {
           echo ("Bien Connecter<br>");
           echo ("Entrer dans 3 secondes");
           if($type="proprietaire"){
             header("refresh:3;url=proprietaire.php");
           }
           header("refresh:3;url=passager.php");
        }
        else {
            echo ("Il y a problème de votre username ou mot de passe");
            header("refresh:3;url=identifiant.html");
        }
    }
    }
}
?>
