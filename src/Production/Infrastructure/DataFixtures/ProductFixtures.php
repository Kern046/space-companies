<?php

namespace App\Production\Infrastructure\DataFixtures;

use App\Company\Infrastructure\DataFixtures\CompanyFixtures;
use App\Production\Domain\Model\Product\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Uid\Uuid;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->generateProducts() as $product) {
            $manager->persist($product);

            $this->addReference(
                sprintf('product.%s.%s', $product->company->slug, $product->slug),
                $product,
            );
        }

        $manager->flush();
    }

    public function generateProducts(): \Generator
    {
        yield new Product(
            Uuid::v4(),
            'Star Crusader',
            'star-crusader',
            'Light fighter with a hyperdrive easily deployed in any corner of the galaxy',
            $this->getReference('company.yalos-ships')
        );
    }

    /**
     * @return list<class-string>
     */
    public function getDependencies(): array
    {
        return [
            CompanyFixtures::class,
        ];
    }
}