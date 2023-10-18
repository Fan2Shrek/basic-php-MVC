<?php require 'assets/header.php'; ?>

<body>
    <?php require 'assets/navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Register</h1>
                <form action="/register" method="POST" id='register-form'>
                    <div class="field">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp">
                    </div>
                    <div class="field">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <?php
                        if (isset($_SESSION['flash']) && isset($_SESSION['flash']['error'])){
                            echo "<div class='alert' role='alert'>"
                                .$_SESSION['flash']['error']
                                ."</div>";
                        }

                    ?>
                    <button type="submit" class="btn add">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>
