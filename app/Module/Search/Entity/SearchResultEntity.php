<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 07.07.18
 * Time: 1:28
 */

namespace App\Module\Search\Entity;


use Structure\Base\Entity\Entity;

class SearchResultEntity extends Entity
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $response;

    /**
     * @var int
     */
    protected $fragmentId;

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
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param string $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * @return int
     */
    public function getFragmentId()
    {
        return $this->fragmentId;
    }

    /**
     * @param int $fragmentId
     */
    public function setFragmentId($fragmentId)
    {
        $this->fragmentId = $fragmentId;
    }


}