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

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">BloCov</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <?php
          if(isset($_SESSION['username'])){
            echo '<ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Déconnecter</a>
            </ul>';
          } else {
            echo "<ul class='navbar-nav ml-auto'>
              <li class='nav-item'>
                <a class='nav-link' href='inscription.html'>S'inscrire</a>
              </li>
              <li class='nav-item'>
                <a class='nav-link' href='identifiant.html'>S'identifier</a>
              </li>
            </ul>";
          }
           ?>

        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white">
      <div class="masthead-content">
        <div class="container">
          <h1 class="masthead-heading mb-0">Covoiturage sur la Blockchain</h1>
          <h2 class="masthead-subheading mb-0">Prenez la route en toute confiance tout en minimisant vos dépense</h2>
          <form method="get" action="rechercher_trajet.php">
            <div class="rechercher row">
              <div class="col-sm-3"><input type="text" name="depart" required="required" placeholder="Départ"></div>
              <div class="col-sm-3"><input type="text" name="destination" required="required" placeholder="Destination"></div>
              <div class="col-sm-3"><input type="text" name="date" required="required" placeholder="Date(ex: Nov01)"></div>
              <div class="col-sm-3"><input type="submit" value="Rechercher"></div>
            </div>
          </form>
        </div>
      </div>

    </header>

    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="style/img/inspiration-voyage.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <div class="p-5">
              <h3 class="display-4">Voyage de façon économique...</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="style/img/inspiration-stranger.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="p-5">
              <h3 class="display-4">Confiance est établi sans croire les inconnus...</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="style/img/inspiration-code.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <div class="p-5">
              <h3 class="display-4">Seule la blockchain comprend votre code de voyage...</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
            </div>
          </div>
        </div>
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

  </body>

</html>
