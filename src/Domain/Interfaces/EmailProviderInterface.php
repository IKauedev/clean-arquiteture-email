<?php

namespace CleanArquiteture\Domain\Interfaces;

interface EmailProviderInterface {
    public function sendEmail(string $recipient, string $subject, string $message) : bool;
}