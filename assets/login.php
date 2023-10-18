<?php require 'assets/header.php'; ?>

<body>
    <?php require 'assets/navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Login :</h1>
                <form action="/login" method="POST" id='register-form'>
                    <div class="field">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp">
                    </div>
                    <div class="field">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <button type="submit" >Se cnnecter</button>
                </form>
                <?php
                    if (isset($_SESSION['flash']['error'])){
                        echo "<div class='alert' role='alert'>"
                            .$_SESSION['flash']['error']
                            ."</div>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
