<?php

namespace  App\Module\Search\Provider;

use App\Module\Search\Repository\SearchResultRepository;
use App\Module\Search\Service\SearchResultService;
use App\Module\Service\Impl\SearchResultServiceImpl;
use Illuminate\Support\ServiceProvider;

class SearchResultServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(SearchResultService::class, function ($app) {
            return new SearchResultServiceImpl(
                $app->make(SearchResultRepository::class)
            );
        });
    }
}