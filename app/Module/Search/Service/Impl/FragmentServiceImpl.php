<?php

namespace App\Module\Service\Impl;


use App\Module\Search\Entity\FragmentEntity;
use App\Module\Search\Repository\FragmentRepository;
use App\Module\Search\Service\FragmentService;

/**
 * Class FragmentServiceImpl
 * @package App\Module\Service\Impl
 */
class FragmentServiceImpl implements FragmentService
{

    /**
     * @var FragmentRepository $fragmentRepository
     */
    protected $fragmentRepository;

    /**
     * FragmentServiceImpl constructor.
     * @param FragmentRepository $fragmentRepository
     */
    public function __construct(FragmentRepository $fragmentRepository)
    {
        $this->fragmentRepository = $fragmentRepository;
    }

    /**
     * Сохранение фрагмента
     *
     * @param string $fragment
     * @return FragmentEntity
     */
    public function save(string $fragment): FragmentEntity
    {
        $fragmentEntity = $this->fragmentRepository->find($fragment);

        if ($fragmentEntity) {
            return $fragmentEntity;
        }

        return $this->fragmentRepository->save(new FragmentEntity([
            'fragment' => $fragment
        ]));
    }


}