<?php

namespace CleanArquiteture\infrastructure\Persistence;

use CleanArquiteture\Entity\Email;
use CleanArquiteture\Repository\EmailRepository;
use PDO;

class EmailRepositoryImp implements EmailRepository {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function save(Email $email): void {

    }

    public function findById(int $id): ?Email {
        return null;
    }

    public function findAll(): array {
        return [];
    }

    public function update(Email $email): void {
    }

    public function delete(Email $email): void {

    }
}