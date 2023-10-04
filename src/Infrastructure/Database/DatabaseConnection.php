<?php

namespace CleanArquiteture\Infrastructure\Database;

use PDO;
use PDOException;

class DataBaseConnection {
    private $pdo;
    public static $instance;

    public function __construct(
        private string $host,
        private string $username,
        private string $password,
        private string $dbname,
        private string $charset = 'utf8'
    ) {
        $this->connect();
    }

    private function connect()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";

        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new PDOException("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }
}