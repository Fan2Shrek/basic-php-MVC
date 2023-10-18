<?php require 'assets/header.php'; ?>

<body>
    <?php require 'assets/navbar.php'; ?>

    <div class="container">
        <div class='films'>
            <h1>Résultat pour <?= $_GET['q'] ?> </h1>

            <div class="film-container">
                <?php foreach ($films as $film) : ?>
                    <div class='film-card'>
                        <h4 class='film-title'><?= $film->getTitre() ?></h4>
                        <?php if (null !== $film->getImage()) : ?>
                            <img src="<?= sprintf('data:image/png;base64,%s', base64_encode($film->getImage())) ?>" />
                        <?php else : ?>
                            <img src="https://cdn.vectorstock.com/i/preview-1x/65/30/default-image-icon-missing-picture-page-vector-40546530.jpg" />
                        <?php endif ?>
                        <h4><?= $film->getGenre() ?> - <?= $film->getAnnee() ?></h4>
                        <div class="actions">
                            <a class='btn update' <?= "href='/edit?id=" . $film->getId() . "'" ?>>Modifier</a>
                            <a class='btn add-list' <?= "href='/addtolist?id=" . $film->getId() . "'" ?>>Ajouter</a>
                            <a class='btn view' <?= "href='/view?id=" . $film->getId() . "'" ?>>Voir</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
