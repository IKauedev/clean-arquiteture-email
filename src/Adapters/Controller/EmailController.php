<?php

use CleanArquiteture\Adapters\Middleware\EmailValidationMiddleware;
use CleanArquiteture\Domain\Interfaces\EmailProviderInterface;
use CleanArquiteture\Domain\UseCase\SendEmailUseCase;

class EmailController {
    
    public function __construct(
        private SendEmailUseCase $sendEmailUseCase
    ) {
        $this->sendEmailUseCase = $sendEmailUseCase;
    }

    public function sendEmailAction(
        EmailProviderInterface $emailProvider,
        string $recipient,
        string $subject,
        string $message,
        string $request
    ) {
        $emailValidationMiddleware = new EmailValidationMiddleware();

        $emailValidationMiddleware->handle($request, function($request)  use ($recipient, $subject, $message) {
            $result = $this->sendEmailUseCase->sendEmail($recipient, $subject, $message);

            if (!$result) {
                echo "email não foi enviado";
            }
        });
    }
}