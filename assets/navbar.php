<nav id='header'>
    <a href='/home' id='logo'>Logo</a>

    <?php include 'search.php' ?>

    <ul>
        <?php
        if (isset($_SESSION['user'])) {
            echo "<a href='/home' id='username'>{$_SESSION['user']['name']}</a>";
        } else {
            echo "<li><a href='/register'>Register</a></li>";
        }
        ?>

        <?= !isset($_SESSION['user']) ? "<li><a href='/login'>Login</a></li>" : "<li><a href='/logout'>Logout</a></li>" ?>
    </ul>
</nav>
