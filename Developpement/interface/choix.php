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
        <a class="navbar-brand" href="#">BloCov</a>
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
          <h1>Comfirmer votre trajet</h1>
        </div>
      </div>

    </header>
<section>
    <div class="container">
    <?php
    require_once("database.php");
    $idTrajetchoisi =$_GET['idTrajetchoisi'];
    $_SESSION["idTrajetchoisi"] = $idTrajetchoisi;
    //echo $_SESSION["username"];
    $passager = $_SESSION["address"];
    $depart = $_SESSION["depart"];
    $destination = $_SESSION["destination"];
    $date = $_SESSION["date"];
    $tarif = "";
    $proprietaire = "";
    //echo $_SESSION["idTrajetchoisi"];
    //echo $_SESSION["type"];
    $sql = "SELECT u.address, t.tarif FROM proposition p, utilisateur u, trajet t WHERE t.idT='$idTrajetchoisi' AND t.idT = p.idT AND p.idProprietaire = u.idU";
    $resultat = mysqli_query($database, $sql);
    if (mysqli_num_rows($resultat)==1) {
      while ($ligne = mysqli_fetch_array($resultat,MYSQL_NUM)){
        $tarif = $ligne[1];
        $proprietaire = $ligne[0];
        echo "
        <div class='trajetchoisiInfo'>
          <h3>Information sur le trajet choisi</h3>
          <ul>
          <li>Date de départ: $date</li>
          <li>Départ: $depart</li>
          <li>Arrivé: $destination</li>
          <li>Prix de trajet: $tarif</li>
          <li>Adresse de propriétaire: $proprietaire</li>
          <li>Adresse de passager: $passager</li>
          </ul>
          <button id='comfirmerTrajet'>Comfirmer</button>
          <a href='passager.php'>Revenir sur profile</a>
        </div>
        ";
      }
    } else {
      echo "
      <div class='trajetchoisiInfo'>
        <div>Un problème se produit. Veuilez refaire votre choix en cliquant <a href='passager.php'>ici</a>.</div>
      </div>
      ";
    }

    ?>
    <div id="addTrajetResultat"></div>
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
      $("#comfirmerTrajet").click(function() {
        let nbA = getTrajetNb();
        let idT = <?php echo $_SESSION["idTrajetchoisi"]; ?>;
        let date = "<?php echo $date; ?>";
        let depart = "<?php echo $depart; ?>";
        let destination = "<?php echo $destination; ?>";
        let tarif = "<?php echo $tarif; ?>";
        let addPro = "<?php echo $proprietaire; ?>";
        let addPas = "<?php echo $passager; ?>";

        var id = addTrajet(idT, date, depart, destination, tarif, addPro, addPas);
        //console.log(nbA);
        $("#addTrajetResultat").text("ID sur blockchain de Trajet : " + id);
      });
    </script>

    </body>
    </html>
