<?php

namespace CleanArquiteture\Repository;

use CleanArquiteture\Entity\EmailEntity;

interface EmailRepository {
    public function save(EmailEntity $email): void;

    public function findById(int $id): ?EmailEntity;

    public function findAll(): array;

    public function update(EmailEntity $email): void;

    public function delete(EmailEntity $email): void;
}