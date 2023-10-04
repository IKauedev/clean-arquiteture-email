<?php

namespace CleanArquiteture\Entity;

class Email
{
    public function __construct(
        private string $address
    ) {
        if (!$this->isValidEmail($address)) {
            throw new \InvalidEmailException("Endereço de e-mail inválido: $address");
        }

        $this->address = $address;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    private function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}