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
$motdepasse = hash("md5", $_GET['motdepasse']);
$type =$_GET['type'];


$_SESSION["username"]=$username;
$_SESSION["type"]=$type;

require_once("database.php");
$requete = "select motDePasse, address from utilisateur where nom='$username'";
$resultat = mysqli_query($database, $requete);

if (mysqli_num_rows($resultat) == 1) {
    while ($ligne = mysqli_fetch_array($resultat,MYSQL_NUM))
    {
        if ($ligne[0]==$motdepasse)
        {
          $_SESSION['address']=$ligne[1];

           echo ("<h2>Bien Connecter</h2>");
           echo ("<div>Entrer dans 3 secondes</div>");
           if($type=="proprietaire"){
             header("refresh:3;url=proprietaire.php");
           } else {
             header("refresh:3;url=passager.php");
           }
        } else {
            echo ("<div>Il y a problème de votre username ou mot de passe</div>");
            header("refresh:3;url=identifiant.html");
        }
    }
} else {
  echo ("<div>Il y a problème de votre username ou mot de passe</div>");
  header("refresh:3;url=identifiant.html");
}
?>
</div>
</section>
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
