<?php

namespace Vsilva472\PagTesouro\Services;

use Vsilva472\PagTesouro\Contracts\Status as StatusContract;
use Vsilva472\PagTesouro\Traits\CheckPaymentStatus;

class Status extends BaseService implements StatusContract 
{
    use CheckPaymentStatus;
}