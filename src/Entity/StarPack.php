<?php

namespace App\Entity;

class StarPack
{
    private int $whiteStarCount;

    private int $halfStarCount;

    private int $yellowStarCount;

    /**
     * @return int
     */
    public function getWhiteStarCount(): int
    {
        return $this->whiteStarCount;
    }

    /**
     * @param int $whiteStarCount
     * @return StarPack
     */
    public function setWhiteStarCount(int $whiteStarCount): StarPack
    {
        $this->whiteStarCount = $whiteStarCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getHalfStarCount(): int
    {
        return $this->halfStarCount;
    }

    /**
     * @param int $halfStarCount
     * @return StarPack
     */
    public function setHalfStarCount(int $halfStarCount): StarPack
    {
        $this->halfStarCount = $halfStarCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getYellowStarCount(): int
    {
        return $this->yellowStarCount;
    }

    /**
     * @param int $yellowStarCount
     * @return StarPack
     */
    public function setYellowStarCount(int $yellowStarCount): StarPack
    {
        $this->yellowStarCount = $yellowStarCount;
        return $this;
    }


}
