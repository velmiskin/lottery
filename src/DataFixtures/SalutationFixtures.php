<?php

namespace App\DataFixtures;

use App\Entity\Salutation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class SalutationFixtures extends Fixture implements FixtureGroupInterface
{
    public const DEFAULT_SALUTATION = 'default-salutation';

    public static function getGroups(): array
    {
        return ['one'];
    }

    public function load(ObjectManager $manager)
    {
        $titles = ['Mr.', 'Mrs.', 'Ms'];
        foreach ($titles as $title) {
            $salutation = new Salutation();
            $salutation->setTitle($title);
            $manager->persist($salutation);
        }
        $this->setReference(self::DEFAULT_SALUTATION, $salutation);
        $manager->flush();
    }
}
