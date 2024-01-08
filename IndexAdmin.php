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

// Requête SQL pour récupérer les données de votre table
$requete = "SELECT id FROM equipe";
$resultat = mysqli_query($connexion, $requete);

// Vérification des résultats
if (!$resultat) {
    die("La requête a échoué : " . mysqli_error($connexion));
}

// Récupération des données dans un tableau
$donnees = mysqli_fetch_all($resultat, MYSQLI_ASSOC);

// Recuperé les tables de la BDD
$tableau = "SELECT equipe_1, equipe_2, cote_victoire, cote_nul, cote_defaite FROM matchs";
$resultatTableau = mysqli_query($connexion, $tableau);
$donnees2 = mysqli_fetch_all($resultatTableau, MYSQLI_ASSOC);

// Suppresion des tables
if (isset($_POST["bouton"])) {
    $suppr = "DELETE FROM matchs";
    $ResultBouton = mysqli_query($connexion, $suppr);
    if ($ResultBouton) {
        echo "Tables supprimer";
        header("refresh:0"); 
    } else {
        echo "echec lors de la suppresion." . mysqli_error($connexion);
        header("refresh:0");
    } 
}

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Administrateur</title>
</head>
<body>
<h1> Interface Administrateur </h1>

<h3><form action="Traitement.php" method="post">
Sélectionné l'equipe 1 et 2
<select name="equipe1">
    <?php foreach ($donnees as $row) : ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></option>
    <?php endforeach; ?>
    <br>
</select>

<select name="equipe2">
    <?php foreach ($donnees as $row) : ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></option>
    <?php endforeach; ?>
</select>

    <br>
    <label for="coteV">Cote Victoire :</label>
    <input type="text" id="coteV" name="coteV" pattern="\d+(\.\d{1,2})?" required>
    <br>

    <label for="coteN">Cote Nul :</label>
    <input type="text" id="coteN" name="coteN" pattern="\d+(\.\d{1,2})?" required>
    <br>

    <label for="coteD">Cote Defaite :</label>
    <input type="text" id="coteD" name="coteD" pattern="\d+(\.\d{1,2})?" required>
    <br>
<h3>
    <button type="submit" name="submit">Soumettre</button>
</form>
<h2> Liste des Matchs </h2>

<?php if (!empty($donnees2)) : ?>
    <table border="1">
            <?php foreach ($donnees2 as &$row) {
    Convert($row['equipe_1']);
    Convert($row['equipe_2']);
}
?>
    <?php foreach ($row as $valeur) : ?>
        <td><?php echo $valeur; ?></td>
    <?php endforeach; ?>
<?php else : ?>
    <p>Aucune donnée à afficher.</p>
<?php endif; ?>

<form action="IndexAdmin.php" method="post">
<button type="submit" name="bouton"> Supprimer </button>
</form>
</body>