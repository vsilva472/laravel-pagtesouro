<?php 

namespace Vsilva472\PagTesouro\Contracts;

interface Http 
{
    /**
     * Makes a post request
     * 
     * @param   string  $url
     * @param   array   $data
     * @return  \GuzzleHttp\Psr7\Stream  $response
     * 
     * @see https://docs.guzzlephp.org/en/stable/quickstart.html#exceptions
     */
    public function post(string $url, array $data);

    /**
     * Makes a get request
     * 
     * @param   string  $url
     * @return  \GuzzleHttp\Psr7\Stream  $response
     * 
     * @see https://docs.guzzlephp.org/en/stable/quickstart.html#exceptions
     */
    public function get(string $url);
}