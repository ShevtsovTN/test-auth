<?php

namespace App\Enums;

enum ServiceActionEnum: string
{
    case CRON = 'cron';
    case REQUEST_LIMIT = 'request_limit';
}
