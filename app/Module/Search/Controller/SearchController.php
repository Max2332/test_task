<?php

namespace App\Module\Search\Controller;


use App\Module\Search\Exception\SearchException;
use App\Module\Search\Exception\SearchValidationException;
use App\Module\Search\Service\SearchService;
use Illuminate\Http\Request;
use Structure\Base\Controller\Controller;

class SearchController extends Controller
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
     * @var SearchService
     */
    protected $searchService;

    /**
     * SearchController constructor.
     * @param Request $request
     * @param SearchService $searchService
     */
    public function __construct(Request $request, SearchService $searchService)
    {
        $this->request = $request;
        $this->searchService = $searchService;
    }


    public function getAction()
    {
        $requestData = $this->getValidateData();
        return $this->searchService->search($requestData['fragment']);
    }

    public function getValidationException(array $validateErrors): \Exception
    {
        return new SearchValidationException($validateErrors);
    }


}