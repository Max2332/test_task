<?php

namespace App\Module\Search\Repository\Impl;


use App\Module\Search\Entity\FragmentEntity;
use App\Module\Search\Model\FragmentModel;
use App\Module\Search\Repository\FragmentRepository;
use Illuminate\Database\Eloquent\Builder;
use Structure\Base\Repository\Repository;

class FragmentRepositoryImpl extends Repository implements FragmentRepository
{

    protected $modelClassName = FragmentModel::class;

    /**
     * @var Builder $model
     */
    protected $model;

    /**
     * Сохранение fragment entity
     *
     * @param FragmentEntity $fragmentEntity
     * @return FragmentEntity
     */
    public function save(FragmentEntity $fragmentEntity): FragmentEntity
    {
        return $this->model->create($fragmentEntity->toArray())->first();
    }

    /**
     * Получение fragment entity
     *
     * @param string $fragment
     * @return FragmentEntity
     */
    public function find(string $fragment): FragmentEntity
    {
        return $this->model->whereFragment($fragment)->first();
    }


}