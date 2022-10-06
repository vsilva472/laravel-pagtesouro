<?php

namespace Vsilva472\PagTesouro\Services;

use Illuminate\Support\Facades\Http;
use Vsilva472\PagTesouro\Contracts\Http as HttpContract;

class HttpClient implements HttpContract 
{
    /**
     * Makes a post request
     * 
     * @param   string  $url
     * @param   array   $data
     * @return  array   $response
     * 
     * @throws \Illuminate\Http\Client\RequestException 
     */
    public function post(string $url, array $data) 
    {
        return Http::withToken(config('pagtesouro.token'))
            ->post($url, $data)
            ->throw();
    }

    /**
     * Makes a get request
     * 
     * @param   string  $url
     * @return  array   $response
     * 
     * @throws \Illuminate\Http\Client\RequestException 
     */
    public function get(string $url) 
    {
        return Http::withToken(config('pagtesouro.token'))
            ->get($url)
            ->throw();
    }
}