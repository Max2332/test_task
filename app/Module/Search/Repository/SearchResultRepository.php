<?php

namespace App\Module\Search\Repository;


use App\Module\Search\Entity\SearchResultEntity;
use Illuminate\Support\Collection;
use Structure\Contract\Repository;

/**
 * Interface SearchResultRepository
 * @package App\Module\Search\Repository
 */
interface SearchResultRepository extends Repository
{
    /**
     *Сохранение результатов поиска
     *
     * @param SearchResultEntity $searchResultEntity
     * @return SearchResultEntity
     */
    public function save(SearchResultEntity $searchResultEntity): SearchResultEntity;

    /**
     * Поиск по fragment id
     * 
     * @param int $fragmentId
     * @return Collection
     */
    public function findByFragmentId(int $fragmentId): Collection;
}