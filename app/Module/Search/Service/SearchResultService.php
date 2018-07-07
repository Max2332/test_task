<?php

namespace App\Module\Search\Service;

use App\Module\Search\Entity\SearchResultEntity;

/**
 * Interface SearchResultService
 * @package App\Module\Search\Service
 */
interface SearchResultService
{

    /**
     * Сохранение подсказок из гео Api
     *
     * @param SearchResultEntity $searchResultEntity
     * @return SearchResultEntity
     */
    public function save(SearchResultEntity $searchResultEntity):SearchResultEntity;
}