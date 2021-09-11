<?php

namespace App\DataFixtures;

use App\Entity\Participant;
use App\Repository\SalutationRepository;
use App\Repository\StatusRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ParticipantFixtures extends Fixture implements FixtureGroupInterface, DependentFixtureInterface
{

    public static function getGroups(): array
    {
        return ['two'];
    }
    
    public function load(ObjectManager $manager)
    {
        $participant = new Participant();
        $participant->setEmail('test@email.com');
        $participant->setSalutation($this->getReference(SalutationFixtures::DEFAULT_SALUTATION));
        $participant->setStatus($this->getReference(StatusFixtures::DEFAULT_STATUS));
        $participant->setFirstName('John');
        $participant->setLastName('Smith');
        $manager->persist($participant);
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            SalutationFixtures::class,
            StatusFixtures::class,
        ];
    }
}
