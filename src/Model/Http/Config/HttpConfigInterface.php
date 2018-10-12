<?php

namespace App\Model\Http\Config;

interface HttpConfigInterface
{
    public const FIELD_BASE_URI = 'base_uri';
    public const FIELD_SSL_KEY = 'ssl_key';
    public const FIELD_SSL_CRT = 'crt';
    public const FIELD_HANDLER = 'handler';
}
