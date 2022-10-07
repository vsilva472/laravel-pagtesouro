<?php

namespace Vsilva472\PagTesouro\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        //
    ];

    /**
     * Create a new service provider instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct($app)
    {
        parent::__construct($app);

        $event      = config('pagtesouro.events.webhook_received');
        $listener   = config('pagtesouro.listeners.check_payment_status');
        
        $this->listen[ $event ] = [ $listener ];
    }
}
