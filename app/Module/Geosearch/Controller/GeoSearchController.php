<?php

namespace App\Module\Geosearch\Controller;


use App\Module\Geosearch\Exception\GeoSearchValidationException;
use App\Module\Geosearch\Service\ApiSearchService;
use Illuminate\Http\Request;
use Structure\Base\Controller\Controller;

class GeoSearchController extends Controller
{
    /**
     * @var array
     */
    protected $rules = [
        'fragment' => 'required|string'
    ];

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var ApiSearchService
     */
    protected $apiSearchService;

    /**
     * SearchController constructor.
     * @param Request $request
     * @param ApiSearchService $apiSearchService
     */
    public function __construct(Request $request, ApiSearchService $apiSearchService)
    {
        $this->request = $request;
        $this->apiSearchService = $apiSearchService;
    }


    public function getAction()
    {
        $requestData = $this->getValidateData();
        $fragment = $requestData['fragment'];
        return $this->apiSearchService->search($fragment);
    }

    public function getValidationException(array $validateErrors): \Exception
    {
        return new GeoSearchValidationException($validateErrors);
    }


}