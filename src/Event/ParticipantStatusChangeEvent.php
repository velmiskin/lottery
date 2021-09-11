<?php


namespace App\Event;

use Ramsey\Uuid\UuidInterface;
use Symfony\Contracts\EventDispatcher\Event;

class ParticipantStatusChangeEvent extends Event
{
    public function __construct(private UuidInterface $participantId) {}

    /**
     * @return UuidInterface
     */
    public function getParticipantId(): UuidInterface
    {
        return $this->participantId;
    }
}