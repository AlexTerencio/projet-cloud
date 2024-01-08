<?php
// Connexion à la base de données
$servername = "172.21.3.215";
$username = "admin";
$password = "pwd";
$dbname = "cote_matchs";

$connexion = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

    $equipe1 = $_POST['equipe1'];
    $equipe2 = $_POST['equipe2'];
    $coteV = $_POST['coteV'];
    $coteN = $_POST['coteN'];
    $coteD = $_POST['coteD'];
    $request = "INSERT INTO matchs (equipe_1, equipe_2, cote_victoire, cote_nul, cote_defaite) VALUES ('$equipe1', '$equipe2', $coteV, $coteN, $coteD)";
    $result = mysqli_query($connexion, $request);
    header('location: IndexAdmin');
?>

