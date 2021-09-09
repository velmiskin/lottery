<?php

namespace App\DataFixtures;

use App\Entity\Salutation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SalutationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $titles = ['Mr.', 'Mrs.', 'Ms'];
        foreach ($titles as $title) {
            $salutation = new Salutation();
            $salutation->setTitle($title);
            $manager->persist($salutation);
        }

        $manager->flush();
    }
}
