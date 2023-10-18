<?php require 'assets/header.php'; ?>

<body>
    <?php require 'assets/navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="form-container">
                <h1>Modifier un film :</h1>
                <form action="/edit?id=<?= $film->getId() ?>" method="POST" id='register-form'>
                    <div class="field">
                        <label for="titre" class="form-label">Name</label>
                        <input name="titre" type="text" class="form-control" id="titre" aria-describedby="nameHelp" value='<?= $film->getTitre(); ?>'>
                    </div>
                    <div class="field">
                        <label for="realisateur" class="form-label">Realisateur</label>
                        <input name="realisateur" type="text" class="form-control" id="realisateur" value='<?= $film->getRealisateur(); ?>'>
                    </div>
                    <div class="field">
                        <label for="synopsis" class="form-label">synopsis</label>
                        <input name="synopsis" type="text" class="form-control" id="synopsis" value='<?= $film->getSynopsis(); ?>'>
                    </div>
                    <div class="field">
                        <label for="genre" class="form-label">genre</label>
                        <input name="genre" type="text" class="form-control" id="genre" value='<?= $film->getGenre(); ?>'>
                    </div>
                    <div class="field">
                        <label for="scenariste" class="form-label">scenariste</label>
                        <input name="scenariste" type="text" class="form-control" id="scenariste" value='<?= $film->getScenariste(); ?>'>
                    </div>
                    <div class="field">
                        <label for="societe" class="form-label">societe</label>
                        <input name="societe" type="text" class="form-control" id="societe" value='<?= $film->getSociete(); ?>'>
                    </div>
                    <div class="field">
                        <label for="annee" class="form-label">annee</label>
                        <input name="annee" type="text" class="form-control" id="annee" value='<?= $film->getAnnee(); ?>'>
                    </div>
                    <input type='hidden' name='id' value='<?= $film->getId() ?>'>
                    <button class='btn edit btn-form' type="submit">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</body>
