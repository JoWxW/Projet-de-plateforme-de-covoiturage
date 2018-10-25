<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Jo">

    <title>Rechercher un trajet</title>

    <!-- Bootstrap core CSS -->
    <link href="style/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400i,800" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="style/blocov.css" rel="stylesheet">

  </head>

  <body>
    <h3><br><b>Liste des comptes</b></h3>
<?php
$depart =$_GET['depart'];
$destination =$_GET['destination'];
$date = $_GET['date'];
require_once("database.php");
$requete = "select * from trajet where depart='$depart' and destination='$destination' and date='$date'";
$resultat = mysqli_query($database, $requete);


if ($resultat) {
    echo "<table border = 1 align = center>";
    echo "<td><b>ID</b></td>";
    echo "<td><b>Départ</b></td>";
    echo "<td><b>Destination</b></td>";
    echo "<td><b>Date</b></td>";
    echo "<td><b>Prix de trajet</b></td>";
    while ($ligne = mysqli_fetch_array($resultat,MYSQL_NUM))
    {

        echo "<tr>";
            echo "<td>$ligne[0]</td>";
            echo "<td>$ligne[1]</td>";
            echo "<td>$ligne[2]</td>";
            echo "<td>$ligne[3]</td>";
            echo "<td>$ligne[4]</td>";
        echo "</tr>";

    }
    echo "</table>";
}
else {
    echo("ko , il y a un probleme <br>\n");
    echo(mysqli_error($database));

}
}
mysqli_free_result($resultat);
mysqli_close($database);
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
