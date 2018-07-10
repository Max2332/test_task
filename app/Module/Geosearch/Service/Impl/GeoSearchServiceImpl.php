<?php

namespace App\Module\Geosearch\Service\Impl;


use App\Module\Geosearch\Entity\GeoSearchEntity;
use App\Module\Geosearch\Repository\GeoSearchRepository;
use App\Module\Geosearch\Service\GeoSearchService;

/**
 * Class FragmentServiceImpl
 * @package App\Module\Geosearch\Service\Impl
 */
class GeoSearchServiceImpl implements GeoSearchService
{

    /**
     * @var GeoSearchRepository $geoSearchRepository
     */
    protected $geoSearchRepository;

    /**
     * FragmentServiceImpl constructor.
     * @param GeoSearchRepository $geoSearchRepository
     */
    public function __construct(GeoSearchRepository $geoSearchRepository)
    {
        $this->geoSearchRepository = $geoSearchRepository;
    }

    /**
     * Сохранение фрагмента
     *
     * @param GeoSearchEntity $geoSearchEntity
     * @return GeoSearchEntity
     */
    public function save(GeoSearchEntity $geoSearchEntity): GeoSearchEntity
    {
        return $this->geoSearchRepository->save($geoSearchEntity);
    }


}