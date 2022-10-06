<?php

namespace Vsilva472\PagTesouro\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(
            config('pagtesouro.events.webhook_received'),
            [config('pagtesouro.listeners.check_payment_status'), 'handle']
        );
    }
}
