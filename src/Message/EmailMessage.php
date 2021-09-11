<?php


namespace App\Message;

use Symfony\Component\Mime\Email;

class EmailMessage
{

    public function __construct(private Email $email) {}

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

}