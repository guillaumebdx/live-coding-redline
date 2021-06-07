<?php

namespace App\DataFixtures;

use App\Entity\Castle;
use App\Service\FakeGenerator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;


class CastleFixtures extends Fixture implements DependentFixtureInterface
{
    private $fakeGenerator;

    public function __construct(FakeGenerator $fakeGenerator)
    {
        $this->fakeGenerator = $fakeGenerator;
    }

    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<=30; $i++) {
            $castle = new Castle();
            $castle->setName($this->fakeGenerator->castle());
            $castle->setAppelation($this->getReference('appelation_' . rand(0,10)));
            dd($this->fakeGenerator->imageVin(640,480));
            $manager->persist($castle);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AppelationFixtures::class,
        ];
    }


}
