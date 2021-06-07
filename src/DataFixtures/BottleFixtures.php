<?php

namespace App\DataFixtures;

use App\Entity\Bottle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BottleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<=14; $i++) {
            $bottle = new Bottle();
            $bottle->setCastle($this->getReference('castle_' . $i));
            $bottle->setYear(rand(1998, 2019));
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
