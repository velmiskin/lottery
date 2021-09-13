<?php

namespace App\MessageHandler;

use App\Message\EmailMessage;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class EmailMessageHandler implements MessageHandlerInterface, LoggerAwareInterface
{
    private LoggerInterface $logger;

    public function __construct(private MailerInterface $mailer) {}

    /**
     * @param EmailMessage $email
     * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
     */
    public function __invoke(EmailMessage $email)
    {
        $this->mailer->send($email->getEmail());
        $this->logger->info('Email send!');
    }

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}