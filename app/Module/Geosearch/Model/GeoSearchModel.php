<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 07.07.18
 * Time: 1:22
 */

namespace App\Module\Geosearch\Model;


use App\Module\Geosearch\Entity\GeoSearchEntity;
use Structure\Base\Model\Model;

/**
 * Class GeoSearchModel
 * @package App\Module\Geosearch\Model
 */
class GeoSearchModel extends Model
{

    protected $table = 'geo_searches';

    protected $entityClassName = GeoSearchEntity::class;

    public $timestamps = true;
}