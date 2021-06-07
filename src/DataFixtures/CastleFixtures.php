<?php

namespace App\DataFixtures;

use App\Entity\Castle;
use App\Service\FakeGenerator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;


class CastleFixtures extends Fixture implements DependentFixtureInterface
{
    public const PICTURES = [
        'https://www.vinatis.com/45030-fine_default/chateau-ballue-mondon-2016.png',
        'https://www.vinatis.com/53557-fine_default/chateau-de-saint-pey-2016.png',
        'https://www.vinatis.com/52119-fine_default/kressmann-monopole-rouge-2018.png',
        'https://www.vinatis.com/46915-fine_default/chateau-pierre-de-montignac-2015-cru-bourgeois.png',
        'https://www.vinatis.com/47677-fine_default/chateau-pierron-2018.png',
        'https://www.vinatis.com/56404-fine_default/chateau-merigot-2018.png',
        'https://www.vinatis.com/52355-fine_default/chateau-grand-corbin-manuel-2016.png',
        'https://www.vinatis.com/54839-fine_default/cuvee-clemence-2019-cheval-quancard.png',
        'https://www.vinatis.com/54971-fine_default/agneau-selection-bordeaux-rouge-2017-baron-philippe-de-rothschild.png',
        'https://www.vinatis.com/56555-fine_default/chateau-bourdieu-2016.png',
        'https://www.vinatis.com/56628-fine_default/chateau-fleur-haut-gaussens-2018.png',
        'https://www.vinatis.com/57505-fine_default/chateau-haut-pougnan-2018.png',
        'https://www.vinatis.com/40923-fine_default/chateau-haut-prieur-2016.png',
        'https://www.vinatis.com/42698-fine_default/chateau-peyron-bouche-2015.png',
        'https://www.vinatis.com/51810-fine_default/reserve-mouton-cadet-saint-estephe-2018-baron-philippe-de-rothschild.png',

    ];

    private $fakeGenerator;

    public function __construct(FakeGenerator $fakeGenerator)
    {
        $this->fakeGenerator = $fakeGenerator;
    }

    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<=14; $i++) {
            $castle = new Castle();
            $castle->setName($this->fakeGenerator->castle());
            $castle->setAppelation($this->getReference('appelation_' . rand(0,10)));
            $castle->setImage(CastleFixtures::PICTURES[$i]);

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
