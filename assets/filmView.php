<?php require 'assets/header.php'; ?>

<body>
    <?php require 'assets/navbar.php'; ?>

    <div class="container">
        <div class="main">
            <h1><?= $film->getTitre() ?></h1>
            <div class="film-pres">
                <div class="film-image">
                    <?php if (null !== $film->getImage()) : ?>
                        <img src="<?= sprintf('data:image/png;base64,%s', base64_encode($film->getImage())) ?>" />
                    <?php else : ?>
                        <img src="https://cdn.vectorstock.com/i/preview-1x/65/30/default-image-icon-missing-picture-page-vector-40546530.jpg" />
                    <?php endif ?>
                </div>
                <div class='film'>

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

                    <div class='infos'>
                        <p class='name'>Année de sortie</p>
                        <p><?= $film->getAnnee() ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
