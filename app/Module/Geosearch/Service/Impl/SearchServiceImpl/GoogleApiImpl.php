<?php

namespace App\Module\Geosearch\Service\Impl\SearchServiceImpl;


use App\Module\Geosearch\Entity\GeoSearchEntity;
use App\Module\Geosearch\Repository\GeoSearchRepository;
use App\Module\Geosearch\Service\ApiSearchService;
use App\Module\Geosearch\Service\GeoSearchService;
use Illuminate\Support\Collection;
use SKAgarwal\GoogleApi\PlacesApi;

/**
 * Class GoogleApiImpl
 * @package App\Module\Geosearch\Service\Impl\SearchServiceImpl
 */
class GoogleApiImpl implements ApiSearchService
{

    /**
     * @var GeoSearchService $geoSearchService
     */
    protected $geoSearchService;

    /**
     * @var PlacesApi $googlePlacesApi
     */
    protected $googlePlacesApi;

    /**
     * @var GeoSearchRepository $geoSearchRepository
     */
    protected $geoSearchRepository;

    /**
     * GoogleApiImpl constructor.
     * @param GeoSearchService $geoSearchService
     * @param PlacesApi $googlePlacesApi
     * @param GeoSearchRepository $geoSearchRepository
     */
    public function __construct(GeoSearchService $geoSearchService, PlacesApi $googlePlacesApi, GeoSearchRepository $geoSearchRepository)
    {
        $this->geoSearchService = $geoSearchService;
        $this->googlePlacesApi = $googlePlacesApi;
        $this->geoSearchRepository = $geoSearchRepository;
    }


    /**
     * Поиск подсказок по гео Api
     *
     * @param string $fragment
     * @return Collection
     */
    public function search(string $fragment): Collection
    {
        $geoSearchResult = $this->geoSearchRepository->find($fragment);

        if ($geoSearchResult) {
            $result  = json_decode($geoSearchResult->getResponse(), true);
            return collect($result);
        }

        $resultApi = $this->googlePlacesApi->placeAutocomplete($fragment);
        $predictions = $resultApi->get('predictions')->take(6);
        $this->geoSearchService->save(new GeoSearchEntity([
            'fragment' => $fragment,
            'response' => $predictions
        ]));

        return $predictions;
    }
}