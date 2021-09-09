<?php

namespace App\DataFixtures;

use App\Entity\Status;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StatusFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $statuses = [
            0 => ['name' => 'Angelegt', 'mailSubject' => 'Sie haben erfolgreich registrierten',
                  'mailBody' => 'Hallo %s, Sie haben erfolgreich registrierten.', 'isDefault' => '1'],
            1 => ['name' => 'Gültig', 'mailSubject' => 'Ihr Status hat auf Gültig geändert',
                'mailBody' => 'Hallo %s, Ihr Status hat auf Gültig geändert.', 'isDefault' => '0'],
            2 => ['name' => 'Ungültig', 'mailSubject' => 'Ihr Status hat auf Ungültig geändert',
                'mailBody' => 'Hallo %s, leider hat Ihr Status auf Ungültig geändert.', 'isDefault' => '0'],
        ];

        foreach ($statuses as $s) {
            $status = new Status();
            $status->setName($s['name']);
            $status->setIsDefault($s['isDefault']);
            $status->setMailSubject($s['mailSubject']);
            $status->setMailBody($s['mailBody']);
            $manager->persist($status);
        }

        $manager->flush();
    }
}
