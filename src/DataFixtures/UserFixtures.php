<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture implements FixtureGroupInterface
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public static function getGroups(): array
    {
        return ['one'];
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('test@test.site');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->passwordHasher->hashPassword($user, '123456'));
        $manager->persist($user);

        $manager->flush();
    }
}
