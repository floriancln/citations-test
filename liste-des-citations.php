<?php
// Import de la BD
require "lib/pdo.php";

// Création de la connexion
$cn = getPDO();

// Requête sur la BD
$sql = "SELECT * FROM citations";
// -> permet d'exécuter une méthode (equivalent à . sur JS)
$query = $cn->query($sql);

//Récupération des données
$data = $query->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body class="container-fluid">
<?php require "navigation.php"?>

    <div class="m-3">
        <table>
            <tr class="mb-2">
                <th>Id</th>
                <th>Citation</th>
                <th>Auteur</th>
            </tr>

            <?php foreach($data as $citations): ?>
            <tr class="justify-content-center">
                <td class="table"><?= $citations["id"]?></td>
                <td class="table"><?= $citations["texte"]?></td>
                <td class="table"><?= $citations["auteur"]?></td>
            </tr>
            <?php endforeach?>
        </table>

    </div>

</body>

</html>