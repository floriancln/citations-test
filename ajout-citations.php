<?php
require "lib/quote-model.php";

// On détermine si les données ont été posté
$isPosted = count($_POST) > 0;

// Tableau des erreurs
$errors = [];

// On traite le formulaire si les données ont été posté
if(isPosted()){
    $errors = handleInsertQuoteForm();
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
                    <label class="form-label">Texte de la citation</label>
                    <textarea class="form-control" name="texte"></textarea>

                </div>
                <div class="mb-2">
                    <label class="form-label">Auteur de la citation</label>
                    <input type="text" class="form-control" name="auteur"></input>
                </div>

                <button type="submit" name="submit"
                class="btn btn-primary bn block">
                Valider
                </button>
            </form>
        </div>
    </div>


</body>

</html>