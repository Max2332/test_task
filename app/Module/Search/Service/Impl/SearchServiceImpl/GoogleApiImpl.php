<?php

namespace App\Module\Service\Impl\SearchServiceImpl;


use App\Module\Search\Service\FragmentService;
use App\Module\Search\Service\SearchResultService;
use App\Module\Search\Service\SearchService;
use Illuminate\Support\Collection;
use SKAgarwal\GoogleApi\PlacesApi;

class GoogleApiImpl implements SearchService
{

    /**
     * @var FragmentService $fragmentService
     */
    protected $fragmentService;

    /**
     * @var SearchResultService $searchResultService
     */
    protected $searchResultService;

    /**
     * @var PlacesApi $googlePlacesApi
     */
    protected $googlePlacesApi;

    /**
     * GoogleApiImpl constructor.
     * @param FragmentService $fragmentService
     * @param SearchResultService $searchResultService
     * @param PlacesApi $googlePlacesApi
     */
    public function __construct(FragmentService $fragmentService, SearchResultService $searchResultService, PlacesApi $googlePlacesApi)
    {
        $this->fragmentService = $fragmentService;
        $this->searchResultService = $searchResultService;
        $this->googlePlacesApi = $googlePlacesApi;
    }


    /**
     * Поиск подсказок по гео Api
     *
     * @param string $fragment
     * @return Collection
     */
    public function search(string $fragment): Collection
    {
        $helpers = $this->googlePlacesApi->placeAutocomplete($fragment);



        return $helpers;
    }


}