<?php

namespace App\Module\Search\Provider;


use App\Module\Search\Service\FragmentService;
use App\Module\Search\Service\SearchResultService;
use App\Module\Search\Service\SearchService;
use App\Module\Service\Impl\SearchServiceImpl\GoogleApiImpl;
use Illuminate\Support\ServiceProvider;
use SKAgarwal\GoogleApi\PlacesApi;

class SearchServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(SearchService::class, function ($app) {
            $googleApi = new PlacesApi(config('google.places.key'));
            return new GoogleApiImpl(
                $app->make(FragmentService::class),
                $app->make(SearchResultService::class),
                $googleApi
            );
        });
    }
}