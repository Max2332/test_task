<?php

namespace App\Module\Search\Exception;


use Structure\Base\Traits\ValidationExceptionTrait;


/**
 * Class ProjectException
 * @package App\Module\Payment\Exception
 */
class SearchValidationException extends SearchException
{
    use ValidationExceptionTrait;
}