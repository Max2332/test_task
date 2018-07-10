<?php

namespace App\Module\Geosearch\Provider;


use App\Module\Geosearch\Repository\GeoSearchRepository;
use App\Module\Geosearch\Service\GeoSearchService;
use App\Module\Geosearch\Service\ApiSearchService;
use App\Module\Geosearch\Service\Impl\SearchServiceImpl\GoogleApiImpl;
use Illuminate\Support\ServiceProvider;
use SKAgarwal\GoogleApi\PlacesApi;

/**
 * Class ApiSearchServiceProvider
 * @package App\Module\Geosearch\Provider
 */
class ApiSearchServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ApiSearchService::class, function ($app) {
            $googleApi = new PlacesApi(config('google.places.key'));
            return new GoogleApiImpl(
                $app->make(GeoSearchService::class),
                $googleApi,
                $app->make(GeoSearchRepository::class)
            );
        });
    }
}