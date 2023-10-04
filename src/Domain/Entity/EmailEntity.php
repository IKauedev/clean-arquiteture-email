<?php

namespace CleanArquiteture\Entity;

class EmailEntity
{
    /**
     * Summary of __construct
     * @param string $address
     * @throws \InvalidEmailException
     */
    public function __construct(
        private string $address
    ) {
        if (!$this->isValidEmail($address)) {
            throw new \InvalidEmailException("Endereço de e-mail inválido: $address");
        }

        $this->address = $address;
    }

    /**
     * Summary of getAddress
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * Summary of getId
     * @return string
     */
    public function getId(): string
    {
        return $this->address;
    }

    /**
     * Summary of isValidEmail
     * @param string $email
     * @return bool
     */
    private function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}