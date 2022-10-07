<?php

namespace Vsilva472\PagTesouro\Services;

use GuzzleHttp\Client;
use Vsilva472\PagTesouro\Contracts\Http as HttpContract;

class HttpClient implements HttpContract 
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Class constructor
     * 
     * @param \GuzzleHttp\Client $client
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Makes a post request
     * 
     * @param   string  $url
     * @param   array   $data
     * @return  \GuzzleHttp\Psr7\Stream  $response
     * 
     * @see https://docs.guzzlephp.org/en/stable/quickstart.html#exceptions
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
     * 
     * @see https://docs.guzzlephp.org/en/stable/quickstart.html#exceptions
     */
    public function get(string $url) 
    {
        $request = $this->client->get($url, [
            'headers' => ['Authorization' => "Bearer " . config('pagtesouro.token')]
        ]);

        return $request->getBody();
    }
}