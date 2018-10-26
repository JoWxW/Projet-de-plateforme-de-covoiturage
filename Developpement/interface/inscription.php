<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Jo">

    <title>Demo - Plateform de Covoiturage</title>

    <!-- Bootstrap core CSS -->
    <link href="style/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400i,800" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="style/blocov.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">BloCov</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white">
      <div class="masthead-content">
        <div class="container">

        </div>
      </div>

    </header>
    <section>
      <div class="container">
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
    echo("<div>Vous vous êtes bien inscrit(e). <br> Veuillez vous identifier.</div>");
    header("refresh:3;url=identifiant.html");
  } else {
    echo("<div>Problème d'inscription. Retourner à l'inscription dans 3 secondes.</div>");
    header("refresh:3;url=inscription.html");
  }


}
else{
    echo("<div>Votre username a déjà existé</div>");
    header("refresh:3;url=inscription.html");
}
?>
<!-- Footer -->
<footer class="py-5 bg-black">
  <div class="container">
    <p class="m-0 text-center text-white small">Copyright &copy; BloCov 2018</p>
  </div>
  <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="js/jquery/jquery.min.js"></script>
<script src="style/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
