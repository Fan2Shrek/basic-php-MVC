<?php require 'assets/header.php'; ?>

<body>
    <?php require 'assets/navbar.php'; ?>

    <div class='films'>
        <h1>Vos Films : </h1>

        <div class='film-container'>
            <?php foreach($films as $film): ?>
                <div class='film-card'>
                    <h4 class='film-title'><?= $film->getTitre()?></h4>
                    <h4><?= $film->getGenre()?> - <?= $film->getAnnee()?></h4>
                    <?php if (null !== $film->getImage()):?>
                        <img src="<?= sprintf('data:image/png;base64,%s', base64_encode($film->getImage()))?>" />
                    <?php else: ?>
                        <img src="https://cdn.vectorstock.com/i/preview-1x/65/30/default-image-icon-missing-picture-page-vector-40546530.jpg" />
                    <?php endif ?>
                        <div class="actions">
                        <a class='btn update' <?= "href='/edit?id=" . $film->getId() . "'" ?>>Modifier</a>
                        <a class='btn delete' <?= "href='/delete?id=" . $film->getId() . "'" ?>>Supprimer</a>
                        <a class='btn add' <?= "href='/view?id=" . $film->getId() . "'" ?>>Voir</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <a href='/add' class='btn add'>Ajouter +</a>
    </div>
</body>
