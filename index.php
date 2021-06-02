<?php
require "lib/quote-model.php";

$quote = getRandomQuote();

?>

<?php require "head.php" ?>

<body class="container fluid p-4">

    <?php require "navigation.php"?>

    <h1 class=mb-3>La citation du jour</h1>

    <div class="alert-success">
        <figure>
            <blockquote class="blockquote">
                <!-- Ici le texte de la citation -->
                <?= $quote["texte"] ?>
            </blockquote>

            <figcaption class="blockquote-footer">
                <!-- Ici le nom de l'auteur -->
                <?= $quote["auteur"] ?>
            </figcaption>
        </figure>
    </div>

    <a href="/liste-des-citations.php">Liste des citations</a>

</body>

</html>