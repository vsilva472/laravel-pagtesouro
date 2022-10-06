<?php 

namespace Vsilva472\PagTesouro\Traits;

trait CheckPaymentStatus 
{
    /**
     * Check the status of payment by its id
     * 
     * @param   string  $payment_id
     * @return  \Illuminate\Http\Client\Response   $response
     *
     * @throws \Illuminate\Http\Client\RequestException 
     */
    public function checkPaymentStatus(string $payment_id)
    {
        $url = sprintf(config('pagtesouro.url.status'), $payment_id);

        return $this->client->get($url);
    }
}