<?php

namespace App\Module\Search\Service;


use App\Module\Search\Entity\FragmentEntity;

/**
 * Interface FragmentService
 * @package App\Module\Search\Service
 */
interface FragmentService
{
    /**
     * Сохранение фрагмента
     *
     * @param string $fragment
     * @return FragmentEntity
     */
    public function save(string $fragment): FragmentEntity;
}