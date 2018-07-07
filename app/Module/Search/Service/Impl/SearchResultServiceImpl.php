<?php

namespace App\Module\Service\Impl;


use App\Module\Search\Entity\SearchResultEntity;
use App\Module\Search\Repository\SearchResultRepository;
use App\Module\Search\Service\SearchResultService;

class SearchResultServiceImpl implements SearchResultService
{
    /**
     * @var SearchResultRepository $searchResultRepository
     */
    protected $searchResultRepository;

    /**
     * SearchResultServiceImpl constructor.
     * @param SearchResultRepository $searchResultRepository
     */
    public function __construct(SearchResultRepository $searchResultRepository)
    {
        $this->searchResultRepository = $searchResultRepository;
    }

    /**
     * Сохранение подсказок из гео Api
     *
     * @param SearchResultEntity $searchResultEntity
     * @return SearchResultEntity
     */
    public function save(SearchResultEntity $searchResultEntity): SearchResultEntity
    {
        return $this->searchResultRepository->save($searchResultEntity);
    }


}