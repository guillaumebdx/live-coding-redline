<?php


namespace App\Service;


use App\Entity\SearchBottle;
use App\Repository\BottleRepository;

class SearchBottleProvider
{
    private $bottleRepository;

    public function __construct(BottleRepository $bottleRepository)
    {
        $this->bottleRepository = $bottleRepository;
    }

    public function createSearch(SearchBottle $searchBottle)
    {
        $keywords = $searchBottle->getKeywords();
        $results = $this->bottleRepository->findByYearOrCastle($keywords);
        $searchBottle->setResults($results);
    }
}