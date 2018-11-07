<?php

namespace App\Exceptions;

use Exception;

class ResourceNotAllowedException extends Exception
{
    //
    public function report()
    {
        \Log::debug('Resource Not Allowed');
    }
}
