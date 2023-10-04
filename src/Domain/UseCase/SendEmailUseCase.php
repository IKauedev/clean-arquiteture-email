<?php

namespace CleanArquiteture\Domain\UseCase;

use CleanArquiteture\Domain\Interfaces\EmailProviderInterface;

class SendEmailUseCase implements EmailProviderInterface {
    private EmailProviderInterface  $emailProvider;

    public function __construct(EmailProviderInterface $emailProvider) {
        $this->emailProvider = $emailProvider;
    }

    public function execute(string $recipient, string $subject, string $message) : bool
    {
        return $this->emailProvider->execute($recipient, $subject, $message);
    }
}