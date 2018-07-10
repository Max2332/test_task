<?php

namespace App\Module\Geosearch\Exception;


use Structure\Base\Traits\ValidationExceptionTrait;


/**
 * Class GeoSearchValidationException
 * @package App\Module\Geosearch\Exception\
 */
class GeoSearchValidationException extends GeoSearchException
{
    use ValidationExceptionTrait;
}