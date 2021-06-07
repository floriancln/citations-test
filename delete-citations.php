<?php
session_start();
require "lib/quote-model.php";

// Test d'authentification
// Seul les utilisateurs authentifiés peuvent accéder à la page
if(! isset($_SESSION["user"])){
    header("location:login.php");
    exit;
}

// Récupérer le paramètre id de la citation
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

// Filtrer la liste des citations pour ne garder que les id différents de celui recherché
$quoteList = array_filter(getAllQuote($quoteList), function($quote) use ($id){
    return $quote["id"] != $id;
});

// On traite la BD si un id a été sélectionné
$isDeleted = count($_GET) > 0;

if($isDeleted){
    // On récupère la saisie
    $id = filter_input(INPUT_GET, "id");

    // On supprime la citation identifiée
    $pdo = getPDO();
    $sql = "DELETE FROM citations WHERE id=?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$id]);
}

// Redirection vers liste-des-citations.php
header("location:liste-des-citations.php");
