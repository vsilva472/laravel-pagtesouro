<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Bearer Token
    |--------------------------------------------------------------------------
    |
    | You can generate yout bearer token from SISGRU
    |
    | For detailed instructions you can look the title section here:
    | https://www.youtube.com/watch?v=cpDMQsMiFTw&t=17s
    |
    */
    'token' => env('PAGTESOURO_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Pagtesouro api urls
    |
    | For detailed instructions you can look the title section here:
    | https://valpagtesouro.tesouro.gov.br/simulador/#/pages/api
    |
    */
    'url' => [
        'payment'       => env('PAGTESOURO_URL_PAYMENT', 'https://valpagtesouro.tesouro.gov.br/api/gru/solicitacao-pagamento'),
        'status'        => env('PAGTESOURO_URL_STATUS', 'https://valpagtesouro.tesouro.gov.br/api/gru/pagamentos/%s'),
        'notification'  => env('PAGTESOURO_URL_NOTIFICACAO'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Binding
    |--------------------------------------------------------------------------
    |
    | The services to handle payments and payments status
    | You can override as you want
    |
    */
    'binds' => [
        'pagtesouro' => Vsilva472\PagTesouro\Services\PagTesouro::class,
        Vsilva472\PagTesouro\Contracts\Payment::class => Vsilva472\PagTesouro\Services\Payment::class,
        Vsilva472\PagTesouro\Contracts\Status::class  => Vsilva472\PagTesouro\Services\Status::class,
    ],

    'http_client' => Vsilva472\PagTesouro\Services\HttpClient::class,
    /*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    |
    | The events that are handled by this package 
    | You can override as you want
    |
    */
    'events' => [
        'webhook_received'  => Vsilva472\PagTesouro\Events\WebHookReceived::class,
        'status_changed'    => Vsilva472\PagTesouro\Events\PaymentStatusChanged::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Listeners
    |--------------------------------------------------------------------------
    |
    | The listeners that are handled by this package 
    | You can override as you want
    |
    */
    'listeners' => [
        'check_payment_status' => Vsilva472\PagTesouro\Listeners\CheckPaymentStatus::class
    ],

    /*
    |--------------------------------------------------------------------------
    | Theme
    |--------------------------------------------------------------------------
    |
    | The theme of payment screen [tema-dark|tema-light] 
    | DEFAULT: TEMA-DARK
    |
    */
    'theme' => env('PAGTESOURO_THEME', 'tema-dark'),

    /*
    |--------------------------------------------------------------------------
    | Navigation mode
    |--------------------------------------------------------------------------
    |
    | Indicates to the package if the payment screen (after a user clicks on 
    | "Pagar" button) should open on the same screen or on a new tab
    |
    | 1 => Same Tab, 2 => New Tab
    | Defaut: 2
    |
    | @see https://valpagtesouro.tesouro.gov.br/simulador/#/pages/api (serch for: modoNavegacao)
    */
    'navigation_mode' => env('PAGTESOURO_NAVIGATION_MODE', '2'),

    /*
    |--------------------------------------------------------------------------
    | Return URL
    |--------------------------------------------------------------------------
    |
    | The url that pagtesouro api should redirect a user after a payment
    | This options is required only if navigation_mode = 1
    |
    |
    | @see https://valpagtesouro.tesouro.gov.br/simulador/#/pages/api (serch for: urlRetorno)
    */
    'return_url' => env('PAGTESOURO_RETURN_URL', null),

    /*
    |--------------------------------------------------------------------------
    | Add a button with label "Fechar" and "Concluir"
    |--------------------------------------------------------------------------
    |
    | If true this will be used to PagTesouroFacade::formatUrl
    | to tell to pagtesouro to include this buttons (common used in modal payments)
    | "Fechar" will be include on first screen
    | "Concluir" will be include when a user come back from PSP screen
    |
    | default: false
    |
    | @see https://valpagtesouro.tesouro.gov.br/simulador/#/pages/api (serch for: btnConcluir=true)
    */
    'add_finish_button' => env('PAGTESOURO_ADD_FINISH_BUTTON', false)
];