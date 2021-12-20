<?php

namespace App\Shared\Infrastructure\DataFixtures;

use App\Shared\Domain\Model\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Uid\Uuid;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->generateUsers() as $user) {
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
            'fancy-password',
        );
    }
}