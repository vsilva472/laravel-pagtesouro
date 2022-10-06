<?php
 
namespace Vsilva472\PagTesouro\Events;

use Illuminate\Foundation\Events\Dispatchable;
  
class WebHookReceived
{ 
    use Dispatchable;
    
    /**
     * The payment id from pagtesouro api
     * 
     * @param string $payment_id
     */
    public $payment_id;

    /**
     * The payment status from pagtesouro api
     * 
     * @param string $payment_status
     */
    public $date;

    /**
     * Create a new event instance.
     *
     * @param  String $payment_id
     * @param  String $payment_status
     * @return void
     */
    public function __construct(string $payment_id, string $date)
    {
        $this->payment_id   = $payment_id;
        $this->date         = $date;
    }
}