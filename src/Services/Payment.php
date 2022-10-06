<?php

namespace Vsilva472\PagTesouro\Services;

use Vsilva472\PagTesouro\Contracts\Payment as PaymentContract;
use Vsilva472\PagTesouro\Traits\CreatePaymentIntent;

class Payment extends BaseService implements PaymentContract
{
    use CreatePaymentIntent;
}