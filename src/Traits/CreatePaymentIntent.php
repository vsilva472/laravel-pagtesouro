<?php 

namespace Vsilva472\PagTesouro\Traits;

trait CreatePaymentIntent 
{
    /**
     * Creates a payment intent
     * 
     * @param   array   $data
     * @return  \Illuminate\Http\Client\Response   $response
     * 
     * @throws \Illuminate\Http\Client\RequestException 
     */
    public function createPaymentIntent(array $data)
    {
        return $this->client->post(config('pagtesouro.url.payment'), $data);
    }
}