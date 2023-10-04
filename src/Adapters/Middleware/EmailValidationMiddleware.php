<?php

namespace CleanArquiteture\Adapters\Middleware;

class EmailValidationMiddleware {

    public function __construct() { }
    public function handle($request, $next) {
        $email = $_POST['email'];

        $email = $request->getEmail();

        if(!$this->isValidEmail($email)) {
            echo "Email invalido";
            return;
        }

        return $next($request);
    }

    private function isValidEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}