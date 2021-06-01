<?php

// Importation de la bibliothèque perso pdo.php
require "lib/pdo.php";

// Test de la connexion
try {
$connexion = getPDO();
echo "ça marche";

// Requête sur la BD
$sql = "SELECT * FROM citations";
// -> permet d'exécuter une méthode (equivalent à . sur JS)
$query = $connexion->query($sql);

//Récupération des données
$data = $query->fetch();

//Récupération de toutes les données
echo "<pre>";
$data = $query->fetchAll();

"</pre>";

// Afficher les données de $data (juste la colonne de texte) dans une liste à puces

echo "<ul>";
foreach($data as $citations){
    echo "<li>". $citations['texte']. "</li>";
};

"</ul>";

echo "<br>";

} catch(exception $error) {
echo $error->getMessage();
}