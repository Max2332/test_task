<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 07.07.18
 * Time: 1:24
 */

namespace App\Module\Search\Entity;


use Structure\Base\Entity\Entity;

class FragmentEntity extends Entity
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $fragment;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFragment()
    {
        return $this->fragment;
    }

    /**
     * @param string $fragment
     */
    public function setFragment($fragment)
    {
        $this->fragment = $fragment;
    }


}