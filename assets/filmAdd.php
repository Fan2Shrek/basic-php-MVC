<?php require 'assets/header.php'; ?>

<body>
    <?php require 'assets/navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="form-container">
                <h1>Ajouter un film :</h1>
                <form action="/add" method="POST" id='register-form' enctype="multipart/form-data">
                    <div class="field">
                        <label for="titre" class="form-label">Nom :</label>
                        <input name="titre" type="text" class="form-control" id="titre" aria-describedby="nameHelp" value='<?= $_POST['titre'] ?? '' ?>'>
                    </div>
                    <div class="field">
                        <label for="realisateur" class="form-label">Realisateur :</label>
                        <input name="realisateur" type="text" class="form-control" id="realisateur" value='<?= $_POST['realisateur'] ?? '' ?>'>
                    </div>
                    <div class="field">
                        <label for="synopsis" class="form-label">synopsis :</label>
                        <input name="synopsis" type="text" class="form-control" id="synopsis" value='<?= $_POST['synopsis'] ?? '' ?>'>
                    </div>
                    <div class="field">
                        <label for="genre" class="form-label">genre :</label>
                        <input name="genre" type="text" class="form-control" id="genre" value='<?= $_POST['genre'] ?? '' ?>'>
                    </div>
                    <div class="field">
                        <label for="scenariste" class="form-label">scenariste :</label>
                        <input name="scenariste" type="text" class="form-control" id="scenariste" value='<?= $_POST['scenariste'] ?? '' ?>'>
                    </div>
                    <div class="field">
                        <label for="societe" class="form-label">societe :</label>
                        <input name="societe" type="text" class="form-control" id="societe" value='<?= $_POST['societe'] ?? '' ?>'>
                    </div>
                    <div class="field">
                        <label for="annee" class="form-label">annee :</label>
                        <input name="annee" type="text" class="form-control" id="annee" value='<?= $_POST['annee'] ?? '' ?>'>
                    </div>
                    <div class="field select-image">
                        <label id='selectImage' for="image" class="form-label">image :</label>
                        <input name="image" type="file" class="form-control" id="image" />
                        <input type="text" onclick="document.getElementById('selectImage').click();" />
                    </div>
                    <?php
                    if (isset($_SESSION['flash']['error'])) {
                        echo "<div class='alert' role='alert'>"
                            . $_SESSION['flash']['error']
                            . "</div>";
                    }
                    ?>
                    <button type="submit" class='btn add'>Ajouter +</button>
                </form>
            </div>
        </div>
    </div>
</body>
