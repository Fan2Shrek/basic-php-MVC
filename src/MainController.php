<?php

require_once 'User.php';

return new class{
    private $repository;

    private $filmRepository;

    public function __construct()
    {
        $this->repository = require 'UserRepository.php';

        $this->filmRepository = require 'FilmRepository.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (!isset($_SESSION['flash'])){
                $_SESSION['flash']['error'] = '';
            }

            require 'assets/register.php';

            return;
        }

        if (
            '' === $_POST['name'] ||
            '' === $_POST['password']
        ) {
            $_SESSION['flash']['error'] = 'Veuillez remplir tous les champs';

            require 'assets/register.php';
            return;
        }

        $name = $_POST['name'];
        $password = $_POST['password'];

        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $_POST['password'])){
            $_SESSION['flash']['error'] = 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial';

            require 'assets/register.php';
            return;
        }

        if (str_contains($_POST['password'], $_POST['name'])){
            $_SESSION['flash']['error'] = 'Le mot de passe ne doit pas contenir le nom d\'utilisateur';

            require 'assets/register.php';
            return;
        }

        $_SESSION['flash'] = [];
        $hash = password_hash($password, PASSWORD_ARGON2I);

        $user = new User($name, $hash);
        $id = $this->repository->register($user);

        $_SESSION['user'] = [
            'id' => $id,
            'name' => $user->getName()
        ];

        header("Location: /home?id=".$id);
    }

    public function home(?int $id = null) {
        if (null === $id && null === $_SESSION['user']['id']) {
            header('Location: /login');

            return;
        }

        $id = $_SESSION['user']['id'] ?? $id;

        $user = $this->repository->get($id);

        if (!$user) {
            header('Location: /login');

            return;
        }

        $films = $this->filmRepository->getFilm($user);

        require 'assets/home.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (!isset($_SESSION['flash'])){
                $_SESSION['flash']['error'] = '';
            }

            $_SESSION['user'] = null;
            require 'assets/login.php';

            return;
        }

        $user = $this->repository->getBy($_POST['name']);

        if (null === $user || !password_verify($_POST['password'], $user->getPassword())) {
            $_SESSION['flash']['error'] = 'Mauvais identifiants';

            require 'assets/login.php';

            return;
        }

        $_SESSION['user'] = [
            'id' => $user->getId(),
            'name' => $user->getName()
        ];

        header('Location: /home?id='.$user->getId());

        return;
    }

    public function logout()
    {
        $_SESSION['user'] = null;

        header('Location: /login');
    }
};
