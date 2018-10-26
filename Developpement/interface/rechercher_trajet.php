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

    <header class="masthead text-white">
      <div class="masthead-content">
        <div class="container">
          <h1>Resultats</h1>
        </div>
      </div>

    </header>
<section>
    <div class="container">
    <?php
      //var_dump(isset($_SESSION['username']));die;
      $depart =$_GET['depart'];
      $destination =$_GET['destination'];
      $date = $_GET['date'];
      $_SESSION["depart"]=$depart;
      $_SESSION["destination"]=$destination;
      $_SESSION["date"]=$date;
      require_once("database.php");
      $requete = "select t.* from trajet t, proposition p where t.idT = p.idT and depart='$depart' and destination='$destination' and date='$date'";
      $resultat = mysqli_query($database, $requete);


      if (mysqli_num_rows($resultat)>0) {
        echo "<div class='historique'>";
        echo "<div class='col-md-1'>ID</div>";
        echo "<div class='col-md-3'>Départ</div>";
        echo "<div class='col-md-3'>Destination</div>";
        echo "<div class='col-md-2'>Date</div>";
        echo "<div class='col-md-3'>Prix de trajet</div>";
        echo "<div class='clearfix'></div>";
          while ($ligne = mysqli_fetch_array($resultat,MYSQL_NUM))
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
      else {
          echo("<div>Il n'existe pas de trajet correspond à votre attends.</div>");
          echo(mysqli_error($database));

      }
      //mysqli_free_result($resultat);
      //mysqli_close($database);
    ?>
    </div>
</section>
<section>
  <div class="choisir container">
    <h2>Choisir votre trajet</h2>
    <form method="get" action="choix.php">
      <div class="choix row">
        <div class="col-sm-3">
          <input type="text" name="idTrajetchoisi" required="required" placeholder="ID de trajet">
        </div>
        <div class="clearfix visible-xs-block"></div>
        <div class="col-sm-4"><input type="submit" value="Choisir"></div>
        <div class="clearfix visible-xs-block"></div>
      </div>
    </form>
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
