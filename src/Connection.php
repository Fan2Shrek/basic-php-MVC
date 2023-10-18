<?php

return new class{
    private const DB_HOST = 'localhost';

    private const DB_USER = 'root';

    private const DB_PASSWORD = 'root';

    private const DB_NAME = 'MVC';

    private $connection = null;

    public function getConnection(){
        if (null === $this->connection) {
            $this->connection = new PDO("mysql:host=".self::DB_HOST.";dbname=".self::DB_NAME, self::DB_USER, self::DB_PASSWORD);
        }

        return $this->connection;
    }

    public function __call(string $name, array $arguments){
        return $this->getConnection()->$name(...$arguments);
    }
};
