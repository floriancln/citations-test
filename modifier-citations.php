<?php 
session_start();
require "lib/quote-model.php";

// Récupérer le paramètre id
$id = filter_input(INPUT_GET, "id");

$selectedQuote = getSelectedQuote($id);

// Test d'authentification
// Seul les utilisateurs authentifiés peuvent accéder à la page
if(! isset($_SESSION["user"])){
    header("location:login.php");
    exit;
}

// On détermine si les données ont été posté
$isPosted = count($_POST) > 0;

// Tableau des erreurs
$errors = [];

// On traite le formulaire si les données ont été posté
if(isPosted()){
    $errors = handleUpdateQuoteForm();
}


?>

<?php require "head.php" ?>
<body class="container-fluid">
    <?php require "navigation.php" ?>
    <div class="row justify-content-center">
        <div class="col-md-6">

        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
            <?php foreach($errors as $errorMessage): ?>
            <p><?= $errorMessage ?></p>
            <?php endforeach ?>

            </div>
        <?php endif ?>

            <form method="post">
                <div class="mb-2">
                <label class="form-label">Id de la citation</label>
                <input type="number" readonly value="<?= $selectedQuote["id"] ?>"/>
                </div>
                <div class="mb-2">
                    <label class="form-label">Texte de la citation</label>
                    <textarea class="form-control" name="texte"><?= $selectedQuote["texte"] ?></textarea>

                </div>
                <div class="mb-2">
                    <label class="form-label">Auteur de la citation</label>
                    <input type="text" class="form-control" name="auteur" value="<?= $selectedQuote["auteur"] ?>" />
                </div>

                <button type="submit" name="submit"
                class="btn btn-primary bn block">
                Modifier
                </button>
            </form>
        </div>
    </div>


</body>

</html>