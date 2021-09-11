<?php

namespace App\MessageHandler;

use App\Message\EmailMessage;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class EmailMessageHandler implements MessageHandlerInterface
{
    public function __construct(private MailerInterface $mailer) {}

    /**
     * @param EmailMessage $email
     * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
     */
    public function __invoke(EmailMessage $email)
    {
        $this->mailer->send($email->getEmail());
    }
}