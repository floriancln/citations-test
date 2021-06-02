<?php
require "lib/pdo.php";

/**
 * retourne une citation aléatoire extraite de la bd
 * @author Florian Colin 
 * @date 02.06.2021
 * @return array
 */
function getRandomQuote(){
// Création de la connexion
$cn = getPDO();

// Requête pour extraire une citation
// ORDER BY RAND() effectue un tri aléatoire
// LIMIT 1 permet de n'obtenir qu'une ligne
$query = $cn->query("SELECT * FROM citations ORDER BY RAND() LIMIT 1 ");

// Récupération des données de la requête
$quote = $query->fetch(PDO::FETCH_ASSOC);

return $quote;
};

/**
 * retourne les citations à partir d'une requête sur la bd
 * 
 * @author Florian Colin 
 * @date 02.06.2021
 * @return array
 */
function getAllQuote(){
// Création de la connexion
$cn = getPDO();

// Requête SQL sur la BD
$sql = "SELECT * FROM citations";
// -> permet d'exécuter une méthode (equivalent à . sur JS)
$query = $cn->query($sql);

//Récupération des résultats dans une variable
$quoteList= $query->fetchAll(PDO::FETCH_ASSOC);

return $quoteList;
};