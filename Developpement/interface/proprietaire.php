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

  <body class="proprietaire">

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

    <section class="proposerTrajet">
      <div class="container">
        <h2>Proposer un trajet</h2>
        <form method="get" action="proposition.php">
          <div class="identifier row">
            <div class="col-sm-3">
              <input type="text" name="depart" required="required" placeholder="Départ">
            </div>
            <div class="col-sm-3">
              <input type="text" name="destination" required="required" placeholder="Destination">
            </div>
            <div class="col-sm-3">
              <input type="text" name="date" required="required" placeholder="Date (ex: May01 pour le 1er mai)">
            </div>
            <div class="col-sm-3">
              <input type="text" name="prix" required="required" placeholder="Prix">
            </div>
            <div class="clearfix visible-xs-block"></div>
            <div class="col-sm-4"><input type="submit" value="Proposer"></div>
            <div class="clearfix visible-xs-block"></div>
          </div>
        </form>
      </div>
    </section>

    <section class="trajetEffectue">
      <div class="container">
        <h2>Trajets on blockchain</h2>
        <div id="trajetOnChain"></div>
        <h3>Changer état d'un trajet</h3>
        <form class="row" name="trajetsOnChain" method="get" action="changerEtat.php">
          <div class="col-sm-3">
            <input type="text" name="trajetId" required="required" placeholder="ID de Trajet">
          </div>
          <div class="col-sm-3">
            <input type="text" name="etatActuel" required="required" placeholder="Etat actuel">
          </div>
          <div class="col-sm-3">
            <input type="text" name="etatNouveau" required="required" placeholder="Nouveau état">
          </div>
          <div class="clearfix visible-xs-block"></div>
          <div class="col-sm-4"><button id="trajetEtatOnChange">Changer</button></div>
          <div class="clearfix visible-xs-block"></div>
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
