<?php

namespace App\Module\Search\Provider;


use App\Module\Search\Repository\FragmentRepository;
use App\Module\Search\Service\FragmentService;
use App\Module\Service\Impl\FragmentServiceImpl;
use Illuminate\Support\ServiceProvider;

class FragmentServiceProvider extends ServiceProvider
{
    public function register()
    {


        $this->app->singleton(FragmentService::class, function ($app) {
            return new FragmentServiceImpl(
                $app->make(FragmentRepository::class)
            );
        });
    }
}