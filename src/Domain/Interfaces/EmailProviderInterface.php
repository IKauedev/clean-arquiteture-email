<?php

namespace CleanArquiteture\Domain\Interfaces;

interface EmailProviderInterface {
    public function execute(string $recipient, string $subject, string $message) : bool;
}