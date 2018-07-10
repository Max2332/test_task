<?php


use App\Module\Geosearch\Entity\GeoSearchEntity;
use App\Module\Geosearch\Repository\Impl\GeoSearchRepositoryImpl;
use App\Module\Geosearch\Service\Impl\GeoSearchServiceImpl;
use App\Module\Geosearch\Service\Impl\SearchServiceImpl\GoogleApiImpl;
use Codeception\Stub;
use Illuminate\Support\Collection;
use SKAgarwal\GoogleApi\PlacesApi;

class ApiSearchServiceCest
{

    protected function createTestGeoSearchEntity(): GeoSearchEntity
    {
        return new GeoSearchEntity([
            'fragment' => 'test',
            'response' => json_encode(['test'])
        ]);
    }

    public function searchWithExistCacheTest(UnitTester $I)
    {
        $testEntity = $this->createTestGeoSearchEntity();
        $geoSearchService = Stub::make(GeoSearchServiceImpl::class);
        $geoSearchRepository = Stub::make(GeoSearchRepositoryImpl::class, [
            'find' => function () use ($testEntity) {
                return $testEntity;
            }
        ]);
        $googlePlacesApi = Stub::make(PlacesApi::class);

        $newGoogleApiImpl = new GoogleApiImpl($geoSearchService, $googlePlacesApi, $geoSearchRepository);

        $result = $newGoogleApiImpl->search('test');

        $I->assertEquals($result, collect(['test']));
    }

    public function searchWithoutExistCacheTest(UnitTester $I)
    {
        $geoSearchService = Stub::makeEmpty(GeoSearchServiceImpl::class);
        $geoSearchRepository = Stub::make(GeoSearchRepositoryImpl::class, [
            'find' => function () {
                return null;
            }
        ]);


        $googlePlacesApi = Stub::make(PlacesApi::class, [
            'placeAutocomplete' => function () {
                return collect([
                    'predictions' => collect([
                        'test'
                    ])
                ]);
            }
        ]);

        $newGoogleApiImpl = new GoogleApiImpl($geoSearchService, $googlePlacesApi, $geoSearchRepository);
        $result = $newGoogleApiImpl->search('test');
        $I->assertEquals($result, collect([
            'test'
        ]));
    }

}
