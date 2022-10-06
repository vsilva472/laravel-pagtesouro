<?php 

namespace Vsilva472\PagTesouro\Contracts;

interface Http 
{
    /**
     * Makes a post request
     * 
     * @param   string  $url
     * @param   array   $data
     * @return  \Illuminate\Http\Client\Response  $response
     * 
     * @throws \Illuminate\Http\Client\RequestException 
     */
    public function post(string $url, array $data);

    /**
     * Makes a get request
     * 
     * @param   string  $url
     * @return  \Illuminate\Http\Client\Response   $response
     * 
     * @throws \Illuminate\Http\Client\RequestException 
     */
    public function get(string $url);
}