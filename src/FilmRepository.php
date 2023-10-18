<?php

require_once 'User.php';
require_once 'Film.php';

return new class
{
    private $connection;

    public function __construct()
    {
        $this->connection = require 'Connection.php';
    }

    public function getFilm(User $user)
    {
        $stmt = $this->connection->prepare('SELECT * FROM user_film, film WHERE user = :id and film.id = film');

        $stmt->execute([
            'id' => $user->getId(),
        ]);

        $films = [];

        while ($result = $stmt->fetch()) {
            $films[] = (new Film($result['titre'], $result['realisateur'], $result['synopsis'], $result['genre'], $result['scenariste'], $result['societe'], $result['annee'], $result['image']))->setId($result['id']);
        }

        return $films;
    }

    public function get(int $id): Film
    {
        $stmt = $this->connection->prepare('SELECT * FROM film WHERE id = :id');

        $stmt->execute([
            'id' => $id,
        ]);

        $result = $stmt->fetch();

        if (!$result) {
            throw new Exception('Film not found');
        }

        return (new Film($result['titre'], $result['realisateur'], $result['synopsis'], $result['genre'], $result['scenariste'], $result['societe'], $result['annee'], $result['image']))->setId($result['id']);
    }

    public function update(Film $film)
    {
        $stmt = $this->connection->prepare('UPDATE film SET titre = :titre, realisateur = :realisateur, synopsis = :synopsis, genre = :genre, scenariste = :scenariste, societe = :societe, annee = :annee WHERE id = :id');

        $stmt->execute([
            'titre' => $film->getTitre(),
            'realisateur' => $film->getRealisateur(),
            'synopsis' => $film->getSynopsis(),
            'genre' => $film->getGenre(),
            'scenariste' => $film->getScenariste(),
            'societe' => $film->getSociete(),
            'annee' => $film->getAnnee(),
            'id' => $film->getId(),
        ]);
    }

    public function delete(Film $film)
    {
        $this->deleteRelation($film);
        $stmt = $this->connection->prepare('DELETE FROM film WHERE id = :id');

        $stmt->execute([
            'id' => $film->getId(),
        ]);
    }

    public function deleteRelation(Film $film)
    {
        $stmt = $this->connection->prepare('DELETE FROM user_film WHERE film = :id');

        $stmt->execute([
            'id' => $film->getId(),
        ]);
    }

    public function add(Film $film, int $id)
    {
        $stmt = $this->connection->prepare('INSERT INTO film (titre, realisateur, synopsis, genre, scenariste, societe, annee, image) VALUES (:titre, :realisateur, :synopsis, :genre, :scenariste, :societe, :annee, :image)');

        $stmt->execute([
            'titre' => $film->getTitre(),
            'realisateur' => $film->getRealisateur(),
            'synopsis' => $film->getSynopsis(),
            'genre' => $film->getGenre(),
            'scenariste' => $film->getScenariste(),
            'societe' => $film->getSociete(),
            'annee' => $film->getAnnee(),
            'image' => $film->getImage(),
        ]);

        $this->addToUser($id, $this->connection->lastInsertId());
    }

    public function addToUser(int $id, int $film)
    {
        $stmt = $this->connection->prepare('SELECT * FROM user_film where user = :user and film = :film');

        $stmt->execute([
            'user' => $id,
            'film' => $film,
        ]);

        if ($stmt->fetch()) {
            return;
        }

        $stmt = $this->connection->prepare('INSERT INTO user_film (user, film) VALUES (:user, :film)');

        $stmt->execute([
            'user' => $id,
            'film' => $film,
        ]);
    }

    public function findNameLike(string $name)
    {
        $stmt = $this->connection->prepare('SELECT * FROM film WHERE titre LIKE :name');

        $stmt->execute([
            'name' => "%$name%",
        ]);

        $films = [];

        while ($result = $stmt->fetch()) {
            $films[] = (new Film($result['titre'], $result['realisateur'], $result['synopsis'], $result['genre'], $result['scenariste'], $result['societe'], $result['annee'], $result['image']))->setId($result['id']);
        }

        return $films;
    }
};
