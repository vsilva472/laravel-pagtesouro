<?php 

namespace Vsilva472\PagTesouro\Services;

use Vsilva472\PagTesouro\Contracts\Payment;
use Vsilva472\PagTesouro\Contracts\Status;
use Vsilva472\PagTesouro\Traits\CheckPaymentStatus;
use Vsilva472\PagTesouro\Traits\CreatePaymentIntent;

class PagTesouro extends BaseService implements Payment, Status
{
    use CreatePaymentIntent, CheckPaymentStatus;

    /**
     * Generates the url to be used on
     * pagtesouro iframe element 
     * 
     * @param   string  $url
     * @return  string
     */
    public function formatUrl(string $url) 
    {
        $params = [];
        $params['tema'] = config('pagtesouro.theme');
        
        if (config('pagtesouro.add_finish_button')) $params['btnConcluir'] = true;
                
        return sprintf('%s&%s', $url, http_build_query($params));
    }
}