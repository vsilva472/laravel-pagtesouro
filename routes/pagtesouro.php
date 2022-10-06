<?php
/*
|--------------------------------------------------------------------------
| Webhook Route
|--------------------------------------------------------------------------
|
| The webhook route to handle pagtesouro notifications
| @see https://valpagtesouro.tesouro.gov.br/simulador/#/pages/api
|
*/
use Illuminate\Support\Facades\Route;
use Vsilva472\PagTesouro\Http\Controllers\WebHookController;

Route::post('/webhook', [WebHookController::class, 'webhook'])->name('webhook');