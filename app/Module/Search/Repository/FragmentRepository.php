<?php

namespace App\Module\Search\Repository;


use App\Module\Search\Entity\FragmentEntity;
use Structure\Contract\Repository;

/**
 * Interface FragmentRepository
 * @package App\Module\Search\Repository
 */
interface FragmentRepository extends Repository
{

    /**
     * Сохранение fragment entity
     *
     * @param FragmentEntity $fragmentEntity
     * @return FragmentEntity
     */
    public function save(FragmentEntity $fragmentEntity): FragmentEntity;

    /**
     * Получение fragment entity
     * 
     * @param string $fragment
     * @return null|FragmentEntity
     */
    public function find(string $fragment): ?FragmentEntity;
}