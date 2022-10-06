<?php 

namespace Vsilva472\PagTesouro\Facades;

use Illuminate\Support\Facades\Facade;

class PagTesouro extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() 
    { 
        return 'pagtesouro'; 
    }
}