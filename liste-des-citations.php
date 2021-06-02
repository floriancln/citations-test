<?php
require "lib/quote-model.php";

$quoteList = getAllQuote();

?>

<?php require "head.php" ?>

<body class="container-fluid p-4">
    <?php require "navigation.php"?>

    <div class="rowjustify-content-center">
        <div class="col-lg-10 p2">
            <h1>liste des citations</h1>
            <table class="table table-striped">
                <tr class="mb-2">
                    <th>Id</th>
                    <th>Citation</th>
                    <th>Auteur</th>
                </tr>

                <?php foreach($data as $citations): ?>
                <tr class="justify-content-center">
                    <td class="col-2"><?= $citations["id"]?></td>
                    <td class="col-10"><?= $citations["texte"]?></td>
                    <td class="col-4"><?= $citations["auteur"]?></td>
                </tr>
                <?php endforeach?>
            </table>

        </div>
    </div>

</body>

</html>