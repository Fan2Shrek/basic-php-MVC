<?php

return new class {
    private $repository;

    public function __construct(){
        $this->repository = require 'FilmRepository.php';
    }

    public function edit(int $id){
        $film = $this->repository->get($id);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require 'assets/filmEdit.php';

            return;
        }

        $film->setRealisateur($_POST['realisateur'])
            ->setAnnee($_POST['annee'])
            ->setGenre($_POST['genre'])
            ->setScenariste($_POST['scenariste'])
            ->setSociete($_POST['societe'])
            ->setSynopsis($_POST['synopsis'])
            ->setTitre($_POST['titre']);

        $this->repository->update($film);

        header('Location: /home');
    }

    public function delete(int $id)
    {
        $film = $this->repository->get($id);

        $this->repository->deleteRelation($film, $_SESSION['user']['id']);

        header('Location: /home');
    }

    public function add(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $_SESSION['flash']['error'] = '';
            require 'assets/filmAdd.php';

            return;
        }

        if (\in_array('', $_POST, true)) {
            $_SESSION['flash']['error'] = 'Veuillez remplir tous les champs';
            require 'assets/filmAdd.php';

            return;
        }

        if (!is_numeric($_POST['annee'])){
            $_SESSION['flash']['error'] = 'Veuillez entrer une année valide';
            require 'assets/filmAdd.php';

            return;
        }

        $film = new Film($_POST['titre'], $_POST['realisateur'], $_POST['synopsis'], $_POST['genre'], $_POST['scenariste'], $_POST['societe'], $_POST['annee'], '' !== $_FILES['image']['tmp_name'] ? file_get_contents($_FILES['image']['tmp_name']) : null);

        $this->repository->add($film, $_SESSION['user']['id']);

        header('Location: /home');
    }

    public function search(string $q)
    {
        $films = $this->repository->findNameLike($q);

        require 'assets/result.php';
    }

    public function addToList(int $id)
    {
        $film = $this->repository->get($id);

        $this->repository->addToUser($_SESSION['user']['id'], $film->getId());

        header('Location: /home');
    }

    public function view(int $id)
    {
        $film = $this->repository->get($id);

        require 'assets/filmView.php';
    }
};
