<?php

namespace App\Module\Search\Repository\Impl;


use App\Module\Search\Entity\SearchResultEntity;
use App\Module\Search\Model\SearchResultModel;
use App\Module\Search\Repository\SearchResultRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Structure\Base\Repository\Repository;

class SearchResultRepositoryImpl extends Repository implements SearchResultRepository
{
    protected $modelClassName = SearchResultModel::class;

    /**
     * @var Builder $model
     */
    protected $model;

    /**
     *Сохранение результатов поиска
     *
     * @param SearchResultEntity $searchResultEntity
     * @return SearchResultEntity
     */
    public function save(SearchResultEntity $searchResultEntity): SearchResultEntity
    {
        return $this->model->create($searchResultEntity->toArray())->first();
    }

    /**
     * Поиск по fragment id
     *
     * @param int $fragmentId
     * @return Collection
     */
    public function findByFragmentId(int $fragmentId): Collection
    {
        return $this->model->whereFragmentId($fragmentId)->get();
    }
}