<?php
 
namespace Vsilva472\PagTesouro\Events;

use Illuminate\Foundation\Events\Dispatchable;
  
class PaymentStatusChanged
{ 
    use Dispatchable;
    
    /**
     * The payment info from the api
     * 
     * @param array $payment
     */
    public $payment;

    /**
     * Create a new event instance.
     *
     * @param  String $payment_id
     * @param  String $payment_status
     * @return void
     */
    public function __construct(array $payment)
    {
        $this->payment = $payment;
    }
}