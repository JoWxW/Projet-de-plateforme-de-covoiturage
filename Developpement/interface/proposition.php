<?php
session_start();
//var_dump($_SESSION);die;
?>
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

  <body class="proposition">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">BloCov</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Déconnecter</a>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-white">
      <div class="masthead-content">
        <div class="container">
          <h1 class="masthead-heading mb-0">Bonjour, <?php echo $_SESSION["username"]; ?></h1>
          <h3 class="role">Role: <?php echo $_SESSION["type"]; ?></h3>

        </div>
      </div>

    </header>
    <section class="resultatDeProposition">
      <div class="container">
        <?php
          require_once("database.php");
          $insertion = false;

          $username = $_SESSION["username"];

          $requete = "SELECT idU FROM `utilisateur` WHERE `nom`= '$username'";
          $resultat = mysqli_query($database, $requete);
          if (mysqli_num_rows($resultat) != 1){
            echo "Problème d'authentification. Veuillez vous identifier. Diriger à l'identification dans 3 secondes.";
            session_destroy();
            header("refresh:3;url=identifiant.php");
          } else {
            $ligne = mysqli_fetch_array($resultat,MYSQL_NUM);
            $idPro = $ligne[0];
            //var_dump($idPro);die;
            $depart = $_GET['depart'];
            $destination = $_GET['destination'];
            $date = $_GET['date'];
            $prix = $_GET['prix'];

            $sql1 = "INSERT INTO `trajet`(`depart`, `destination`, `date`, `tarif`) VALUES ('$depart', '$destination', '$date', '$prix')";
            $resultatSql1 = mysqli_query($database, $sql1);
            if($resultatSql1){
              $sql2 = "SELECT COUNT(*) FROM `trajet`";
              $resultatSql2 = mysqli_query($database, $sql2);

              if($resultatSql2){
                $ligne = mysqli_fetch_array($resultatSql2,MYSQL_NUM);
                //var_dump($ligne);die;
                $idT = $ligne[0];
                $sql3 = "INSERT INTO `proposition`(`idProprietaire`, `idT`) VALUES ('$idPro','$idT')";
                $resultatSql3 = mysqli_query($database, $sql3);
                if($resultatSql3){
                  $insertion = true;
                }
              }
            }
            if($insertion) {
              echo("Votre trajet est publié.");
            } else {
              echo("Problème d'insertion. Veuillez vérifier les champs de formulaire. Retourner à la page précédente dans 3 secondes.");
              header("refresh:3;url=proprietaire.php");
            }
          }
        ?>
      </div>
    </section>

    <section class="historiqueDeProposition">
      <div class="container">
        <h3>Les trajets proposés par vous</h3>
        <?php
        require_once("database.php");
          $sqlTrajet = "SELECT t.* FROM `trajet` t, `proposition` p WHERE p.idProprietaire = $idPro AND p.idT = t.idT";
          $resultatTrajet = mysqli_query($database, $sqlTrajet);
          //var_dump($sqlTrajet);die;
          if($resultatTrajet) {
            echo "<div class='historique'>";
            echo "<div class='col-md-1'>ID</div>";
            echo "<div class='col-md-3'>Départ</div>";
            echo "<div class='col-md-3'>Destination</div>";
            echo "<div class='col-md-2'>Date</div>";
            echo "<div class='col-md-3'>Prix de trajet</div>";
            echo "<div class='clearfix'></div>";
            while ($ligne = mysqli_fetch_array($resultatTrajet,MYSQL_NUM))
            {
                echo "<div class='col-md-1'>$ligne[0]</div>";
                echo "<div class='col-md-3'>$ligne[1]</div>";
                echo "<div class='col-md-3'>$ligne[2]</div>";
                echo "<div class='col-md-2'>$ligne[3]</div>";
                echo "<div class='col-md-3'>$ligne[4]</div>";
                echo "<div class='clearfix'></div>";
            }
            echo "</div>";
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
