<?php

namespace App\Module\Geosearch\Provider;


use App\Module\Geosearch\Repository\GeoSearchRepository;
use App\Module\Geosearch\Service\GeoSearchService;
use App\Module\Geosearch\Service\Impl\GeoSearchServiceImpl;
use Illuminate\Support\ServiceProvider;

/**
 * Class GeoSearchServiceProvider
 * @package App\Module\Geosearch\Provider
 */
class GeoSearchServiceProvider extends ServiceProvider
{
    public function register()
    {


        $this->app->singleton(GeoSearchService::class, function ($app) {
            return new GeoSearchServiceImpl(
                $app->make(GeoSearchRepository::class)
            );
        });
    }
}