<?php

namespace CleanArquiteture\infrastructure\Persistence;

use CleanArquiteture\Entity\EmailEntity;
use CleanArquiteture\Infrastructure\Database\DataBaseConnection;
use CleanArquiteture\Repository\EmailRepository;

class EmailRepositoryImp implements EmailRepository {
    private  DataBaseConnection $connection;

    public function __construct() { }

    public function save(EmailEntity $address): void {
        $sql = "INSERT INTO emails (address) VALUES (:address)";
        $pdo = $this->connection->getPdo();

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':address', $address->getAddress());
        $stmt->execute();
    }

    public function findById(int $id): ?EmailEntity {
        $sql = "SELECT * FROM emails WHERE id = :id";
        $pdo = $this->connection->getPdo();

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new EmailEntity($row['address']);
    }

    public function findAll(): array {
        $sql = "SELECT * FROM emails";
        $pdo = $this->connection->getPdo();
        $stmt = $pdo->query($sql);
        $emails = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $emails[] = new EmailEntity($row['address']);
        }

        return $emails;
    }

    public function update(EmailEntity $address): void {
        $sql = "UPDATE emails SET address = :address WHERE id = :id";
        $pdo = $this->connection->getPdo();
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $address->getId());
        $stmt->bindParam(':address', $address->getAddress());
        $stmt->execute();
    }

    public function delete(EmailEntity $address): void {
        $sql = "DELETE FROM emails WHERE id = :id";
        $pdo = $this->connection->getPdo();
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $address->getId());
        $stmt->execute();
    }
}