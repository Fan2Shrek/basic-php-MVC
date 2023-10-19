<?php require 'assets/header.php'; ?>

<body>
    <?php require 'assets/navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Inscrivez-vous !</h1>
                <form action="/register" method="POST" id='register-form'>
                    <div class="field reverse">
                        <label for="name" class="form-label">Nom : </label>
                        <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp">
                    </div>
                    <div class="field reverse">
                        <label for="password" class="form-label">Mot de passe : </label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <?php
                        if (isset($_SESSION['flash']) && isset($_SESSION['flash']['error'])){
                            echo "<div class='alert' role='alert'>"
                                .$_SESSION['flash']['error']
                                ."</div>";
                        }

                    ?>
                    <button type="submit" >Inscripation</button>
                </form>
            </div>
        </div>
    </div>
</body>
