<?php

namespace App\Module\Geosearch\Repository\Impl;


use App\Module\Geosearch\Entity\GeoSearchEntity;
use App\Module\Geosearch\Model\GeoSearchModel;
use App\Module\Geosearch\Repository\GeoSearchRepository;
use Illuminate\Database\Eloquent\Builder;
use Structure\Base\Repository\Repository;

/**
 * Class GeoSearchRepositoryImpl
 * @package App\Module\Geosearch\Repository\Impl
 */
class GeoSearchRepositoryImpl extends Repository implements GeoSearchRepository
{

    protected $modelClassName = GeoSearchModel::class;

    /**
     * @var Builder $model
     */
    protected $model;

    /**
     * Сохранение fragment entity
     *
     * @param GeoSearchEntity $fragmentEntity
     * @return GeoSearchEntity
     */
    public function save(GeoSearchEntity $fragmentEntity): GeoSearchEntity
    {
        return $this->model->create($fragmentEntity->toArray())->first();
    }

    /**
     * Получение fragment entity
     *
     * @param string $fragment
     * @return GeoSearchEntity
     */
    public function find(string $fragment): ?GeoSearchEntity
    {
        return $this->model->whereFragment($fragment)->first();
    }


}