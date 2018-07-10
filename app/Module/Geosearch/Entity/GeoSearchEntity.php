<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 07.07.18
 * Time: 1:24
 */

namespace App\Module\Geosearch\Entity;


use Structure\Base\Entity\Entity;

/**
 * Class GeoSearchEntity
 * @package App\Module\Geosearch\Entity
 */
class GeoSearchEntity extends Entity
{
    /**
     * @var null|int
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $fragment;

    /**
     * @var string|null
     */
    protected $response;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(?int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFragment():?string
    {
        return $this->fragment;
    }

    /**
     * @param null|string $fragment
     */
    public function setFragment(?string $fragment)
    {
        $this->fragment = $fragment;
    }

    /**
     * @return null|string
     */
    public function getResponse():?string
    {
        return $this->response;
    }

    /**
     * @param null|string $response
     */
    public function setResponse(?string $response)
    {
        $this->response = $response;
    }


}