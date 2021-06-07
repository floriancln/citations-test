<nav>
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a href="/index.php" class="nav-link">Retour à l'accueil</a>
        </li>
        <li class="nav-item">
            <a href="/liste-des-citations.php" class="nav-link">Liste des citations</a>
        </li>
        <?php if (isset($_SESSION["user"])): ?>
        <li class="nav-item">
            <a href="/ajout-citations.php" class="nav-link">Nouvelle citation</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
            <a href="/login.php" class="nav-link">Authentification</a>
        </li>
        <?php endif ?>
    </ul>
</nav>