<?php

namespace App\DataFixtures;

use App\Entity\Bottle;
use App\Entity\Castle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BottleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<14; $i++) {
            $bottle = new Bottle();
            $bottle->setYear(rand(1980, 2018));
            $bottle->setCastle($this->getReference('castle_' . $i));
            $manager->persist($bottle);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          CastleFixtures::class,
        ];
    }
}
