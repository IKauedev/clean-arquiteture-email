<?php

namespace CleanArquiteture\Repository;

use CleanArquiteture\Entity\Email;

interface EmailRepository {
    public function save(Email $address): void;
    public function findById(int $id): ?Email;
    public function findAll(): array;
    public function update(Email $address): void;
    public function delete(Email $address): void;
}