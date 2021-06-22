<?php

namespace App\Service;

use App\Entity\StarPack;

class StarPackBuilder
{

    public function buildStarPack(float $rating): StarPack
    {
        $starPack = new StarPack();
        $starPack
            ->setWhiteStarCount($this->countWhiteStar($rating))
            ->setGoldStarCount($this->countGoldStar($rating))
            ->setHalfStarCount($this->countHalfStar($rating));
        return $starPack;
    }

    public function countWhiteStar(float $rating): int
    {
        return 5 - $rating;
    }

    public function countGoldStar(float $rating): int
    {
        return $rating;
    }

    public function countHalfStar(float $rating): int
    {
        return floor($rating) === $rating ? 0 : 1;
    }
}
