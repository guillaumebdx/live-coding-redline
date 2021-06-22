<?php

namespace App\Entity;

class StarPack
{
    private $whiteStarCount;

    private $goldStarCount;

    private $halfStarCount;

    /**
     * @return mixed
     */
    public function getWhiteStarCount()
    {
        return $this->whiteStarCount;
    }

    /**
     * @param mixed $whiteStarCount
     * @return StarPack
     */
    public function setWhiteStarCount($whiteStarCount)
    {
        $this->whiteStarCount = $whiteStarCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGoldStarCount()
    {
        return $this->goldStarCount;
    }

    /**
     * @param mixed $goldStarCount
     * @return StarPack
     */
    public function setGoldStarCount($goldStarCount)
    {
        $this->goldStarCount = $goldStarCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHalfStarCount()
    {
        return $this->halfStarCount;
    }

    /**
     * @param mixed $halfStarCount
     * @return StarPack
     */
    public function setHalfStarCount($halfStarCount)
    {
        $this->halfStarCount = $halfStarCount;
        return $this;
    }



}
