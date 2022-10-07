<?php

namespace Vsilva472\PagTesouro\Services;

use Vsilva472\PagTesouro\Contracts\Http as HttpContract;

class HttpClient implements HttpContract 
{
    /**
     * Makes a post request
     * 
     * @param   string  $url
     * @param   array   $data
     * @return  \GuzzleHttp\Psr7\Stream  $response
     */
    public function post(string $url, array $data) 
    {
        $response = $this->client->post($url, [
            'headers' => [
                'Authorization' => "Bearer " . config('pagtesouro.token'),
                'content-type' => 'application/json'
            ],
            'body' => json_encode($data)
        ]);

        return $response->getBody();
    }

    /**
     * Makes a get request
     * 
     * @param   string  $url
     * @return  \GuzzleHttp\Psr7\Stream  $response
     */
    public function get(string $url) 
    {
        $request = $this->client->get($url, [
            'headers' => ['Authorization' => "Bearer " . config('pagtesouro.token')]
        ]);

        return $request->getBody();
    }
}