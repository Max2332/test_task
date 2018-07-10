<?php

namespace App\Module\Geosearch\Service;


use App\Module\Geosearch\Entity\GeoSearchEntity;

/**
 * Interface GeoSearchService
 * @package App\Module\Geosearch\Service
 */
interface GeoSearchService
{
    /**
     * Сохранение фрагмента
     *
     * @param GeoSearchEntity $geoSearchEntity
     * @return GeoSearchEntity
     */
    public function save(GeoSearchEntity $geoSearchEntity): GeoSearchEntity;
}