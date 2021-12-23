<?php

namespace App\Trade\Infrastructure\DataFixtures;

use App\Production\Infrastructure\DataFixtures\ProductFixtures;
use App\Shared\Domain\Model\Currency;
use App\Shared\Domain\Model\Price;
use App\Trade\Domain\Model\Offer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Uid\Uuid;

class OfferFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->generateOffers() as $offer) {
            $manager->persist($offer);
        }

        $manager->flush();
    }

    public function generateOffers(): \Generator
    {
        yield new Offer(
            Uuid::v4(),
            $this->getReference('product.yalos-ships.star-crusader'),
            new Price(Currency::EUR, 100000)
        );
    }

    public function getDependencies(): array
    {
        return [
            ProductFixtures::class,
        ];
    }
}