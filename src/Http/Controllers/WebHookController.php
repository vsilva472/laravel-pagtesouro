<?php

namespace Vsilva472\PagTesouro\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Vsilva472\PagTesouro\Exceptions\PagTesouroInvalidBearerTokenException;

class WebHookController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Handle the webhook from pagtesouro api
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response 
     *
     * @throws \Vsilva472\PagTesouro\Exceptions\InvalidBearerTokenException
     */
    public function webhook(Request $request)
    {
        if (!config('pagtesouro.token'))
            throw new PagTesouroInvalidBearerTokenException('you must set the toke from config/pagtesouro.php');

        if ($request->bearerToken() != config('pagtesouro.token'))
            throw new PagTesouroInvalidBearerTokenException('The token from request is not valid or does not match with token inside config/pagtesouro.php');

        $event = config('pagtesouro.events.webhook_received');
        event(new $event($request->idPagamento, $request->dataHora));

        return response()->noContent(Response::HTTP_OK);
    }
}
