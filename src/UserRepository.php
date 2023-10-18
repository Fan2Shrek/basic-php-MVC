<?php

require_once 'User.php';

return new class {
    private $connection;

    public function __construct(){
        $this->connection = require 'Connection.php';
    }

    public function register(User $user) {
        $stmt = $this->connection->prepare('INSERT INTO user (name, password) VALUES (:name, :password)');

        $stmt->execute([
                'name' => $user->getName(),
                'password' => $user->getPassword(),
            ]);

        return $this->connection->lastInsertId();
    }

    public function get(int $id) {
        $stmt = $this->connection->prepare('SELECT * FROM user WHERE id = :id');

        $stmt->execute([
                'id' => $id,
            ]);

        $result = $stmt->fetch();

        if (!$result){
            return null;
        }

        return (new User($result['name'], $result['password']))->setId($id);
    }

    public function getBy(string $name){
        $stmt = $this->connection->prepare('SELECT * FROM user WHERE name = :name');

        $stmt->execute([
            'name' => $name,
        ]);

        $result = $stmt->fetch();

        if (!$result){
            return null;
        }

        return (new User($result['name'], $result['password']))->setId($result['id']);
    }
};
