<?php

namespace App\Enums;

enum StatusEnum
{
    const PENDING   = 'pending';
    const APPROVED  = 'approved';
    const DECLINED  = 'declined';

    const BANK = 'bank';
    const PAYPAL = 'paypal';
}
