<?php

namespace App\Module\Search\Service;

use Illuminate\Support\Collection;

/**
 * Interface SearchService
 * @package App\Module\Search\Service
 */
interface SearchService
{
    /**
     * Поиск подсказок по гео Api
     *
     * @param string $fragment
     * @return Collection
     */
    public function search(string $fragment): Collection;

}