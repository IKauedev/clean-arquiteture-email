<?php

use CleanArquiteture\Adapters\Middleware\EmailValidationMiddleware;
use CleanArquiteture\Domain\Interfaces\EmailProviderInterface;
use CleanArquiteture\Domain\UseCase\SendEmailUseCase;
use CleanArquiteture\infrastructure\Persistence\EmailRepositoryImp;

class EmailController {
    
    public function __construct(
        private SendEmailUseCase $sendEmailUseCase
    ) {
        $this->sendEmailUseCase = $sendEmailUseCase;
    }

    public function index(
        EmailProviderInterface $emailProvider,
        string $recipient,
        string $subject,
        string $message,
        string $request
    ) {
        $emailValidationMiddleware = new EmailValidationMiddleware();

        $emailValidationMiddleware->handle($request, function($request)  use ($recipient, $subject, $message) {
            $result = $this->sendEmailUseCase->execute($recipient, $subject, $message);

            $emailRepositoryImp = new EmailRepositoryImp();
            $emailRepositoryImp->save($result);

            if (!$result) {
                echo "email não foi enviado";
            }
        });
    }
}