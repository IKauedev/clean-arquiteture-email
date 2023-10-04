<?php
use CleanArquiteture\Domain\Interfaces\EmailProviderInterface;
use PHPMailer\PHPMailer\PHPMailer;

class YahooProvider implements EmailProviderInterface {
    public function sendEmail(string $recipient, string $message, string $subject ) : bool
    {
        $send = new PHPMailer(true);

        try {

            $send->SMTPDebug = 0;
            $send->isSMTP();
            $send->Host = "smtp.example.com";
            $send->Username = "seu-email@yahoo.com";
            $send->Password = "sua senha";
            $send->SMTPSecure = "tls";
            $send->Port = 587;

            $send->setFrom('kaue@gmail.com', 'kaue');
            $send->addAddress($recipient);

            $send->isHTML(true);
            $send->Subject = $subject;
            $send->Body = $message;

            return true;

        } catch (\Exception $e) {
            throw new InvalidEmailException("Erro no envio do email");
        }
    }
}