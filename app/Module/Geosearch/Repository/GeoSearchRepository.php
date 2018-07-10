<?php

namespace App\Module\Geosearch\Repository;


use App\Module\Geosearch\Entity\GeoSearchEntity;
use Structure\Contract\Repository;

/**
 * Interface GeoSearchRepository
 * @package App\Module\Geosearch\Repository
 */
interface GeoSearchRepository extends Repository
{

    /**
     * Сохранение fragment entity
     *
     * @param GeoSearchEntity $fragmentEntity
     * @return GeoSearchEntity
     */
    public function save(GeoSearchEntity $fragmentEntity): GeoSearchEntity;

    /**
     * Получение fragment entity
     * 
     * @param string $fragment
     * @return null|GeoSearchEntity
     */
    public function find(string $fragment): ?GeoSearchEntity;
}