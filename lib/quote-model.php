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

/**
 * Validation des données contenues dans $data
 *
 * @param array $data
 * @return array $data
 */
function validateInput(array $data){
    // Initialisation du tableau des erreurs
    $errors = [];
    if(empty($data["texte"])){
        $errors[] = "Le texte ne peut être vide";
    }

    if(empty($data["auteur"])){
        $errors[] = "L'auteur ne peut être vide";
    }

    return $errors;
}

/**
 * Insertion d'une citation dans la BD
 *
 * @param array $data
 * @return void
 */
function insertQuote(array $data){
    // On ajoute la nouvelle citation
    $pdo = getPDO();
    // La requête SQL
    $sql = "INSERT INTO citations (texte, auteur) value (?,?)";
    // Préparation de la requête
    $statement = $pdo->prepare($sql);
    // Paramètres
    $params = [$data["texte"], $data["auteur"]];
    // Exécution des paramètres
    $statement->execute($params);
}

/**
 * Traitement du formulaire d'ajout de citation
 * @author Florian Colin
 * @date 02.06.2021
 * @return array $errors
 */

 function handleInsertQuoteForm(){
     // On récupère la saisie
    //$text = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_STRING);
    //$author = filter_input(INPUT_POST, "auteur", FILTER_SANITIZE_STRING);

    $data = filter_input_array(INPUT_POST, [
        "texte" => FILTER_SANITIZE_STRING,
        "auteur" => FILTER_SANITIZE_STRING
    ]);
    // Validation de la saisie
    $errors = validateInput($data);
    
    // INsertion uniquement s'il n'y a pas d'erreurs
    if(count($errors) == 0) {
        try {
            insertQuote($data);
        // Redirection vers la liste des citations
        header("location:liste-des-citations.php");
        exit;
    } catch (Exception $ex) {
        $error[] = "Il y a une erreur dans l'exécution de la requête";
    }
 }

 return $errors;
}