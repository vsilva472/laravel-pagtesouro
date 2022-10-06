<?php

namespace Vsilva472\PagTesouro\Services;

use Vsilva472\PagTesouro\Contracts\Http;

class BaseService
{    
    /**
     * The http client to make requests
     * 
     * @var \Vsilva472\PagTesouro\Contracts\Http
     */
    public $client;

    /**
     * Class constructor
     * 
     * @param   \Vsilva472\PagTesouro\Contracts\Http    $client
     * @return  void
     */
    public function __construct(Http $client)
    {
        $this->client = $client;
    }
}