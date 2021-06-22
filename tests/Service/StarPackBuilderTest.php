<?php

namespace App\Tests\Service;

use App\Entity\StarPack;
use App\Service\StarPackBuilder;
use PHPUnit\Framework\TestCase;

class StarPackBuilderTest extends TestCase
{

    public function testCountWhiteStarInt(): void
    {
        $starPackBuilder = new StarPackBuilder();
        $this->assertEquals(5, $starPackBuilder->countWhiteStar(0));
        $this->assertEquals(4, $starPackBuilder->countWhiteStar(1));
        $this->assertEquals(3, $starPackBuilder->countWhiteStar(2));
        $this->assertEquals(2, $starPackBuilder->countWhiteStar(3));
        $this->assertEquals(1, $starPackBuilder->countWhiteStar(4));
        $this->assertEquals(0, $starPackBuilder->countWhiteStar(5));
    }

    public function testCountWhiteStarFloat()
    {
        $starPackBuilder = new StarPackBuilder();
        $this->assertEquals(4, $starPackBuilder->countWhiteStar(0.1));
        $this->assertEquals(4, $starPackBuilder->countWhiteStar(0.9));
        $this->assertEquals(0, $starPackBuilder->countWhiteStar(4.1));
        $this->assertEquals(0, $starPackBuilder->countWhiteStar(4.9));
    }

    public function testCountGoldStarInt()
    {
        $starPackBuilder = new StarPackBuilder();
        $this->assertEquals(5, $starPackBuilder->countGoldStar(5));
        $this->assertEquals(4, $starPackBuilder->countGoldStar(4));
        $this->assertEquals(3, $starPackBuilder->countGoldStar(3));
        $this->assertEquals(2, $starPackBuilder->countGoldStar(2));
        $this->assertEquals(1, $starPackBuilder->countGoldStar(1));
        $this->assertEquals(0, $starPackBuilder->countGoldStar(0));
    }

    public function testCountGoldStarFloat()
    {
        $starPackBuilder = new StarPackBuilder();
        $this->assertEquals(4, $starPackBuilder->countGoldStar(4.9));
        $this->assertEquals(4, $starPackBuilder->countGoldStar(4.1));
        $this->assertEquals(0, $starPackBuilder->countGoldStar(0.1));
        $this->assertEquals(0, $starPackBuilder->countGoldStar(0.9));

    }

    public function testCountHalfStar()
    {
        $starPackBuilder = new StarPackBuilder();
        $this->assertEquals(0, $starPackBuilder->countHalfStar(3));
        $this->assertEquals(1, $starPackBuilder->countHalfStar(3.5));
        $this->assertEquals(1, $starPackBuilder->countHalfStar(0.1));
        $this->assertEquals(1, $starPackBuilder->countHalfStar(0.9));
    }

    public function testStarPack()
    {
        $starPack = new StarPack();
        $starPack
            ->setGoldStarCount(3)
            ->setHalfStarCount(1)
            ->setWhiteStarCount(1);
        $starPackBuilder = new StarPackBuilder();
        $this->assertEquals($starPack, $starPackBuilder->buildStarPack(3.2));

    }
}
