<?php

namespace App\Module\Geosearch;


use App\Module\Geosearch\Provider\GeoSearchServiceProvider;
use App\Module\Geosearch\Provider\ApiSearchServiceProvider;
use App\Module\Geosearch\Repository\GeoSearchRepository;
use App\Module\Geosearch\Repository\Impl\GeoSearchRepositoryImpl;
use Structure\Impl\Module\BaseModule;

/**
 * Class Module
 * @package App\Module\Geosearch
 */
class Module extends BaseModule
{
    /**
     * @var array
     */
    protected $config = [
        'name' => 'Geosearch',
        'providers' => [
            GeoSearchServiceProvider::class,
            ApiSearchServiceProvider::class
        ],
        'routes' => [
            'route/api.php'
        ],
        'repositories' => [
            GeoSearchRepository::class => GeoSearchRepositoryImpl::class
        ]
    ];
}