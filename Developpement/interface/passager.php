<?php session_start();
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

  <body class="passager">

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
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white">
      <div class="masthead-content">
        <div class="container">
          <h1 class="masthead-heading mb-0">Bonjour, <?php echo $_SESSION["username"]; ?></h1>
          <h3 class="role">Role: <?php echo $_SESSION["type"]; ?></h3>

        </div>
      </div>

    </header>

    <section>
      <div class="container choisirTrajet">
        <h2>Rechercher et choisir un trajet</h2>
        <form class="row" method="get" action="rechercher_trajet.php">
          <div class="rechercher row">
            <div class="col-sm-3"><input type="text" name="depart" required="required" placeholder="Départ"></div>
            <div class="col-sm-3"><input type="text" name="destination" required="required" placeholder="Destination"></div>
            <div class="col-sm-3"><input type="text" name="date" required="required" placeholder="Date(ex: Nov01)"></div>
            <div class="col-sm-3"><input type="submit" value="Rechercher"></div>
          </div>
        </form>
      </div>
    </section>
    <section>
      <div class="container historiqueSurChain">
        <h2>Trajets enregistré sur la Blockchain</h2>
          <div class="row" id="historique">

          </div>
          <h3>Changer état d'un trajet</h3>
            <div class="col-sm-3">
              <input type="text" id="trajetId" required="required" placeholder="ID de Trajet">
            </div>
            <div class="col-sm-3">
              <input type="text" id="etatActuel" required="required" placeholder="Etat actuel">
            </div>
            <div class="col-sm-3">
              <input type="text" id="etatNouveau" required="required" placeholder="Nouveau état">
            </div>
            <div class="clearfix visible-xs-block"></div>
            <div class="col-sm-4"><button id="trajetEtatOnChange">Changer</button></div>
            <div class="clearfix visible-xs-block"></div>
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
    <script src="js/web3.min.js"></script>
    <script src="js/truffle-contract.js"></script>
    <script src="js/blocov.js"></script>
    <script type="text/javascript">
    var typeActuel ='<?php echo $_SESSION["type"] ?>';
    var addressActuel ='<?php echo $_SESSION["address"] ?>';
    $(document).ready(function() {
      $(".passager #historique").html(getTrajets(addressActuel, typeActuel));
    });
    $("#trajetEtatOnChange").click(function() {
      changerEtatOnChain($("#trajetId").val(), $("#etatActuel").val(), $("#etatNouveau").val(), addressActuel);
      setTimeout(function(){
        location.reload();
      }, 100);
    });
    </script>

  </body>

</html>
