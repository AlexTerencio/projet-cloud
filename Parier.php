<?php

require 'Convert.php';

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

// Recuperé les tables de la BDD
$tableau = "SELECT equipe_1, equipe_2, cote_victoire, cote_nul, cote_defaite FROM matchs";
$resultatTableau = mysqli_query($connexion, $tableau);
$donnees2 = mysqli_fetch_all($resultatTableau, MYSQLI_ASSOC);

// Déconnexion de la base de donnée
$connexion->close();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau des Matchs parie</title>
</head>
<body>
<h1> Liste des parie possible </h1>
<?php if (!empty($donnees2)) : ?>
    <table border="1">
            <?php foreach ($donnees2 as &$row) {
    Convert($row['equipe_1']);
    Convert($row['equipe_2']);
} ?>
    <?php foreach ($row as $valeur) : ?>
        <td><?php echo $valeur; ?></td>
    <?php endforeach; ?>
<?php else : ?>
    <p>Aucune donnée à afficher.</p>
<?php endif; ?>
</body>