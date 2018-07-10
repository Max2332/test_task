<?php

namespace App\Module\Geosearch\Service;

use Illuminate\Support\Collection;

/**
 * Interface ApiSearchService
 * @package App\Module\Geosearch\Service
 */
interface ApiSearchService
{
    /**
     * Поиск подсказок по гео Api
     *
     * @param string $fragment
     * @return Collection
     */
    public function search(string $fragment): Collection;

}