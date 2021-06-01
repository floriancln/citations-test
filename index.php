<?php
// Import de la bibliothèque
require "lib/pdo.php";

// Création de la connexion
$cn = getPDO();

// Requête pour extraire une citation
// ORDER BY RAND() effectue un tri aléatoire
// LIMIT 1 permet de n'obtenir qu'une ligne
$query = $cn->query("SELECT * FROM citations ORDER BY RAND() LIMIT 1 ");

// Récupération des données de la requête
$quote = $query->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<?php require "navigation.php"?>

    <h1>La citation du jour</h1>

    <div>
        <blockquote>
            <!-- Ici le texte de la citation -->
            <?= $quote["texte"] ?>
        </blockquote>

        <figcaption>
            <!-- Ici le nom de l'auteur -->
            <?= $quote["auteur"] ?>
        </figcaption>
    </div>

    <a href="/liste-des-citations.php">Liste des citations</a>

</body>

</html>