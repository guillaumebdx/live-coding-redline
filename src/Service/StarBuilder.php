<?php

namespace App\Service;

use App\Entity\StarPack;

class StarBuilder
{
    private StarPack $starPack;

    public function __construct()
    {
        $this->starPack = new StarPack();
    }

    public function buildStarPack(float $rating): StarPack
    {
        $this->starPack->setWhiteStarCount($this->countWhiteStar($rating));
        $this->starPack->setHalfStarCount($this->countHalfStar($rating));
        $this->starPack->setYellowStarCount($this->countYellowStar($rating));
        return $this->starPack;
    }

    public function countWhiteStar(float $rating): int
    {
        return 5 - $rating;
    }

    public function countYellowStar(float $rating): int
    {
        return $rating;
    }

    public function countHalfStar(float $rating): int
    {
        return 5 - ($this->countYellowStar($rating) + $this->countWhiteStar($rating));
    }

}
