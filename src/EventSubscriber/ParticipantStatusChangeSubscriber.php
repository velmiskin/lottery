<?php

namespace App\EventSubscriber;

use App\Event\ParticipantStatusChangeEvent;
use App\Message\EmailMessage;
use App\Repository\ParticipantRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Mime\Email;

class ParticipantStatusChangeSubscriber implements EventSubscriberInterface
{
    public function __construct(private MessageBusInterface $bus, private ParticipantRepository $repository) {}

    public function onStatusChange(ParticipantStatusChangeEvent $event)
    {
        $participant = $this->repository->find($event->getParticipantId());
        $email = (new Email())
            ->from('info@example.com')
            ->to($participant->getEmail())
            ->subject($participant->getStatus()->getMailSubject())
            ->html('<p>'.$participant->getStatus()->getMailBody().'</p>');
        $this->bus->dispatch(new EmailMessage($email));
    }

    public static function getSubscribedEvents()
    {
        return [
            'status.change' => 'onStatusChange',
        ];
    }
}
