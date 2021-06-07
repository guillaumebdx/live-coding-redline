<?php

namespace App\DataFixtures;

use App\Entity\Appelation;
use App\Service\FakeGenerator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppelationFixtures extends Fixture
{
    private FakeGenerator $fakeGenerator;

    public function __construct(FakeGenerator $fakeGenerator)
    {
        $this->fakeGenerator = $fakeGenerator;
    }

    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<=10; $i++) {
            $appelation = new Appelation();
            $appelation->setName($this->fakeGenerator->appelation());
            $manager->persist($appelation);
            $this->addReference('appelation_' . $i, $appelation);
        }
        $manager->flush();
    }
}
