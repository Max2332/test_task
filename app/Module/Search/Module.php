<?php

namespace App\Module\Search;


use App\Module\Search\Provider\FragmentServiceProvider;
use App\Module\Search\Provider\SearchResultServiceProvider;
use App\Module\Search\Provider\SearchServiceProvider;
use App\Module\Search\Repository\FragmentRepository;
use App\Module\Search\Repository\Impl\FragmentRepositoryImpl;
use App\Module\Search\Repository\Impl\SearchResultRepositoryImpl;
use App\Module\Search\Repository\SearchResultRepository;
use Structure\Impl\Module\BaseModule;

/**
 * Class Module
 * @package App\Module\Search
 */
class Module extends BaseModule
{
    /**
     * @var array
     */
    protected $config = [
        'name' => 'search',
        'providers' => [
            SearchResultServiceProvider::class,
            FragmentServiceProvider::class,
            SearchServiceProvider::class
        ],
        'routes' => [
            'route/api.php'
        ],
        'repositories' => [
            FragmentRepository::class => FragmentRepositoryImpl::class,
            SearchResultRepository::class => SearchResultRepositoryImpl::class
        ]
    ];
}