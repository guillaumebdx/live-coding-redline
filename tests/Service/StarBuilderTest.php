<?php

namespace App\Tests\Service;

use App\Entity\StarPack;
use App\Service\StarBuilder;
use PHPUnit\Framework\TestCase;

class StarBuilderTest extends TestCase
{
    public function testCountWhiteStarWithIntegerRating(): void
    {
        $starBuilder = new StarBuilder();
        $this->assertEquals(0,$starBuilder->countWhiteStar(5));
        $this->assertEquals(1,$starBuilder->countWhiteStar(4));
        $this->assertEquals(2,$starBuilder->countWhiteStar(3));
        $this->assertEquals(3,$starBuilder->countWhiteStar(2));
        $this->assertEquals(4,$starBuilder->countWhiteStar(1));
        $this->assertEquals(5,$starBuilder->countWhiteStar(0));
    }

    public function testCountWhiteStarWithFloatRating()
    {
        $starBuilder = new StarBuilder();
        $this->assertEquals(0,$starBuilder->countWhiteStar(4.6));
        $this->assertEquals(0,$starBuilder->countWhiteStar(4.5));
        $this->assertEquals(0,$starBuilder->countWhiteStar(4.1));
        $this->assertEquals(1,$starBuilder->countWhiteStar(3.9));
        $this->assertEquals(1,$starBuilder->countWhiteStar(3.4));
        $this->assertEquals(2,$starBuilder->countWhiteStar(3.0));
        $this->assertEquals(5,$starBuilder->countWhiteStar(0.0));
        $this->assertEquals(4,$starBuilder->countWhiteStar(0.1));
    }

    public function testCountWhiteStarWithInteger()
    {
        $starBuilder = new StarBuilder();
        $this->assertEquals(5, $starBuilder->countYellowStar(5));
        $this->assertEquals(4, $starBuilder->countYellowStar(4));
        $this->assertEquals(3, $starBuilder->countYellowStar(3));
        $this->assertEquals(2, $starBuilder->countYellowStar(2));
        $this->assertEquals(1, $starBuilder->countYellowStar(1));
        $this->assertEquals(0, $starBuilder->countYellowStar(0));
    }

    public function testCountYellowStarWithFloat()
    {
        $starBuilder = new StarBuilder();
        $this->assertEquals(4, $starBuilder->countYellowStar(4.9));
        $this->assertEquals(4, $starBuilder->countYellowStar(4.1));
        $this->assertEquals(3, $starBuilder->countYellowStar(3.9));
        $this->assertEquals(3, $starBuilder->countYellowStar(3.1));
        $this->assertEquals(3, $starBuilder->countYellowStar(3.5));
        $this->assertEquals(1, $starBuilder->countYellowStar(1.1));
        $this->assertEquals(0, $starBuilder->countYellowStar(0.0));
        $this->assertEquals(4, $starBuilder->countYellowStar(4.0));
    }

    public function testCountHalfStar()
    {
        $starBuilder = new StarBuilder();
        $this->assertEquals(0, $starBuilder->countHalfStar(5));
        $this->assertEquals(0, $starBuilder->countHalfStar(4));
        $this->assertEquals(0, $starBuilder->countHalfStar(3));
        $this->assertEquals(0, $starBuilder->countHalfStar(2));
        $this->assertEquals(0, $starBuilder->countHalfStar(1));
        $this->assertEquals(0, $starBuilder->countHalfStar(0));
        $this->assertEquals(1, $starBuilder->countHalfStar(4.9));
        $this->assertEquals(1, $starBuilder->countHalfStar(4.4));
        $this->assertEquals(1, $starBuilder->countHalfStar(3.9));
        $this->assertEquals(1, $starBuilder->countHalfStar(3.5));
        $this->assertEquals(1, $starBuilder->countHalfStar(3.4));
        $this->assertEquals(1, $starBuilder->countHalfStar(2.9));
    }

    public function testStarPack()
    {
        $starPack = new StarPack();
        $starPack
            ->setWhiteStarCount(3)
            ->setYellowStarCount(2)
            ->setHalfStarCount(0);
        $starBuilder = new StarBuilder();
        $this->assertEquals($starPack, $starBuilder->buildStarPack(2));

    }
}
