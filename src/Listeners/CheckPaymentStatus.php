<?php

namespace Vsilva472\PagTesouro\Listeners;

use Vsilva472\PagTesouro\Events\WebHookReceived;
use Vsilva472\PagTesouro\Facades\PagTesouro;

class CheckPaymentStatus 
{
    /**
     * Handle the event.
     *
     * @param  \Vsilva472\PagTesouro\Events\WebHookReceived  $event
     * @return void
     */
    public function handle(WebHookReceived $event)
    {
        // @TODO: Add try catch block
        $response   = PagTesouro::checkPaymentStatus($event->payment_id);
        $data       = json_decode($response, true);
        $event      = config('pagtesouro.events.status_changed');

        event(new $event($data));
    }
}