<?php

namespace App\Company\Infrastructure\DataFixtures;

use App\Company\Domain\Model\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Generator;
use Symfony\Component\Uid\Uuid;

class CompanyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->generateCompanies() as $company) {
            $manager->persist($company);

            $this->addReference(sprintf('company.%s', $company->slug), $company);
        }

        $manager->flush();
    }

    /**
     * @return Generator<Company>
     */
    public function generateCompanies(): Generator
    {
        yield new Company(
            Uuid::v4(),
            'Yalos ships',
            'yalos-ships',
            'Kalankar empire best ship manufacturer'
        );

        yield new Company(
            Uuid::v4(),
            'Emerald Industries',
            'emerald-industries',
            'Valkar ores from all the Etrein sector',
        );
    }
}