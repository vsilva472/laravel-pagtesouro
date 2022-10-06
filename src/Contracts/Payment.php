<?php

namespace Vsilva472\PagTesouro\Contracts;

interface Payment
{
    /**
     * Creates a payment intent
     * 
     * @param   array   $data
     * @return  \Illuminate\Http\Client\Response   $response
     * 
     * @throws \Illuminate\Http\Client\RequestException 
     */
    public function createPaymentIntent(array $data);
}