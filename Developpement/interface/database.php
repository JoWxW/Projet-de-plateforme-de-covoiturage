<?php

define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'demo_covoiturage');

$database = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or
    die('Impossible de se connecter a MySQL : ' + mysqli_connect_error());

function title($title) {
    echo "<html>";
    echo "<head>";
        echo "<title>$title</title>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<link href='style/blocov.css' rel='stylesheet'>";
        echo "<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,700' rel='stylesheet'>";
        echo "<link href='https://fonts.googleapis.com/css?family=Open+Sans:400i,800' rel='stylesheet'>";
    echo "</head>";
    echo "<body>";
    echo"</body>";
    echo"</html>";

}

?>
