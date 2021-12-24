<?php

namespace App\Shared\Infrastructure\DataFixtures;

use App\Shared\Domain\Model\User;
use App\Shared\Domain\Model\UserStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Uid\Uuid;

class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function load(ObjectManager $manager)
    {
        foreach ($this->generateUsers() as $user) {
            $user->password = $this->passwordHasher->hashPassword($user, $user->plainPassword);

            $manager->persist($user);

            $this->addReference(sprintf('user.%s', $user->email), $user);
        }

        $manager->flush();
    }

    public function generateUsers(): \Generator
    {
        yield new User(
            Uuid::v4(),
            'yelena@yahho.fr',
            null,
            'fancy-password',
            UserStatus::Confirmed,
        );
    }
}