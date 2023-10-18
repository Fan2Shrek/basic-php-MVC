<?php require 'assets/header.php'; ?>

<body>
    <?php require 'assets/navbar.php'; ?>

    <?php require 'search.php'; ?>

    <div class='films'>
        <h1><?= $film->getTitre() ?></h1>

        <div class='infos'>
            <p class='name'>Réalisateur</p>
            <p><?= $film->getRealisateur() ?></p>
        </div>

        <div class='infos'>
            <p class='name'>Synopsis</p>
            <p><?= $film->getSynopsis() ?></p>
        </div>

        <div class='infos'>
            <p class='name'>Genre</p>
            <p><?= $film->getGenre() ?></p>
        </div>

        <div class='infos'>
            <p class='name'>Scenariste</p>
            <p><?= $film->getScenariste() ?></p>
        </div>

        <div class='infos'>
            <p class='name'>Societe</p>
            <p><?= $film->getSociete() ?></p>
        </div>
    </div>
</body>
